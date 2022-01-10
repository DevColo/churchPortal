<?php

namespace App\Http\Controllers;

use App\Mail\MyTailMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\AdminMembers;
use App\Departments;
use App\Members;
use DataTables;
use Validator;
use Redirect;
use App\User;
use Auth;
use DB;
use PDF;

class MembersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function memberForm(){
        $depts = DB::table('departments')->select('*')->get();
        return view('members.addMember',compact('depts'));
    }

    public function store(Request $request){
    	$input = $request->all();

          
    //validating membership form
        $validateInput = Validator::make($input,[
        	'fname'  => 'required|string|max:255',
        	'lname'  => 'required|string|max:255',
        	'sex'  => 'required|string',
            'DOB'  => 'required|string',
           // 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        	'address'  => 'required|string|max:255',
            'cell'      => 'required|string|unique:members',
            'dept_id'  => 'required|string|',
        	'post'      => 'required|string|max:255',
        	'email'      => 'required|string|unique:members',
        ],[
        	'fname.required' => 'First name is required',
        	'lname.required' => 'Last name is required',
        	'sex.required' => 'Gender name is required',
        	'DOB.required' => 'Date of birth is required',
        	'address.required' => 'Address is required',
        	'post.required' => 'Position is required',
        	'email.required' => 'Email is required',
        	'email.unique' => 'Email already exist',
        	'cell.required' => 'Cell number is required',
            'cell.unique' => 'Cell number already exist',
            'dept_id.required' => 'Please select department',
            //'image.mimes' => 'The file type of the image must be jpeg, jpg, gif, or svg',
        ]);

        if ($validateInput->fails()) {
        	\Session::flash('msgErr','Member was not register, try again' );

            return redirect()->back()->withErrors($validateInput->errors())->withInput();
        }
        
        else{
            // Making Member unique 
        	$uniqueMember = DB::table('members')
        	                ->join('admin_members', 'admin_members.member_id', '=', 'members.id')
        	                // ->join('users', 'users.id', '=', 'admin_members.admin_id')
        	                ->where('fname',$input['fname'])
        	                ->where('lname',$input['lname'])
        	                ->where('email',$input['email'])
        	                ->where('sex',$input['sex'])
        	                ->where('cell',$input['cell'])
        	                ->count();
        	if ($uniqueMember>0) {
       \Session::flash('msgErr','This Member has already been registered ');
       return redirect()->back()->withInput();
    } 

   
        
        // Getting member birth date from the form input
        //$employeeDOB = $input['DOB'];
        // Getting today's date
       /// $todayDate = date('Y-m-d');
        // Converting member birth date to seconds
       // $date1 = strtotime($employeeDOB);
        // Converting  today's date to in seconds
       // $date2 = strtotime($todayDate);
        // Finding the member's age in seconds
        //$ageInSeconds = $date2-$date1;
        // Converting the seconds to member real age
         //$age = $ageInSeconds/(60*60*24*365);
        // Converting member age to whole number
        // $employeeAge = intval($age);
         // dd($memberAge);
        


        	$input = $request->all();

        	if($input['member_id']== null){
             $code = (DB::table('members')->count()) +1;
            }else{
                $memberId=$input['member_id'];
            }
             if($code<=9){
            
            $memberId="SPLP000".$code; 
              }
            if($code<=99 && $code>9){
            $memberId="SPLP00".$code; 
            }
            if($code>99 && $code<=999){
            $memberId="SPLP0".$code; 
            }
            if ($code>999999){
            $memberId=$code; 
            }
            $memberId=$memberId;
            
            $imageName = time().'.'.$input['image']->extension();  
    // dd($imageName);
            $request->image->move(public_path('images'), $imageName);

            $memberData = array(
            	'member_id' => $memberId,
            	'fname'     => $input['fname'],
                'mname'     => $input['mname'],
            	'lname'     => $input['lname'],
            	'sex'    => $input['sex'],
            	'DOB' => $input['DOB'],
                'address'    => $input['address'],
                'dept_id'    => $input['dept_id'],
            	'post'    => $input['post'],
            	'cell'      => $input['cell'],
            	'email'     => $input['email'],
            	'image'     => $imageName,
            	'admin_id'  => Auth::user()->id,
            );
            $saveMember = Members::create($memberData);

            $memberID=DB::table('members')
                     ->where('admin_id',Auth::user()->id)
                     ->where('fname',$input['fname'])
                     ->where('lname',$input['lname'])
        	         ->where('email',$input['email'])
        	         ->where('sex',$input['sex'])
        	         ->where('cell',$input['cell'])
                     ->pluck('id');
         //memberID pointer
        $memberID=$memberID[0];
//dd($employeeID);
            $admin_membersData = array(
            	'admin_id' => Auth::user()->id,
                'member_id'=> $memberID,
                'dept_id'    => $input['dept_id'],
            );
            $saveAdminMembers = AdminMembers::create($admin_membersData);

            
       \Session::flash('msg','You have successfully registered a Member');
       return redirect()->back();
    }
        }
    
        public function memberDetails()
        {
            if(request()->ajax())
            {
                return datatables()->of(Members::latest()->get())
                        ->addColumn('action', function($data){
                            $editUrl = url('editMember/'.$data->id);
                         $viewUrl = url('printMember/'.$data->id);
                         $deleteUrl = url('deleteMember/'.$data->id);
                   $button = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn-primary btn-sm"><i class="fa fa-edit"></i> </a>';
                        $button .= '&nbsp;';
                        $button .= '<a href="'.$viewUrl.'" data-toggle="tooltip" data-original-title="View"class="delete btn-info btn-sm"><i class="fa fa-print"></i></a>';
                        $button .= '&nbsp;'; 
                        $button .= '<a href="'.$deleteUrl.'" data-toggle="tooltip" data-original-title="Delete"class="delete btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                        return $button;
                            
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('members.memberDetails');
        }

        public function editMember(Request $request, $id)
        {
           
            $updateUrl = url('updateMember/'.$id);
           
            $Data = DB::table('members')
                      ->where('id',$id)
                      ->select('*')
                      ->get();
            $depts = DB::table('departments')->select('*')->get();
            $dept = DB::table('departments')
            ->join('admin_members','admin_members.dept_id','departments.id')
            ->where('admin_members.member_id',$id)
            ->pluck('departments.dept');
            $dept=$dept[0];
            $dept_id = DB::table('departments')
            ->join('admin_members','admin_members.dept_id','departments.id')
            ->where('admin_members.member_id',$id)
            ->pluck('departments.id');
            $dept_id=$dept_id[0];
            
            return view('members.editMember',['Data'=>$Data], compact('updateUrl','depts','dept','dept_id'));
        }

        public function updateMember(Request $request, $id){
            $member_id = $id;
            $member = Members::findOrFail($member_id);
            
            $member->member_id = $request->input('member_id');
            $member->fname = $request->input('fname');
            $member->mname = $request->input('mname');
            $member->lname = $request->input('lname');
            $member->sex = $request->input('sex');
            $member->DOB = $request->input('DOB');
            $member->address = $request->input('address');
            //$member->photo = $request->input('photo');
            $member->dept_id = $request->input('dept_id');
            $member->post = $request->input('post');
            $member->cell = $request->input('cell');
            $member->cell = $request->input('cell');
            $member->email = $request->input('email');
            $member->admin_id = Auth::user()->id;
            // $oldPic = DB::table('members')->where('id',$id)->pluck('image');
            // $oldPic=$oldPic[0];
            // dd( $request->input('image'));
            // if($pic == $oldPic){
            //     echo($oldPic);
            // }else{
            //     echo"no";
            // }               
            $member->update();
            
            \Session::flash('msg','Student details successfully edited');
            return redirect()->back();
        }

        public function deleteMember($id)
        {
            $adminMembers = DB::table('admin_members')->where('member_id',$id)->delete();
            $data = Members::findOrFail($id);
            $data->delete();
            \Session::flash('msg','Member Successfully deleted');
            return redirect()->back();
        }

        public function printMember($id){
            $details=DB::table('members')->where('id',$id)->select('*')->get();
            $pic=DB::table('members')->where('id',$id)->pluck('image');
            $pic=$pic[0];
            $dept=DB::table('departments')->join('members','members.dept_id','departments.id')->where('members.id',$id)->pluck('departments.dept');
            $dept=$dept[0];
            $pdf=PDF::loadView('members.printMember',['details'=>$details],compact('dept','pic'));

       //converting the view(page)  to a pdf file in the browser
       return $pdf->stream('form.pdf');
        }

        public function printList()
        {
            if(request()->ajax())
            {
                return datatables()->of(Departments::latest()->get())
                        ->addColumn('action', function($data){
                            $printUrl = url('printDeptList/'.$data->id);
                   $button = '<a href="'.$printUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn-primary btn-sm"><i class="fa fa-print"></i> Print List</a>';
                        return $button;
                            
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('members.printList');
        }

        public function printDeptList($id){
            $details=DB::table('members')->where('dept_id',$id)->select('*')->get();
            $amount=DB::table('members')->where('dept_id',$id)->count();
            $dept=DB::table('departments')->where('id',$id)->pluck('departments.dept');
            $dept=$dept[0];
            $pdf=PDF::loadView('members.printDeptList',['details'=>$details],compact('dept','amount'));
            return $pdf->stream('list.pdf');
        }

        public function printAll(){
            $details=DB::table('members')->select('*')->get();
            $amount=DB::table('members')->count();
            $pdf=PDF::loadView('members.printAll',['details'=>$details],compact('amount'));
            return $pdf->stream('list.pdf');
        }

        public function sendMail(){
            $depts=DB::table('departments')->select('*')->get();
                return view('emails.composeMsg', compact('depts'));
        }

        public function mail(Request $request){
            $input = $request->all();

          
    //validating message
        $validateInput = Validator::make($input,[
        	'to'  => 'required|string|max:255',
        	'subject'  => 'required|string|max:255',
        	'message'  => 'required|string',
        ],[
        	'to.required' => 'Please select Reciever',
        	'subject.required' => 'Please enter the message subject',
        	'message.required' => 'Please compose message',
        ]);

        if ($validateInput->fails()) {
        	\Session::flash('msgErr','Message was not sent, try again' );

            return redirect()->back()->withErrors($validateInput->errors())->withInput();
        }
            $input= $request->all();
            $to=$input['to'];
            
            if ($input['to'] == "all"){
                $email=DB::table('members')->select('members.email')->get();
            }else{
                $email=DB::table('members')->join('departments','departments.id','members.dept_id')->where('members.dept_id', $to)->select('members.email')->get();
            }
           // dd($email);
            $details = [
                'title' => $input['subject'],
                'body' => $input['message']
            ];
           
            \Mail::to($email)->send(new \App\Mail\MyTestMail($details));
           
            \Session::flash('msg','Mail Sent Sucessfully');
            return redirect()->back();
         }

         public function myAccount(){
             $admin=DB::table('users')->where('id', Auth::user()->id)->select('*')->get();
             return view('admin.myAccount', compact('admin'));
         }

}
