@extends('adminlayout')
@section('content')
        <div class="row d-flex justify-content-center"> 
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm danh mục ngành nghề</h4>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form class="forms-sample" method="POST" action="{{URL::to('admin/store-category')}}">
                    {{csrf_field()}}
                      <div class="form-group">
                        <label for="exampleInputName1">Tên ngành nghề</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên ngành nghề" required name="category_name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Mô tả</label>
                        <textarea type="text" id="exampleFormControlTextarea1" class="form-control" row="3" name="category_desc" placeholder="Mô tả về ngành nghề"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelect">Trạng thái</label>
                        <select class="form-control" id="exampleSelect" name="category_status">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0">Ẩn</option>
                        </select>
                      </div>
                                         
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>   
@endsection
            
            