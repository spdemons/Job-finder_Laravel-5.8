@extends('adminlayout')
@section('content')

            <div class="row">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản trị viên</h4>
                    <table id="table1" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Tên đăng nhập</th>
                          <th>Tên</th>
                          <th>Số điện thoại</th>
                          <th>Chức năng</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
          @foreach($all_admin_account as $key => $admin)
          <tr>
            
            <td>{{ $admin->admin_username }}</td>
            <td>{{ $admin->admin_name }}</td>
            <td>{{ $admin->admin_phone }}</td>
            <td>{{ $admin->admin_role }}</td>
            <td>
              <a href="{{URL::to('/edit-admin-account/'.$admin->admin_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fas fa-edit"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không? ')"  href="{{URL::to('/delete-admin-account/'.$admin->admin_id)}}" class="active styling-delete" style ="margin-left: 5px;" ui-toggle-class="">
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
            
            