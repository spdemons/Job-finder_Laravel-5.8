@extends('welcome')
@section('content')

<div class="container my-3" style="height:80vh;">
<div class="row d-flex justify-content-center  p-3"><h3>Trang Thông báo</h3></div>
<div class="row d-flex justify-content-center border p-2">

@foreach ($notification as $noti )

    
    <?php
if ($noti->apply_status==1) {
    ?>
        
       <div class="col-8">
        <div class="alert alert-success">
            <strong>Chúc mừng!</strong> Bạn đã được qua vòng sơ loại cho công việc <a href="{{URL::to('job-details/'.$noti->job_id)}}" class="alert-link">{{$noti->job_name}}</a>. 
            <p>Vui lòng chờ thông báo phỏng vấn sau.</p> 
        </div>
       </div>  
        <?php
        } else {
        ?>
         <?php
            if ($noti->apply_status==2) {
        ?>
        <div class="col-8">
        <div class="alert alert-secondary">
            <strong>Rất tiếc!</strong> Bạn đã không qua vòng sơ loại cho công việc <strong>{{$noti->job_name}}</strong> Đừng buồn! Vẫn còn nhiều cơ hội với bạn.
        </div>
        </div>
        
<?php
}}
?>
@endforeach
</div>
<div class="row d-flex justify-content-end mr-4">{{$notification->links()}}</div>
@endsection