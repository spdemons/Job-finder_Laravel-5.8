@extends('employer')
@section('content')
<div class="container my-3" >
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
    <div class="col-9 mx-auto">
    @foreach ($job_details as $jd )
<form action="{{URL::to('/employer/update-job/'.$jd->job_id)}}" method="post">
{{csrf_field()}}

  
  <div class="row d-flex align-items-center form-outline mb-2">
      <div class="col-2"><label class="form-label" >Nghành nghề  </label></div>
    <div class="col-4">
											<select id="e1" name="category_id">
                                                @foreach($category as $cate)
                                                @if($cate->category_id == $jd->category_id)
												<option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endif
                                    @endforeach
									</select></div>
<div class="col-2"><label class="form-label" >Địa điểm</label></div>
    <div class="col-4">
    <select id="e2" name="province_id">
    @foreach($province as $prov)
    @if($prov->province_id == $jd->province_id)
    <option selected value="{{$prov->province_id}}">{{$prov->province_name}}</option>
    @else
    <option value="{{$prov->province_id}}">{{$prov->province_name}}</option>
    @endif
    @endforeach
</select></div>
  </div>
  
      
  
  <div class="form-group mb-2">
    <label class="form-label" for="form2Example1">Tên công việc</label>
    <input type="text" id="form2Example1" class="form-control" value ="{{$jd->job_name}}" required name="job_name"/>
  </div>

  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example2">Lương </label>
    <input type="text" id="form2Example2" class="money form-control" value ="{{$jd->job_salary}}" required name="job_salary"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example2">Số lượng</label>
    <input type="text" id="form2Example1" class="form-control" value ="{{$jd->job_quantity}}" required name="job_quantity"/>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Mô tả</label>
    <textarea type="text" id="exampleFormControlTextarea1" class="form-control" row="3" required name="job_desc">{{$jd->job_desc}}</textarea>
  </div>
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Yêu cầu</label>
    <textarea type="text" id="exampleFormControlTextarea1" class="form-control" row="3" required name="job_requirement">{{$jd->job_requirement}}</textarea>
  </div>
  
  <div class="form-group">
<label for="exampleInputCompany">Ngày hết hạn</label>
<input type="date" name ="job_closeday" value="{{$jd->job_closeday}}" class="form-control" required />
</div>
<div class="form-group">
                        <label for="exampleSelect">Trạng thái</label>
                        <select class="form-control" id="exampleSelect" name="job_status">
                        @if($jd->job_status == 1)
                                        <option selected value="1">Hiển Thị</option>
                                        <option value="0">Ẩn</option>
                        @else
                                        <option value="1">Hiển Thị</option>
                                        <option selected value="0">Ẩn</option>
                        @endif
                        </select>
                      </div>
  <div class="row d-flex justify-content-center">
    <button type="submit" class="btn mb-4">Cập nhật</button>
  </div>
  
</form>
@endforeach
</div>
</div>
</div>

@endsection