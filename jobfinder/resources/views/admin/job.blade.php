@extends('adminlayout')
@section('content')
<div class="row">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tin tuyển dụng</h4>
                    <table id="table1" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Tên </th>
                          <th>Ngành nghề</th>
                          <th>Nhà tuyển dụng</th>
                          <th>Số lượng</th>
                          <th>Lương</th>
                          <th>Địa điểm</th>
                          <th>Ngày tạo</th>
                          <th>Ngày đóng</th>
                          <th class="d-flex justify-content-center">Trạng thái</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
          @foreach($all_job as $job)
          <tr>
            
            <td>{{ $job->job_name }}</td>
            <td>{{ $job->category_name }}</td>
            <td>{{ $job->employer_name }}</td>
            <td>{{ $job->job_quantity }}</td>
            <td>{{ $job->job_salary }} VND</td>
            <td>{{ $job->province_name }}</td>
            <td>{{ $job->job_createday }}</td>
            <td>{{ $job->job_closeday }}</td>
            <td class="d-flex justify-content-center"><?php
                 if($job->job_status==0){
                   ?>
                    <a href="{{URL::to('admin/active-job/'.$job->job_id)}}"><i class="fas fa-thumbs-down text-danger"></i></a>
                  <?php
                  }else{
                    ?>
                    <a href="{{URL::to('admin/unactive-job/'.$job->job_id)}}"><i class="fas fa-thumbs-up text-success"></i></a>
                  <?php
                  }
              ?></td>
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa tin này không? ')"  href="{{URL::to('admin/delete-job/'.$job->job_id)}}" class="active styling-delete" style ="margin-left: 5px;" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
                    </table>
                  </div>
                </div>
            </div>
@endsection