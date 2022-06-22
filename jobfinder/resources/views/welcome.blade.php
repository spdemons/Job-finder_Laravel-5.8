<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job-Finder </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/assets/img/favicon.ico')}}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/price_rangs.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}">
            <link rel="stylesheet" href="{{asset('public/frontend/assets/css/niceselect.css')}}">
           <!-- <link href="{{asset('public/frontend/assets/select2/css/select2.min.css')}}" rel="stylesheet" /> -->
           <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/frontend/assets/img/logo/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{URL::to('/index')}}"><img src="{{asset('public/frontend/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-10 col-md-9 ">
                            <div class="menu-wrapper">
                                <?php
                               $employee_id = Session::get('employee_id');
                               $employee_name = Session::get('employee_name');
                               
                               if ($employee_id!=null){?>
                               <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{URL::to('/index')}}">Trang chủ</a></li>
                                            <li><a href="{{URL::to('/job-list')}}">Danh sách việc làm</a></li>
                                            
                                            <li><a href="contact.html">Liên hệ</a></li>
                                            <li><a href="#"><i class="fas fa-user mr-2"></i>{{$employee_name}}</a>
                                                <ul class="submenu">
                                                    <li><a href="{{URL::to('/employee-edit')}}">Cập nhật thông tin</a></li>
                                                    <li><a href="{{URL::to('/employee-notification')}}">Thông báo</a></li>
                                                    <li><a href="{{URL::to('/employee-hasapply')}}">Công việc đã ứng tuyển</a></li>
                                                    <li><a href="{{URL::to('/employee-logout')}}">Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>        
                               <?php }else{ ?>
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{URL::to('/index')}}">Trang chủ</a></li>
                                            <li><a href="{{URL::to('/job-list')}}">Danh sách việc làm</a></li>
                                            <li><a href="{{URL::to('/employer-login')}}">Nhà tuyển dụng</a></li>
                                            <!-- <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li> -->
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{URL::to('/employee-register')}}" class="btn head-btn1">Đăng kí</a>
                                    <a href="{{URL::to('/employee-login')}}" class="btn head-btn2">Đăng nhập</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>
    <main>

       @yield('content')

    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                             <div class="footer-tittle">
                                 <h4>Về chúng tôi</h4>
                                 <div class="footer-pera">
                                     <p> Bằng công nghệ, chúng tôi tạo ra nền tảng cho phép người lao động tạo CV, phát triển được các kỹ năng cá nhân, xây dựng hình ảnh chuyên nghiệp trong mắt nhà tuyển dụng và tiếp cận với các cơ hội việc làm phù hợp.</p>
                                </div>
                             </div>
                         </div>

                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Thông tin liên hệ</h4>
                                <ul>
                                    <li>
                                    <p>Địa chỉ : Thành phố Đà Nẵng.</p>
                                    </li>
                                    <li><a href="#">Điện thoại : 0123456789</a></li>
                                    <li><a href="#">Email : support@jobfinder.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Liên kết</h4>
                                <ul>
                                    
                                    <li><a href="#">Liên hệ</a></li>
                                    <li><a href="#">Testimonial</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Hỗ trợ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  
                </div>
               <!--  -->
               <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                        <a href="index.html"><img src="{{asset('public/frontend/assets/img/logo/logo2_footer.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Nhà tuyển dụng</p>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Người dùng</p>
                        </div>
                    </div>
                   
               </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="fa fa-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a>
   Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

  <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('public/frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('public/frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('public/frontend/assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/price_rangs.js')}}"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('public/frontend/assets/js/wow.min.js')}}"></script>
		<script src="{{asset('public/frontend/assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset('public/frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('public/frontend/assets/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('public/frontend/assets/js/contact.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/mail-script.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('public/frontend/assets/js/plugins.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/main.js')}}"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
  <!--       <script src="{{asset('public/frontend/assets/select2/js/select2.min.js')}}"></script>
        <script>
      $(document).ready(function() { $("#e1").select2(); });
      $(document).ready(function() { $("#e2").select2(); });
 </script> -->
    </body>
</html>