@extends('welcome')
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
<form class=col-6 action="{{URL::to('/employee-update')}}" method="post">
{{csrf_field()}}
@foreach ($employee as $ee )
    

  <!-- Email input -->
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Email</label>
    <input type="email" id="form2Example1" class="form-control" required name="employee_email" value="{{$ee->employee_email}}" disabled/>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example2">Mật khẩu</label>
    <input type="password" id="form2Example2" class="form-control" required name="employee_password" value="{{$ee->employee_password}}"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Tên </label>
    <input type="text" id="form2Example1" class="form-control" required name="employee_name" value="{{$ee->employee_name}}"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Số điện thoại</label>
    <input type="text" id="form2Example1" class="form-control" required name="employee_phone" value="{{$ee->employee_phone}}"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Giới tính</label>
    <input type="text" id="form2Example1" class="form-control" required name="employee_gender" value="{{$ee->employee_gender}}"/>
  </div>
  <div class="form-group">
<label for="exampleInputCompany">Ngày sinh</label>
<input type="date"  class="form-control" name="employee_dob" required value="{{$ee->employee_dob}}"/>
</div>
  <!-- Submit button -->
  <div class="row d-flex justify-content-center">
    <button type="submit" class="btn mb-4">Cập nhật</button>
  </div>
  @endforeach
</form>
</div>
</div>
@endsection