<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class CategoryController extends Controller
{
    //
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
        $all_category = DB::table('category')->get();
        $manager_category = view('admin.category')->with('all_category',$all_category);
        return view('adminlayout')->with('admin.category',$manager_category);
}
public function addCategory(){
    $this->AuthLogin();
    return view('admin.add_category');
}
public function storeCategory(Request $request){
    $this->AuthLogin();
    $data = array();
    $data['category_name']=$request->category_name;
    $data['category_desc']=$request->category_desc;
    $data['category_status']=$request->category_status;
    DB::table('category')->insert($data);
   Toastr::success('Thêm danh mục nghành nghề thành công','Thành công');
    return Redirect::to('admin/category');
}
public function unactiveCategory($category_id){
    $this->AuthLogin();
    DB::table('category')->where('category_id',$category_id)->update(['category_status'=>0]);
    // Session::put('message','Tắt kích hoạt danh mục ngành nghề thành công');
    Toastr::success('Tắt kích hoạt danh mục nghành nghề thành công','Thành công');
    return Redirect::to('admin/category');
}


public function activeCategory($category_id){
    $this->AuthLogin();
    DB::table('category')->where('category_id',$category_id)->update(['category_status'=>1]);
    Toastr::success('Kích hoạt danh mục nghành nghề thành công','Thành công');
    return Redirect::to('admin/category');
}
public function editCategory($category_id){
    $this->AuthLogin();
    $edit_category = DB::table('category')->where('category_id',$category_id)->get();
    $manager_category = view('admin.edit_category')->with('edit_category',$edit_category);
    
    return view('adminlayout')->with('admin.edit_category',$manager_category);
}
public function updateCategory(Request $request,$category_id){
    $this->AuthLogin();
    $data = array();
    $data['category_name']=$request->category_name;
    $data['category_desc']=$request->category_desc;
    
    DB::table('category')->where('category_id',$category_id)->update($data);
    Toastr::success('Cập nhật danh mục ngành nghề','Thành công');
    return Redirect::to('admin/category');
}
public function deleteCategory($category_id){
    $this->AuthLogin();
    DB::table('category')->where('category_id',$category_id)->delete();
    Toastr::success('Xóa danh mục nghành nghề thành công','Thành công');
    return Redirect::to('admin/category');
}
}
