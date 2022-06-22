@extends('adminlayout')
@section('content')
        <div class="row d-flex justify-content-center"> 
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sửa danh mục ngành nghề</h4>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@foreach ($edit_category as $key => $edit_value )
                    <form class="forms-sample" method="POST" action="{{URL::to('admin/update-category/'.$edit_value->category_id)}}">
                    {{csrf_field()}}
                      <div class="form-group">
                        <label for="exampleInputName1">Tên ngành nghề</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$edit_value->category_name}}" placeholder="Tên ngành nghề" required name="category_name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Mô tả</label>
                        <textarea type="text" id="exampleFormControlTextarea1" class="form-control"  row="3" name="category_desc" placeholder="Mô tả về ngành nghề">{{$edit_value->category_desc}}</textarea>
                      </div>
                                                 
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
@endforeach
                  </div>
                </div>
              </div>
            </div>   
@endsection
            
            