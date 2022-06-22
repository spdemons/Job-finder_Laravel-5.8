<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class AdminController extends Controller
{
    //
    public function index(){
        return view('adminlogin');
    }
    public function dashboard(){
        $this->AuthLogin();
        $count_job = DB::table('job')->count();
        $count_employer = DB::table('employer')->count();
        $count_employee = DB::table('employee')->count();
        return view('admin.dashboard')->with('count_job',$count_job)->with('count_employee',$count_employee)->with('count_employer',$count_employer);
    }
    public function getLogin(Request $request){
       $admin_username = $request->admin_username;
       $admin_password = md5($request->admin_password);
       $result = DB::table('admin')->where('admin_username',$admin_username)->where('admin_password',$admin_password)->first();
       if($result){
           Session::put('admin_name',$result->admin_name);
           Session::put('admin_id',$result->admin_id);
           Session::put('admin_role',$result->admin_role);
           return Redirect::to('/dashboard');
       }else{
            Session::put('message','Mật khẩu hoặc tên đăng nhập không đúng! Vui lòng nhập lại');
            return Redirect::to('/admin');
       }
    }
    public function getLogout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
         return Redirect::to('/dashboard');  
        }else{
        return Redirect::to('/admin')->send();
        }
    }
    public function getAll(){
            $this->AuthLogin();
            $all_admin_account = DB::table('admin')->get();
            $manager_admin_account = view('admin.admin_account')->with('all_admin_account',$all_admin_account);
            return view('adminlayout')->with('admin.admin_account',$manager_admin_account);
    }
    public function addAdminAccount(){
        $this->AuthLogin();
        return view('admin.add_admin_account');
    }
    public function storeAdminAccount(Request $request){
        $this->AuthLogin();
        $data= $request->validate([
            'admin_username' => 'unique:admin'],
        [   'admin_username.unique' => 'Tên đăng nhập đã tồn tại!'
        ]);
        $data['admin_name']=$request->admin_name;
        $data['admin_username']=$request->admin_username;
        $data['admin_password']=md5($request->admin_password);
        $data['admin_phone']=$request->admin_phone;
        $data['admin_role']=$request->admin_role;
        DB::table('admin')->insert($data);
        Toastr::success('Thêm mới thành công','Thành công');
        return Redirect::to('admin-account');
    }
    public function editAdminAccount($admin_id){
        $this->AuthLogin();
        $edit_admin_account = DB::table('admin')->where('admin_id',$admin_id)->get();
        $manager_admin_account = view('admin.edit_admin_account')->with('edit_admin_account',$edit_admin_account);
        
        return view('adminlayout')->with('admin.edit_admin_account',$manager_admin_account);
    }
    public function updateAdminAccount(Request $request,$admin_id){
        $this->AuthLogin();
        $data = array();
        $data['admin_name']=$request->admin_name;
        $data['admin_username']=$request->admin_username;
        $data['admin_password']=md5($request->admin_password);
        $data['admin_phone']=$request->admin_phone;
        $data['admin_role']=$request->admin_role;
        
        DB::table('admin')->where('admin_id',$admin_id)->update($data);
        Toastr::success('Cập nhật thông tin','Thành công');
        return Redirect::to('admin-account');
    }
    public function deleteAdminAccount($admin_id){
        $this->AuthLogin();
        DB::table('admin')->where('admin_id',$admin_id)->delete();
        Toastr::success('Xóa quản trị viên','Thành công');
        return Redirect::to('admin-account');
    }

    public function getAllJob(){
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        $all_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')
        ->join('employer','employer.employer_id','=','job.employer_id')->get();
        
        return view('admin.job')->with('all_job',$all_job);
    }
    public function unactiveJob($job_id){
        $this->AuthLogin();
        DB::table('job')->where('job_id',$job_id)->update(['job_status'=>0]);
        // Session::put('message','Tắt kích hoạt danh mục ngành nghề thành công');
        Toastr::success('Ẩn tin tuyển dụng thành công','Thành công');
        return Redirect::to('admin/job');
    }
    
    
    public function activeJob($job_id){
        $this->AuthLogin();
        DB::table('job')->where('job_id',$job_id)->update(['job_status'=>1]);
        Toastr::success('Hiển thị tin tuyển dụng thành công','Thành công');
        return Redirect::to('admin/job');
    }
    public function deleteJob($job_id){
        $this->AuthLogin();
        DB::table('job')->where('job_id',$job_id)->delete();
        Toastr::success('Xóa tin tuyển dụng','Thành công');
        return Redirect::to('admin/job');
    }
    public function getAllEmployer(){
        $this->AuthLogin();
        $all_employer = DB::table('employer')->get();
       
        return view('admin.employer')->with('all_employer',$all_employer);
}
public function deleteEmployer($employer_id){
    $this->AuthLogin();
    DB::table('employer')->where('employer_id',$employer_id)->delete();
    Toastr::success('Xóa nhà tuyển dụng','Thành công');
    return Redirect::to('admin/employer');
}
public function getAllEmployee(){
    $this->AuthLogin();
    $all_employee = DB::table('employee')->get();
   
    return view('admin.employee')->with('all_employee',$all_employee);
}
public function deleteEmployee($employee_id){
    $this->AuthLogin();
    DB::table('employee')->where('employee_id',$employee_id)->delete();
    Toastr::success('Xóa ứng viên','Thành công');
    return Redirect::to('admin/employee');
}
}
