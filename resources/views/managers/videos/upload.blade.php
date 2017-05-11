@extends('managers.master')
@section('header')
    <title>Manager::Thêm video</title>
    <meta name="csrf-token" content="{{ Session::token() }}"> 

  <script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
function _(el){
  return document.getElementById(el);
}
function uploadFile(){
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
  ajax.open("POST", "http://digovid.dev:8080/managersites/video/upload");
  ajax.send(formdata);



}
function progressHandler(event){
  _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0;
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
}
function hasExtension(inputID, exts) {
    var fileName = document.getElementById(inputID).value;
    return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
}
function isVideo(){
  //console.log("change");
  if (!hasExtension('fileVideo', ['.mp4', '.gif', '.png'])) {
     $("#status").html("Không phải video");
  }else{
     $("#status").html("phải video");
  }
  
}
</script>
@endsection
@section('title','Thêm video')
@section('content')

<div class="col-md-7" >
	<form name="frmTeacher" action=""  method="POST" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="_token"  value="{{ csrf_token() }}">

    
 
 


  <div class="form-group">
    <label class="control-label col-sm-3" for="video">Video:</label>
    <div class="col-sm-9">

    <!--  <input type="url" class="form-control"  required="true" name="txtUrl" id="url" placeholder="Vui lòng nhập tiêu đề">
-->
  

    <input type="file" name="fileVideo" onchange="isVideo()" id="fileVideo">
    <input type="button" value="Upload File" onclick="uploadFile()">


    </div>
  </div>

   <div class="form-group">
     <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
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
