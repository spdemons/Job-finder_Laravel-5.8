@extends('adminlayout')
@section('content')
<div class="row">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nhà tuyển dụng</h4>
                    <table id="table1" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Tên đăng nhập</th>
                          <th>Tên nhà tuyển dụng</th>
                          <th>Địa chỉ</th>
                          <th>Số điện thoại</th>
                          
                         
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
          @foreach($all_employer as $epr)
          <tr>
            
            <td>{{ $epr->employer_username }}</td>
            <td>{{ $epr->employer_name }}</td>
            <td>{{ $epr->employer_address }}</td>
            <td>{{ $epr->employer_phone }}</td>
           
            
           
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn nhà tuyển dụng này không? ')"  href="{{URL::to('admin/delete-employer/'.$epr->employer_id)}}" class="active styling-delete" style ="margin-left: 5px;" ui-toggle-class="">
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