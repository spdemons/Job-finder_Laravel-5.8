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
            <div class="row my-3 align-items-center">
                <div class="col-6 d-flex justify-content-center "><h5 class="text-primary ">CÁC TIN ĐÃ ĐĂNG</h5></div>
                <div class="col-6 d-flex justify-content-center"><a class="btn text-white" href="{{URL::to('employer/add-job')}}">Đăng tin tuyển dụng</a></div>
            </div>
            <div class="row border my-3"></div>
                <div class="row">
                    <!-- Left content -->

                    <!-- Right content -->
                    <div class="col-9 mx-auto">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                            
                            @php
                            $employer_id = Session::get('employer_id');
                                $count_job = DB::table('job')->where('job_status',1)->where('employer_id',$employer_id)->count();
                                @endphp
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span>{{$count_job}} công việc</span>
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
                                            <a href="#"><img src="{{asset('public/frontend/assets/img/icon/job-finder.jpg')}}" width="85" height="85"alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            
                                                <h4>{{$jobs->job_name}}</h4>
                                            
                                            <ul>
                                                <li>{{$jobs->category_name}}</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{$jobs->province_name}}</li>
                                                <li ><span class="money">{{$jobs->job_salary}}</span><span> VND</span></li>
                                            </ul>
                                            @php
                                            $job_id= $jobs->job_id;
                                            $count = DB::table('apply_detail')->where('job_id',$job_id)->where('apply_status','=','0')->count();
                                            $count_p = DB::table('apply_detail')->where('job_id',$job_id)->where('apply_status','=','1')->count();
                                        @endphp
                                        <div class="row ml-2 mt-1"> <span>{{$count}} ứng viên đã ứng tuyển</span></div>
                                        <div class="row ml-2 mt-1"> <span>{{$count_p}} ứng viên đã qua vòng sơ loại</span></div>
                                        </div>
                                    </div>
                                    
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{URL::to('/employer/job-details/'.$jobs->job_id)}}">Chi tiết</a>
                                        <span>Trạng thái: <?php $temp = $jobs->job_status;
                                        if($temp ==1){
                                            echo 'Hiển thị';
                                        }else{ echo 'Ẩn';} ?></span>
                                        <span>{{ \Carbon\Carbon::parse($jobs->job_createday)->diffForHumans()}}</span>
                                        @php
                                            $closeday= $jobs->job_closeday;
                                            $today= \Carbon\Carbon::today();
                                            
                                        @endphp
                                        @php
                                            if($closeday < $today){
                                        @endphp
                                        <span class="text-danger">Đã hết hạn</span>
                                        @php
                                            }   
                                       @endphp
                                    </div>
                                    
                                    
                                </div>
                                <!-- single-job-content -->
                                @endforeach
                                <div class="row d-flex justify-content-end mr-4">{{$job->links()}}</div>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
@endsection