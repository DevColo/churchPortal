<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Departments;
use Redirect;
use App\User;
use Auth;
use DB;
use PDF;

class DepartmentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function deptForm(){
        return view('departments.addDept');
    }

    public function store(Request $request){
    	$input = $request->all();

          
    //validating dept form
        $validateInput = Validator::make($input,[
        	'dept'  => 'required|string|max:255|unique:departments',
        ],[
        	'dept.required' => 'Department is required',
        	'dept.unique' => 'Department already exist',
        ]);

        if ($validateInput->fails()) {
        	\Session::flash('msgErr',' Department was not register, try again' );

            return redirect()->back()->withErrors($validateInput->errors())->withInput();
        }
        
        else{
        	$input = $request->all();

        	if($input['dept_code']== null){
             $code = (DB::table('departments')->count()) +1;
            }else{
                $deptId=$input['dept_code'];
            }
             if($code<=9){
            
            $deptId="DEPT000".$code; 
              }
            if($code<=99 && $code>9){
            $deptId="DEPT00".$code; 
            }
            if($code>99 && $code<=999){
            $deptId="DEPT0".$code; 
            }
            if ($code>999999){
            $deptId=$code; 
            }
            $deptId=$deptId;
            

            $deptData = array(
                'dept'     => $input['dept'],
                'dept_code' => $deptId,
            	'admin_id'  => Auth::user()->id,
            );
            $saveDept = Departments::create($deptData);

       \Session::flash('msg','You have successfully added a Department');
       return  Redirect::to('addDept');
    }
        }

        public function updateDept()
        {
            if(request()->ajax())
            {
                return datatables()->of(Departments::latest()->get())
                        ->addColumn('action', function($data){
                             // $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                             $editUrl = url('updateDept/edit/'.$data->id);
                             $deleteUrl = url('updateDept/delete/'.$data->id);
                       $button = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="'.$deleteUrl.'"class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                            return $button;
                            
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('departments.updateDept');
        }

        public function editDept(Request $request, $id)
    {
       
        $updateUrl = url('editDept/update/'.$id);
       
        $Data = DB::table('departments')
                  ->where('id',$id)
                  ->select('*')
                  ->get();
        
        return view('departments.editDept',['Data'=>$Data], compact('updateUrl'));
    }

    public function update(Request $request, $id){
        $dept_id = $id;
        $dept = Departments::findOrFail($dept_id);

        $dept->dept = $request->input('dept');        
        $dept->dept_code = $request->input('dept_code');
        $dept->admin_id= Auth::user()->id;
        $dept->update();
        \Session::flash('msg','Department successfully updated');
        return redirect()->back();
    }

    public function deleteDept($id)
    {
        $adminMembers = DB::table('admin_members')->where('dept_id',$id)->delete();
        $members = DB::table('members')->where('dept_id',$id)->delete();
        $data = Departments::findOrFail($id);
        $data->delete();
        \Session::flash('msg','Department Successfully deleted');
        return redirect()->back();
    }

    public function deptDetails(){
        $data = DB::table('departments')->select('*')->get();
        return view('departments.deptDetails', compact('data'));
    }
    
    public function deptPDF(){
        $data = DB::table('departments')
           ->select('*')
           ->get();
       
       $pdf=PDF::loadView('departments.deptPDF',['data'=>$data]);

       //converting the view(page)  to a pdf file in the browser
       return $pdf->stream('SPLPdepartments.pdf');
   }
}
