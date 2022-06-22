@extends('welcome')
 @section('content')
     
 <div class="job-listing-area pt-120 pb-120">
            <div class="container">
 
            <div class="row border my-3"></div>
                <div class="row">
                    <!-- Left content -->
                   <!--  <div class="col-xl-3 col-lg-3 col-md-4">
                       
                    <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-category-listing mb-50">
                            
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Category</h4>
                               </div>
                               
                                <div class="select-job-items2">
                                    <select name="select">
                                        <option value="">All Category</option>
                                        <option value="">Category 1</option>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                        <option value="">Category 4</option>
                                    </select>
                                </div>

                            </div>
                        
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Location</h4>
                               </div>
                               
                                <div class="select-job-items2">
                                    <select name="select">
                                        <option value="">Anywhere</option>
                                        <option value="">Category 1</option>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                        <option value="">Category 4</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="single-listing">
                                
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox" >
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 2 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 3 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 5 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 10 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div> -->
                    <!-- Right content -->
                    <div class="col-9 mx-auto">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                            
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                       
                                            <span>Đã ứng tuyển {{$count}} công việc </span>
                                            <!-- Select job items start -->
                                            
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                
                                    
                                @foreach ($job as $jobs )
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img src="{{asset('public/frontend/assets/img/icon/job-finder.jpg')}}"width="85" height="85" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            
                                                <h4>{{$jobs->job_name}}</h4>
                                            
                                            <ul>
                                                <li>{{$jobs->category_name}}</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{$jobs->province_name}}</li>
                                                <li ><span class="money">{{$jobs->job_salary}}</span><span> VND</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="items-link items-link2 f-right">
                                    <?php
if ($jobs->apply_status==0) {
    ?>
     <span class="text-warning">Chưa có kết quả</span>
<?php
} else {
    ?>
    <?php
if ($jobs->apply_status==1) {
    ?>
     <span class="text-success">Đã qua vòng sơ loại</span>
    <?php
}else {  
?>
     <span class="text-danger">Đã trượt vòng sơ loại</span>
<?php
}
?>
<?php
}
?>
                                        
                                    </div>
                                </div>
                                @endforeach
                                
                                <!-- single-job-content -->
                                <div class="row d-flex justify-content-end mr-4">{{$job->links()}}</div>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>

@endsection