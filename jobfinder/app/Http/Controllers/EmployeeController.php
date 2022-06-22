<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class EmployeeController extends Controller
{
    //
    public function employeeLogin(){
        return view('pages.employeelogin');
    }

    public function employeeRegister(){
        return view('pages.employeeregister');
    }

    public function getLogin(Request $request){
        $employee_email = $request->employee_email;
        $employee_password = md5($request->employee_password);
        $result = DB::table('employee')->where('employee_email',$employee_email)->where('employee_password',$employee_password)->first();
        if($result){
            Session::put('employee_name',$result->employee_name);
            Session::put('employee_id',$result->employee_id);
            Toastr::success('Đăng nhập thành công','Thành công');
            return Redirect::to('/');
        }else{
             Session::put('message','Mật khẩu hoặc tên đăng nhập không đúng! Vui lòng nhập lại');
             return Redirect::to('/employee-login');
        }
     }

     public function AuthLogin(){
        $employee_id = Session::get('employee_id');
        if($employee_id){
         return Redirect::to('/');  
        }else{
        return Redirect::to('/employee-login')->send();
        }
    }

     public function getLogout(){
         $this->AuthLogin();
         Session::put('employee_name',null);
         Session::put('employee_id',null);
         return Redirect::to('/employee-login');
     }

    public function storeEmployee(Request $request){
        
        $data= $request->validate([
            'employee_email' => 'unique:employee'],
        [   'employee_email.unique' => 'Email đã được sử dụng bởi tài khoản khác!'
        ]);
        $data['employee_name']=$request->employee_name;
        $data['employee_email']=$request->employee_email;
        $data['employee_password']=md5($request->employee_password);

        $data['employee_phone']=$request->employee_phone;
        $data['employee_gender']=$request->employee_gender;
        DB::table('employee')->insert($data);
        Toastr::success('Đăng ký thành công','Thành công');
        return Redirect::to('employee-login');
    }
    public function editEmployee(){
        $this->AuthLogin();
        $employee_id = Session::get('employee_id');
        $edit_employee = DB::table('employee')->where('employee_id',$employee_id)->get();
        return view('pages.employeeedit')->with('employee',$edit_employee);
    }
    public function updateEmployee(Request $request){
        $this->AuthLogin();
        $data= $request->validate([
            'employee_phone' => 'bail|numeric|digits:10'],
        [   'employee_phone.numeric' => 'Số điện thoại phải là số tự nhiên!',
            'employee_phone.digits' => 'Số điện thoại phải có 10 chữ số!',
        ]);
        $employee_id = Session::get('employee_id');
        $data['employee_name']=$request->employee_name;
        $data['employee_phone']=$request->employee_phone;
        $data['employee_gender']=$request->employee_gender;
        $data['employee_dob']=$request->employee_dob;
        DB::table('employee')->where('employee_id',$employee_id)->update($data);
        Toastr::success('Cập nhật thành công','Thành công');
        return Redirect::to('/');
    }

    public function deleteEmployee($employee_id){
        $this->AuthLogin();
        DB::table('employee')->where('employee_id',$employee_id)->delete();
        Toastr::success('Xóa người dùng','Thành công');
        return Redirect::to('admin/employee');
    }

    public function employeeApply(Request $request){
        $this->AuthLogin();
        $job_id = $request->job_id;
        $job = DB::table('job')->where('job_id',$job_id)->get();
        $count = $job->count();
        return view('pages.employeeapply')->with('job',$job)->with('job_id',$job_id);
    }
    public function employeeGetApply(Request $request,$job_id){
        $this->AuthLogin();
        $employee_id = Session::get('employee_id');
        
        $data= $request->validate([
            'employee_cv' => 'mimes:png,jpg,jpeg,pdf,docx,doc'],
        [   'employee_cv.mimes' => 'Vui lòng tải lên file có các định dạng sau: png,jpg,jpeg,pdf,docx,doc !'
            
        ]);
        $data['employee_id'] = $employee_id;
        $data['job_id'] = $job_id;
        $data['apply_status'] = 0;
        $get_cv = $request->file('employee_cv');
        if($get_cv){
        $new_cv = time().'.'.$get_cv->getClientOriginalExtension();
        $get_cv ->move('public/upload',$new_cv);
        $data['employee_cv'] = $new_cv;
        
        $employee_id = DB::table('apply_detail')->insert($data);
        Toastr::success('Ứng tuyển thành công','Thành công');
        return Redirect::to('/');
        }
        return Redirect::to('/employee-apply/{job_id}');
    }
    public function employeeHasApply(){
        $this->AuthLogin();
        $employee_id = Session::get('employee_id');
        
        $all_job = DB::table('job')->join('apply_detail','apply_detail.job_id','=','job.job_id')
        ->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')->where('job_status',1)
        ->where('apply_detail.employee_id',$employee_id)->orderBy('apply_detail.created_at','desc')->paginate(5) ;
        $count = $all_job->count();
        return view('pages.employeehasapply')->with('count',$count)->with('job',$all_job);
    }
    public function employeeNotification(){
        $this->AuthLogin();
        $employee_id = Session::get('employee_id');
        $notification = DB::table('apply_detail')->join('job','job.job_id','=','apply_detail.job_id')
        ->where('apply_detail.employee_id',$employee_id) ->where('apply_detail.apply_status','<>','0')->orderBy('apply_detail.created_at','desc')->paginate(10);
        return view('pages.employeenotification')->with('notification',$notification);
    }
}
