<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class EmployerController extends Controller
{
    //
    public function employerIndex(){
        $this->AuthLogin();
        return view('pages.employerindex');
    }
    public function employerLogin(){
        return view('pages.employerlogin');
    }
    public function employerRegister(){
        return view('pages.employerregister');
    }
    public function getLogin(Request $request){
        $employer_username = $request->employer_username;
        $employer_password = md5($request->employer_password);
        $result = DB::table('employer')->where('employer_username',$employer_username)->where('employer_password',$employer_password)->first();
        if($result){
            Session::put('employer_name',$result->employer_name);
            Session::put('employer_id',$result->employer_id);
            Toastr::success('Đăng nhập thành công','Thành công');
            return Redirect::to('/employer');
        }else{
             Session::put('message','Mật khẩu hoặc tên đăng nhập không đúng! Vui lòng nhập lại');
             return Redirect::to('/employer-login');
        }
     }
     public function AuthLogin(){
        $employer_id = Session::get('employer_id');
        if($employer_id){
         return Redirect::to('/employer');  
        }else{
        return Redirect::to('/employer-login')->send();
        }
    }
     public function getLogout(){
         $this->AuthLogin();
         Session::put('employer_name',null);
         Session::put('employer_id',null);
         return Redirect::to('/employer-login');
     }
    
    public function storeEmployer(Request $request){
        
        $data= $request->validate([
            'employer_username' => 'unique:employer'],
        [   'employer_username.unique' => 'Tên đăng nhập đã tồn tại!'
        ]);
        $data['employer_name']=$request->employer_name;
        $data['employer_username']=$request->employer_username;
        $data['employer_password']=md5($request->employer_password);
        $data['employer_address']=$request->employer_address;
        $data['employer_phone']=$request->employer_phone;
        $data['employer_desc']=$request->employer_desc;
        DB::table('employer')->insert($data);
        Toastr::success('Đăng ký thành công','Thành công');
        return Redirect::to('employer-login');
    }
    public function editEmployer(){
        $this->AuthLogin();
        $employer_id = Session::get('employer_id');
        $edit_employer = DB::table('employer')->where('employer_id',$employer_id)->get();
        return view('pages.employeredit')->with('employer',$edit_employer);
    }
    public function updateEmployer(Request $request){
        $this->AuthLogin();
        $data= $request->validate([
            'employer_phone' => 'numeric|digits:10'],
        [   'employer_phone.numeric' => 'Số điện thoại phải là số tự nhiên!',
            'employer_phone.digits' => 'Số điện thoại phải có 10 chữ số!',
        ]);
        $employer_id = Session::get('employer_id');
        $data['employer_name']=$request->employer_name;
        $data['employer_username']=$request->employer_username;
        $data['employer_address']=$request->employer_address;
        $data['employer_phone']=$request->employer_phone;
        $data['employer_desc']=$request->employer_desc;
        DB::table('employer')->where('employer_id',$employer_id)->update($data);
        Toastr::success('Cập nhật thành công','Thành công');
        return Redirect::to('/employer');
    }
    
   
    public function addJob(){
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        $employer_id = Session::get('employer_id');
        return view('pages.employerpostjob',compact('category','province'));
    }
    public function getAllJobById(){
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        $employer_id = Session::get('employer_id');
        // dd($company_id);
        $all_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')
        ->where('employer_id',$employer_id)->orderBy('job_id','desc')->paginate(5) ;
        return view('pages.employerindex',compact('category','province'))->with('job',$all_job);
    }
    public function getJobDetailsById($job_id){
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        $employer_id = Session::get('employer_id');
        $employer = DB::table('employer')->where('employer_id',$employer_id)->get();
        // dd($company_id);
        $job_details = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')
        ->where('job_id',$job_id)->get();
        return view('pages.employerjobdetail',compact('category','province','employer'))->with('job_details',$job_details);
    }
    public function storeJob(Request $request){
        $this->AuthLogin();
        $employer_id = Session::get('employer_id');
        $data= $request->validate([
            'job_qunatity' => 'numeric'],
        [   'job_quantity.numeric' => 'Số lượng phải là số! Mời nhập lại!'
        ]);
        $data['job_name'] = $request->job_name;
        $data['job_salary'] = $request->job_salary;
        $data['job_quantity'] = $request->job_quantity;
        $data['job_requirement'] = $request->job_requirement;
        $data['job_desc'] = $request->job_desc;
        $data['employer_id'] = $request->employer_id;
        $data['category_id'] = $request->category_id;
        $data['job_status'] = $request->job_status;
        $data['job_closeday'] = $request->job_closeday;
        $data['employer_id'] = $employer_id;
        $data['province_id'] = $request->province_id;
        DB::table('job')->insert($data);
        Toastr::success('Đăng tin thành công','Thành công');
        return Redirect::to('/employer');
    }
    public function editJob($job_id){
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        $employer_id = Session::get('employer_id');
        $employer = DB::table('employer')->where('employer_id',$employer_id)->get();
        // dd($company_id);
        $job_details = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')
        ->where('job_id',$job_id)->get();
        return view('pages.employereditjob',compact('category','province','employer'))->with('job_details',$job_details);
    }
    public function updateJob(Request $request,$job_id){
        $this->AuthLogin();
        $employer_id = Session::get('employer_id');
        $data= $request->validate([
            'job_qunatity' => 'numeric'],
        [   'job_quantity.numeric' => 'Số lượng phải là số! Mời nhập lại!'
        ]);
        $data['job_name'] = $request->job_name;
        $data['job_salary'] = $request->job_salary;
        $data['job_quantity'] = $request->job_quantity;
        $data['job_requirement'] = $request->job_requirement;
        $data['job_desc'] = $request->job_desc;
        $data['employer_id'] = $request->employer_id;
        $data['category_id'] = $request->category_id;
        $data['job_status'] = $request->job_status;
        $data['job_closeday'] = $request->job_closeday;
        $data['employer_id'] = $employer_id;
        $data['province_id'] = $request->province_id;
        DB::table('job')->where('job_id',$job_id)->update($data);
        Toastr::success('Cập nhật tin thành công','Thành công');
        return Redirect::to('/employer');
    }
    public function employerHasApply($job_id){
        $this->AuthLogin();
        $all_job = DB::table('job')->where('job_id',$job_id)->get();
        $ds = DB::table('employee')->join('apply_detail','apply_detail.employee_id','=','employee.employee_id')
        ->where('apply_detail.job_id',$job_id)
        ->where('apply_detail.apply_status','=','0')
        ->get();
        $ds_pass = DB::table('employee')->join('apply_detail','apply_detail.employee_id','=','employee.employee_id')
        ->where('apply_detail.job_id',$job_id)
        ->where('apply_detail.apply_status','=','1')
        ->get();
        /* if($ds->count()>0 and $ds_pass->count()>0){

            return view('pages.employerhasapply')->with('list',$ds)->with('all',$all_job)->with('list_pass',$ds_pass)->with('job_id',$job_id);
        }
        if($ds->count()==0 and $ds_pass->count()>0){
            return view('pages.employerhasapply')->with('all',$all_job)->with('list_pass',$ds_pass)->with('job_id',$job_id);
        }
        if($ds->count()>0 and $ds_pass->count()==0){
            return view('pages.employerhasapply')->with('all',$all_job)->with('job_id',$job_id);
        } */
        return view('pages.employerhasapply')->with('job_id',$job_id)->with('all',$all_job)->with('list_pass',$ds_pass)->with('list',$ds);
    }
    public function applyAccept(Request $request,$job_id){
        $this->AuthLogin();
        $employee_id = $request->employee_id;
        DB::table('apply_detail')->where('job_id',$job_id)->where('employee_id',$employee_id) ->update(['apply_status'=>1]);
        Toastr::success('Chọn ứng viên thành công','Thành công');
        return redirect()->back();
    }

    public function applyDeny(Request $request,$job_id){
        $this->AuthLogin();
        $employee_id = $request->employee_id;
        DB::table('apply_detail')->where('job_id',$job_id)->where('employee_id',$employee_id) ->update(['apply_status'=>2]);
        Toastr::success('Loại ứng viên thành công','Thành công');
        return redirect()->back();
    }
}
