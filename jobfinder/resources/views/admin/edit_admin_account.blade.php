@extends('adminlayout')
@section('content')
        <div class="row d-flex justify-content-center"> 
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cập nhật tài khoản</h4>
                    @foreach ($edit_admin_account as $key => $edit_value )
                    <form class="forms-sample" method="POST" action="{{URL::to('/update-admin-account/'.$edit_value->admin_id)}}">
                    {{csrf_field()}}
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên" name="admin_name" 
                        value="{{$edit_value->admin_name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Username" name="admin_username"value="{{$edit_value->admin_username}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="admin_password" value="{{$edit_value->admin_password}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputText" placeholder="Phone" name="admin_phone" value="{{$edit_value->admin_phone}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelect">Quyền quản trị</label>
                        <select class="form-control" id="exampleSelect" name="admin_role" >
                          <option selected="selected">{{$edit_value->admin_role}}</option>
                          <option>ADMINISTRATOR</option>
                          <option>SUPERVISOR</option>
                        </select>
                      </div>
                      <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> -->
                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                     
                    </form>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>   
@endsection
            
            