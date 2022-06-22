@extends('employer')
@section('content')
 <!-- Hero Area Start-->
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
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    @foreach ($job_details as $jd )
                        
                    
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{asset('public/frontend/assets/img/icon/job-finder.jpg')}}" width="85" height="85" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                   
                                        <h4>{{$jd->job_name}}</h4>
                                    
                                    <ul>
                                        <li>{{$jd->category_name}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$jd->province_name}}</li>
                                        <li ><span class="money">{{$jd->job_salary}}</span><span> VND</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Mô tả công việc</h4>
                                </div>
                                <p>{{$jd->job_desc}}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Yêu cầu</h4>
                                </div>
                                <p>{{$jd->job_requirement}}</p>
                            </div>
                        </div>
                        <div class="post-details2 d-flex justify-content-center mb-50">
                        <a href="{{URL::to('employer/edit-job/'.$jd->job_id)}}" class="genric-btn primary radius">Chỉnh sửa bài viết</a>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                   
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Tổng quan công việc</h4>
                           </div>
                          <ul>
                              <li>Ngày đăng : <span>{{$jd->job_createday}}</span></li>
                              <li>Địa điểm : <span>{{$jd->province_name}}</span></li>
                              <li>Số lượng : <span>{{$jd->job_quantity}}</span></li>
                              <li ><span class="money">{{$jd->job_salary}}</span><span> VND</span></li>
                              <li>Hạn nộp hồ sơ : <span>{{$jd->job_closeday}}</span></li>
                              @php
                            $job_id= $jd->job_id;
                                $count = DB::table('apply_detail')->where('job_id',$job_id)->where('apply_status','=','0')->count();
                                @endphp
                              <li>Ứng viên đã ứng tuyển : <span class="text-danger">{{$count}}</span></li>
                              <li class="d-flex justify-content-center my-1"><a href="{{URL::to('employer/has-apply/'.$jd->job_id)}}" class="genric-btn danger radius">Danh sách ứng viên</a></li>
                          </ul>
                       </div>
                       @endforeach
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                            @foreach ( $employer as $epr )
                                
                            
                           <div class="small-section-tittle">
                               <h4>Thông tin về công ty</h4>
                           </div>
                              <span>{{$epr->employer_name}}</span>
                              <p>{{$epr->employer_desc}}</p>
                            <ul>
                                <li>Tên công ty: <span>{{$epr->employer_name}}</span></li>
                                <li>Số điện thoại liên hệ : <span> {{$epr->employer_phone}}</span></li>
                            </ul>
                            @endforeach
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- job post company End -->
@endsection