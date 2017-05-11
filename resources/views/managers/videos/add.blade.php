@extends('managers.master')
@section('header')
    <title>Manager::Thêm video</title>
    <meta name="csrf-token" content="{{ Session::token() }}"> 
  <script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 var API = "{{ url('/') }}";
function hasExtension(inputID, exts) {
    var fileName = document.getElementById(inputID).value;
    return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
}

function isVideo(){
  //console.log("change");
   $("#status").html("");
  if (!hasExtension('fileVideo', ['.mp4', '.wmv', '.avi','.mkv'])) {
     $("#status").html("Không phải định dạng video");
     return false;
   }
  return true;
  
}
function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  if(!isVideo()){
    return false;
  }

  var file = _("fileVideo").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("fileVideo", file);
  formdata.append("_token", CSRF_TOKEN);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", API + "/managersites/video/upload");
  ajax.send(formdata);



}
function progressHandler(event){
//  _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
 // _("progressBar").value = Math.round(percent);

  $('#progressBar').width(Math.round(percent) + "%").attr('aria-valuenow', Math.round(percent));
  $('#progressBarPercent').html(Math.round(percent));

 // _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
//  _("status").innerHTML = event.target.responseText;
  _("txtUrl").value = event.target.responseText;
  console.log(event.target.responseText);
  _("progressBar").value = 100;
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
}

</script>
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
    <label class="control-label col-sm-3" for="video">Video:</label>
    <div class="col-sm-9">

     <input type="url" class="form-control" readonly id="txtUrl" hidden="true" required="true" name="txtUrl" id="url" placeholder="Đường dẫn">

  

    <input type="file" name="fileVideo" id="fileVideo">
<input type="button" value="Upload File" onclick="uploadFile()">

<div class="progress">
  <div class="progress-bar" role="progressbar" id="progressBar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 2%;">
    
      <span id="progressBarPercent"></span>%
  </div>
</div>

<span id="status"></span>

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
