@extends('welcome')
@section('content')

<div class="container my-3" style="height:80vh;">
<div class="row d-flex justify-content-center border p-3">
@foreach ($job as $j )
    <h5>Bạn đang ứng tuyển công việc: <span class="text-primary">{{$j->job_name}}</span></h5>
    <p class="text-danger">Vui lòng luôn luôn kiểm tra lại thông tin cá nhân trước khi thực hiện việc tải lên CV để ứng tuyển</p>
   

@endforeach
</div>
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
<form class=col-6 action="{{URL::to('/employee-getapply/'.$job_id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

    

  <!-- Email input -->
  <div class="form-outline mb-2">
    <label class="form-label" for="form2Example1">Tải lên CV</label>
    <input type="file" id="form2Example1" class="form-control" required name="employee_cv" />
  </div>
  <!-- Submit button -->
  <div class="row d-flex justify-content-center">
    <button type="submit" class="btn mb-4">Ứng tuyển</button>
  </div>

</form>
</div>
</div>
@endsection