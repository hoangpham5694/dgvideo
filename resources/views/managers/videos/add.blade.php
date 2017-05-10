@extends('managers.master')
@section('header')
    <title>Manager::Thêm video</title>
 
@endsection
@section('title','Thêm video')
@section('content')

<div class="col-md-7" >
	<form name="frmTeacher" action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label class="control-label col-sm-3" for="lastname">Tiêu đề:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"  required="true" name="txtTitle" id="lastname" placeholder="Vui lòng nhập tiêu đề">

    </div>
  </div>
    
 
 
   <div class="form-group">
    <label class="control-label col-sm-3" for="salarylevel">Danh mục:</label>
    <div class="col-sm-9">

         @foreach($cates as $cate)
             <div class="checkbox">
              <label><input type="checkbox" name="cblCate[]" value="{{ $cate->id }}">{{ $cate->name }}</label>
            </div>
         @endforeach


    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="url">Đường dẫn:</label>
    <div class="col-sm-9">
      <input type="url" class="form-control"  required="true" name="txtUrl" id="url" placeholder="Vui lòng nhập tiêu đề">

    </div>
  </div>

      <div class="form-group">
    <label class="control-label col-sm-3" for="description">Mô tả:</label>
    <div class="col-sm-9">

        <textarea name="txtDescription" id="description" class="form-control" rows="3" ></textarea>

    </div>
  </div>
     
  

       



  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" ng-disabled="frmTeacher.$invalid"  class="btn btn-default">Thêm Video</button>
    </div>
  </div>
</form>

</div>

@endsection
@section('footer')

@endsection
