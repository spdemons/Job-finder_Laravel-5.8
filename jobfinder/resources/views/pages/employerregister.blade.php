@extends('employer')
@section('content')

<div class="container my-3" style="height:80vh;">
<div class="row d-flex justify-content-center border p-3">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<div class="row d-flex justify-content-center border p-3">
<form class=col-6 action="{{URL::to('/store-employer')}}" method="post">
{{csrf_field()}}
  <!-- Email input -->
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Tên đăng nhập</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_username"/>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example2">Mật khẩu</label>
    <input type="password" id="form2Example2" class="form-control" required name="employer_password"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Tên công ty</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_name"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Địa chỉ</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_address"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Số điện thoại</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_phone"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Mô tả</label>
    <textarea type="text" id="exampleFormControlTextarea1" class="form-control" row="3" required name="employer_desc"></textarea>
  </div>
  <!-- Submit button -->
  <div class="row d-flex justify-content-center">
    <button type="submit" class="btn mb-4">ĐĂNG KÝ</button>
  </div>
  
</form>
</div>
</div>
@endsection