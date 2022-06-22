@extends('employer')
@section('content')

<div class="container my-3" style="height:80vh;">

<div class="row d-flex justify-content-center ">

<p class="text-center text-danger">  
                  <?php
                    $message = Session::get('message');
                    if($message){
                      echo '<span class="text-alert">', $message,'</span>';
                      Session::put('message',null);
                    }
                  ?></p>
                  </div>

<div class="row d-flex justify-content-center border p-3">

  <form action="{{URL::to('/employer-getLogin')}}" method = "POST">
{{csrf_field()}}

  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Tên đăng nhập</label>
    <input type="text" id="form2Example1" name="employer_username" class="form-control" required/>
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Mật khẩu</label>
    <input type="password" id="form2Example2" name="employer_password" class="form-control" required/>
    
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-block mb-4">ĐĂNG NHẬP</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Chưa có tài khoản? <a class="text-primary" href="{{URL::to('/employer-register')}}">Đăng kí tại đây</a></p>
    <!-- <p>Hoặc đăng nhập với:</p>
    <button type="button" class="btn mx-1" disabled>
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn mx-1" disabled>
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn mx-1" disabled>
      <i class="fab fa-github"></i>
    </button> -->
  </div>
</form>
</div>
</div>
</div>
@endsection