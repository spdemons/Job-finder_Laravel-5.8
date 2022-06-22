@extends('employer')
@section('content')
<div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('public/frontend/assets/img/hero/about.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Giúp doanh nghiệp của bạn vươn xa</h2>
                                <h3 class="text-white">Tìm đúng người, trao đúng việc</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="job-listing-area pt-120 pb-120">
            <div class="container">
            <div class="row my-3 align-items-center d-flex justify-content-center">
                <h5 class="text-primary ">DANH SÁCH ỨNG VIÊN ĐÃ ỨNG TUYỂN</h5>
                
            </div>
            <div class="row border my-3"></div>
                <div class="row">
                    <div class="col-9 mx-auto">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                              
                            @php
                            $employer_id = Session::get('employer_id');
                                
                                $count = DB::table('apply_detail')->where('job_id',$job_id)->where('apply_status','=','0')->count();
                                @endphp
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span> Ứng viên đã ứng tuyển: {{$count}}</span>
                                            <!-- Select job items start -->
                                            
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                
                            @if($list->count() >0)
                            @if(isset($list) && !empty($list))
                            @foreach ($list as $key => $l )
                                
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="job-tittle job-tittle2">
                                            
                                                <h4>{{$l->employee_name}}</h4>
                                            
                                            <ul>
                                                <li><i class="fas fa-envelope"></i>{{$l->employee_email}}</li>
                                                <li><i class="fas fa-phone"></i>{{$l->employee_phone}}</li>
                                                <li ><span>Giới tính: {{$l->employee_gender}}</span></li>
                                            </ul>
                                            <ul>
                                                <li><span><i class="fas fa-file"></i></span>File CV: <span><a class="text-success" target="_blank" href="{{asset('public/upload/'.$l->employee_cv)}}"> Tải về</a></span></li>
                                                <li><i class="fas fa-calendar-day"></i>Ngày sinh: {{$l->employee_dob}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="items-link items-link2 f-right">
                                        <a class="genric-btn success-border radius medium" href="{{URL::to('/employer/has-apply-accept/'.$l->job_id.'?employee_id='.$l->employee_id)}}">Chọn ứng viên</a>
                                        <a class="genric-btn danger-border radius medium" href="{{URL::to('/employer/has-apply-deny/'.$l->job_id.'?employee_id='.$l->employee_id)}}">Loại ứng viên</a>
                                        
                                        
                                        
                                    </div>
                                </div>
                                <!-- single-job-content -->
                               
                                @endforeach
                                @endif
                                @else
                                <p>Không có ứng viên</p>
                                @endif
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
            <div class="job-listing-area pt-120 pb-120">
            <div class="container">
            <div class="row my-3 d-flex justify-content-center align-items-center">
                <h5 class="text-primary ">CÁC ỨNG VIÊN ĐÃ QUA VÒNG SƠ LOẠI</h5>
                
            </div>
            <div class="row border my-3"></div>
                <div class="row">
                    <div class="col-9 mx-auto">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                            
                            @php
                            $employer_id = Session::get('employer_id');
                                
                                $count_1 = DB::table('apply_detail')->where('job_id',$job_id)->where('apply_status','=','1')->count();
                                @endphp
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span> Ứng viên đã qua vòng sơ loại: {{$count_1}}</span>
                                            <!-- Select job items start -->
                                            
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                
                                @if($list_pass->count() >0)
                                @if(isset($list_pass) && !empty($list_pass))
                                @foreach ($list_pass as $key => $lp ) 
                               
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="job-tittle job-tittle2">
                                            
                                                <h4>{{$lp->employee_name}}</h4>
                                            
                                            <ul>
                                                <li><i class="fas fa-envelope"></i>{{$lp->employee_email}}</li>
                                                <li><i class="fas fa-phone"></i>{{$lp->employee_phone}}</li>
                                                <li ><span>Giới tính: {{$lp->employee_gender}}</span></li>
                                            </ul>
                                            <ul>
                                                <li><span><i class="fas fa-file"></i></span>File CV: <span><a class="text-success" target="_blank" href="{{asset('public/upload/'.$lp->employee_cv)}}"> Tải về</a></span></li>
                                                <li><i class="fas fa-calendar-day"></i>Ngày sinh: {{$lp->employee_dob}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                                <!-- single-job-content -->
                               
                                @endforeach
                                @endif
                                @else
                                <p>Không có ứng viên</p>
                                @endif
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>  
        </div>
        </div>  
        </div>

@endsection