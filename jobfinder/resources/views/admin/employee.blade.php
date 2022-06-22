@extends('adminlayout')
@section('content')
<div class="row">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Người dùng</h4>
                    <table id="table1" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Tên ứng viên</th>
                          <th>Email</th>
                          
                          <th>Số điện thoại</th>
                          <th>Ngày sinh</th>
                          <th>Giới tính</th>
                         
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
          @foreach($all_employee as $epe)
          <tr>
            
            <td>{{ $epe->employee_name }}</td>
            <td>{{ $epe->employee_email }}</td>
            <td>{{ $epe->employee_phone }}</td>
            <td>{{ $epe->employee_dob }}</td>
            <td>{{ $epe->employee_gender }}</td>
           
            
           
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn nhà tuyển dụng này không? ')"  href="{{URL::to('admin/delete-employee/'.$epe->employee_id)}}" class="active styling-delete" style ="margin-left: 5px;" ui-toggle-class="">
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