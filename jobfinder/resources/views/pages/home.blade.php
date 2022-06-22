 @extends('welcome')
 @section('content')
     
 
 <!-- slider Area Start-->
 <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="{{asset('public/frontend/assets/img/hero/h1_hero.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-10 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Tìm cho bạn một công việc phù hợp nhất</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form action="{{URL::to('/search')}}" method ="post" >
                                {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="row">
                                                <div class="col my-2">
								                <input type="text" name="key" placeholder="Tên công việc, ngành nghề hoặc địa điểm làm việc" onfocus="this.placeholder = ''"
									                onblur="this.placeholder = 'key'"  class="single-input">
                                                </div>
                                            </div>
                                      
                                        <div class="row mb-2">
                                            <div class="col-8 default-select mr-1" id="default-select">
										        <select name="category_id">
                                                <option value="-1">Ngành nghề</option>
                                                     @foreach($category as $cate)
												    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                    @endforeach
								                </select>
							                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col default-select" id="default-select">
										        <select name="province_id" >
                                                <option value="-1">Địa điểm</option>
                                                     @foreach($province as $prov)
												    <option value="{{$prov->province_id}}">{{$prov->province_name}}</option>
                                                    @endforeach
								                </select>
							                </div>
                                        </div>
                                        </div>
                                        <div class="col-3"><button type ="submit" class="btn">Tìm kiếm</button></div>
                                    </div>
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>DANH MỤC NGÀNH NGHỀ</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    @foreach ( $category as $cate)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="{{URL::to('/job-list-by-category/'.$cate->category_id)}}">{{$cate->category_name}}</a></h5>
                               @php
                                $count_category = DB::table('job')->join('category','category.category_id','=','job.category_id')->where('job.category_id',$cate->category_id)->whereDay('job_closeday', '>=', \Carbon\Carbon::today())->where('job_status',1)->count();
                                @endphp
                                <span>{{$count_category}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
         <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="{{asset('public/frontend/assets/img/gallery/cv_bg.jpg')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">Chức năng nổi bật</p>
                            <p class="pera2">Tạo sự thay đổi với CV Online của bạn!</p>
                            <a href="#" class="border-btn2 border-btn4">Upload CV tại đây</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Công việc mới nhất</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ( $new_job as $nj)
                        
                    
                    <div class="col-xl-10">
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="job_details.html"><img src="{{asset('public/frontend/assets/img/icon/job-finder.jpg')}}"width="85" height="85" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="job_details.html"><h4>{{$nj->job_name}}</h4></a>
                                    <ul>
                                        <li>{{$nj->category_name}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$nj->province_name}}</li>
                                        <li>{{$nj->job_salary}} VND</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="{{URL::to('/job-details/'.$nj->job_id)}}">Chi tiết</a>
                                <span>{{ \Carbon\Carbon::parse($nj->job_createday)->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150" data-background="{{asset('public/frontend/assets/img/gallery/how-applybg.png')}}">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span></span>
                            <h2> Quy trình hoạt động</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                               <h5>1. Tìm kiếm công việc</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                               <h5>2. Ứng tuyển</h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                               <h5>3. Nhận thông báo </h5>
                               <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        
        <!-- Testimonial End -->
         <!-- Support Company Start-->
         <div class="support-company-area support-padding fix mb-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>Chúng tôi đã làm được những gì</span>
                                <h2>Giúp mọi người tiếp cận với công việc</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="{{asset('public/frontend/assets/img/service/support-img.jpg')}}" alt="">
                            <div class="support-img-cap text-center">
                                <p>Thành lập từ:</p>
                                <span>2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        
        <!-- Blog Area End -->
@endsection