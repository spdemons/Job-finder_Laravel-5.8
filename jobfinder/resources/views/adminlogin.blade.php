<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang quản trị</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('public/backend/assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('public/backend/assets/images/logo.svg')}}">
                </div>
                
                <h6 class="font-weight-bold text-center">ĐĂNG NHẬP TRANG QUẢN TRỊ</h6>
                <p class="text-center text-danger">  
                  <?php
                    $message = Session::get('message');
                    if($message){
                      echo '<span class="text-alert">', $message,'</span>';
                      Session::put('message',null);
                    }
                  ?></p>
                <form class="pt-3 needs-validation" method="POST" action="{{URL::to('/admin-login')}}">
                {{csrf_field()}}
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputText1" placeholder="Tên đăng nhập" name="admin_username" required>
                    
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mật khẩu" name="admin_password" required>
                   
                  </div>
                  <div class="mt-3 d-flex justify-content-center align-items-center">
                    <input type ="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="ĐĂNG NHẬP">
                  </div>
                  <div class="mt-5 d-flex justify-content-center align-items-center">
                     <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                  </div>
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- <script src="{{asset('public/backend/assets/vendors/js/vendor.bundle.base.js')}}"></script> -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <!-- <script src="{{asset('public/backend/assets/js/off-canvas.js')}}"></script>
     <script src="{{asset('public/backend/assets/js/hoverable-collapse.js')}}"></script> 
     <script src="{{asset('public/backend/assets/js/misc.js')}}"></script>  -->
    <!-- endinject -->
  </body>
</html>