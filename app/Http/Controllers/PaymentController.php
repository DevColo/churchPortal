<?php

namespace App\Http\Controllers;

use App\Mail\MyTailMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\AdminMembers;
use App\Departments;
use App\Payments;
use App\Members;
use DataTables;
use Validator;
use Redirect;
use App\User;
use Auth;
use DB;
use PDF;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function payTithe(){
        $member=DB::table('members')->select('*')->get();
        return view('tithe.payTithe', compact('member'));
    }
    
    public function pay(Request $request){
        $input = $request->all();

        $validateInput = Validator::make($input,[
        	'year'  => 'required|string|max:255',
            'month'  => 'required|string|max:255',
            'amount'  => 'required|string|max:255',
            'member_id'  => 'required|string|max:255',
        ],[
        	'year.required' => 'Please enter year of payment',
            'month.required' => 'Please enter month of payment',
            'amount.required' => 'Please enter the amount',
            'member_id.required' => 'Please select tithe payer',
        ]);

        if ($validateInput->fails()) {
        	\Session::flash('msgErr','Tithe was not paid, try again' );

            return redirect()->back()->withErrors($validateInput->errors())->withInput();
        }
        
        else{
            // Making Member unique 
        	$uniqueMember = DB::table('tithe')
        	               // ->join('admin_members', 'admin_members.member_id', '=', 'tithe.member_id')
        	                // ->join('users', 'users.id', '=', 'admin_members.admin_id')
        	                ->where('year',$input['year'])
                            ->where('month',$input['month'])
                            ->where('member_id',$input['member_id'])
        	                ->count();
        	if ($uniqueMember>0) {
       \Session::flash('msgErr','This member has already paid tithe for this month');
       return redirect()->back()->withInput();
    } 
        
            $tithe = array(
                'year'=> $input['year'],
                'month'=> $input['month'],
                'amount'=> $input['amount'],
                'member_id'=> $input['member_id'],
            	'admin_id' => Auth::user()->id,
                
            );
            $payTithe = Payments::create($tithe);

            
       \Session::flash('msg','Tithe has been paid successfully');
       return redirect()->back();
    }
}
public function updateTithe()
{
    if(request()->ajax())
    {
        return datatables()->of(Payments::latest()->get())
                ->addColumn('action', function($data){
                     // $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                     $editUrl = url('updateTithe/edit/'.$data->id);
                     $deleteUrl = url('updateTithe/delete/'.$data->id);
               $button = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="'.$deleteUrl.'"class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $button;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    return view('tithe.updateTithe');
}

    public function editTithe($id){
        $updateUrl = url('updateTithe/update/'.$id);
        $member=DB::table('members')->select('*')->get();
        $tithe=DB::table('tithe')->where('id',$id)->select('*')->get();
        $payer=DB::table('members')->where('id',$id)->select('*')->get();
        return view('tithe.editTithe', compact('tithe','member','payer','updateUrl'));
    }

    public function update(Request $request, $id){
        $tithe_id = $id;
        $tithe = Payments::findOrFail($tithe_id);

        $tithe->year = $request->input('year');        
        $tithe->month = $request->input('month'); 
        $tithe->amount = $request->input('amount'); 
        $tithe->member_id = $request->input('member_id'); 
        $tithe->admin_id= Auth::user()->id;
        $tithe->update();
        \Session::flash('msg','Tithe payment successfully updated');
        return redirect()->back();
    }

    public function titheReport(){
        $amount=DB::table('tithe')->sum('amount');
        $tithe=DB::table('tithe')->join('members','members.id','tithe.member_id')->join('departments','departments.id','members.dept_id')->select('*')->get();
        $pdf=PDF::loadView('tithe.titheReport', compact('tithe','amount'));
        return $pdf->stream('titheReport.pdf');
    }
   
}
