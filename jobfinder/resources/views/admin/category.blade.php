@extends('adminlayout')
@section('content')
<div class="row">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh mục ngành nghề</h4>
                    <table id="table1" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Tên danh mục</th>
                          <th>Mô tả</th>
                          <th class="d-flex justify-content-center">Trạng thái</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
          @foreach($all_category as $key => $cate)
          <tr>
            
            <td>{{ $cate->category_name }}</td>
            <td>{{ $cate->category_desc }}</td>
            <td class="d-flex justify-content-center"><?php
                 if($cate->category_status==0){
                   ?>
                    <a href="{{URL::to('admin/active-category/'.$cate->category_id)}}"><i class="fas fa-thumbs-down text-danger"></i></a>
                  <?php
                  }else{
                    ?>
                    <a href="{{URL::to('admin/unactive-category/'.$cate->category_id)}}"><i class="fas fa-thumbs-up text-success"></i></a>
                  <?php
                  }
              ?></td>
            <td>
              <a href="{{URL::to('admin/edit-category/'.$cate->category_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fas fa-edit"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không? ')"  href="{{URL::to('admin/delete-category/'.$cate->category_id)}}" class="active styling-delete" style ="margin-left: 5px;" ui-toggle-class="">
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