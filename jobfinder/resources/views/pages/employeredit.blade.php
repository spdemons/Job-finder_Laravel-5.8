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
<form class=col-6 action="{{URL::to('/employer-update')}}" method="post">
{{csrf_field()}}
@foreach ($employer as $key=>$epr)
    

  <!-- Email input -->
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Tên đăng nhập</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_username" value="{{$epr->employer_username}}" readonly/>
  </div>

  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Tên công ty</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_name" value="{{$epr->employer_name}}" />
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Địa chỉ</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_address" value="{{$epr->employer_address}}" />
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Số điện thoại</label>
    <input type="text" id="form2Example1" class="form-control" required name="employer_phone" value="{{$epr->employer_phone}}" />
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Mô tả</label>
    <textarea type="text" id="exampleFormControlTextarea1" class="form-control" row="3" required name="employer_desc">{{$epr->employer_desc}}</textarea>
  </div>
  @endforeach
  <!-- Submit button -->
  <div class="row d-flex justify-content-center">
    <button type="submit" class="btn mb-4">Cập nhật</button>
  </div>
  
</form>
</div>
</div>
@endsection