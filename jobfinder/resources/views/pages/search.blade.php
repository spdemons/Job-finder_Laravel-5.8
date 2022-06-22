@extends('welcome')
 @section('content')
     
 <div class="job-listing-area pt-120 pb-120">
            <div class="container">
 
            <div class="row border my-3"></div>
                <div class="row">
                    <!-- Left content -->

                    <!-- Right content -->
                    <div class="col-9 mx-auto">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                            @if($count_job==0)
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            
                                            <span>Không có công việc nào được tìm thấy</span>
                                            <!-- Select job items start -->
                                            <!-- <div class="select-job-items">
                                                <span>Sort by</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                </select>
                                            </div> -->
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                            @else    
                                   <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            
                                            <span>Tìm thấy {{$count_job}} công việc </span>
                                            <!-- Select job items start -->
                                            <!-- <div class="select-job-items">
                                                <span>Sort by</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                </select>
                                            </div> -->
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
                                        <a href="{{URL::to('/job-details/'.$jobs->job_id)}}">Chi tiết</a>
                                        <span>{{ \Carbon\Carbon::parse($jobs->job_createday)->diffForHumans()}}</span>
                                    </div>
                                </div>
                                @endforeach
                                
                                <!-- single-job-content -->
                                <div class="row d-flex justify-content-end mr-4">{{$job->links()}}</div>
                            </div>
                            @endif
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>

@endsection