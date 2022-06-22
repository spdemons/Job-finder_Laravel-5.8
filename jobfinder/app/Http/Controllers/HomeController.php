<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
use Carbon\Carbon;
session_start();

class HomeController extends Controller
{
    //
    public function index(){
        $province = DB::table('province')->get();
        $category = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get() ;
        $new_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')->where('job_status',1)
        ->whereDay('job_closeday', '>=', Carbon::today())->orderby('job_id','desc')->limit(5)->get() ;
        return view('pages.home')->with('category',$category)->with('new_job',$new_job)->with('province',$province);
    }
    public function getJobByCateId($category_id){
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        // dd($company_id);
        $all_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')
        ->where('category.category_id',$category_id)->where('job_status',1)
        ->whereDay('job_closeday', '>=', Carbon::today())->paginate(5) ;
        return view('pages.joblistbycategory',compact('category','province'))->with('job',$all_job)->with('category_id',$category_id);
    }
    public function getJobDetailsById($job_id){
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        // $employer = DB::table('employer')->where('employer_id',$employer_id)->get();
        // dd($company_id);
        $job_details = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')->join('employer','employer.employer_id','=','job.employer_id')
        ->where('job_id',$job_id)->get();
        return view('pages.jobdetail',compact('category','province'))->with('job_details',$job_details);
    }
    public function getAllJob(){
        $category = DB::table('category')->get();
        $province = DB::table('province')->get();  
        // dd($company_id);
        $all_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')->join('employer','employer.employer_id','=','job.employer_id')
        ->where('job_status',1)
        ->whereDay('job_closeday', '>=', Carbon::today())->orderby('job_id','desc')->paginate(5) ;
        return view('pages.joblist',compact('category','province'))->with('job',$all_job);
    }
    public function search(Request $request){
    //    $key= $request->key;
/*         $search_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')->join('employer','employer.employer_id','=','job.employer_id')
        ->where('job_name','like','%'.$key.'%')->whereDay('job_closeday', '>=', Carbon::today())
        ->orWhere('category.category_name','like','%'.$key.'%')
        ->orWhere('province.province_name','like','%'.$key.'%')
        ->where('job_status',1)
        ->orderby('job_id','desc')->paginate(5) ; */

        $key = $request->key;
        $province_id = $request->province_id;
        $category_id = $request->category_id;
        $search_job = DB::table('job')->join('category','category.category_id','=','job.category_id')
        ->join('province','province.province_id','=','job.province_id')->join('employer','employer.employer_id','=','job.employer_id')
        ->whereDay('job_closeday', '>=', Carbon::today())
        ->where('job_status',1);
       
        if ($key != Null) {
            $search_job->where(function ($q) use ($key) {
                $q->where('job.job_name', 'like', '%'.$key.'%');
                    
            });
        }
       
        if ($category_id != -1) {
            $search_job->where('job.category_id',$category_id);
        } 
        if ($province_id != -1) {
            $search_job->where('job.province_id',$province_id);
        }
        $search =  $search_job->paginate(5);
        $count_job = $search->count();
        return view('pages.search')->with('job',$search)->with('count_job',$count_job)
        ->with('test',$province_id)->with('test1',$category_id)->with('test2',$key);
    }
    public function contact(){
        return view('pages.contact');
    }
}
