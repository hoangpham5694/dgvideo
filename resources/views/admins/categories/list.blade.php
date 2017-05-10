@extends('admins.master')
@section('header')
    <title>Admin::Quản lý danh mục</title>
@endsection
@section('title','Quản lý danh mục')
@section('content')
<div ng-controller="CateController">
<a  class="btn btn-outline btn-primary" ng-click="modal('add')">Thêm danh mục mới</a>
<table class="table table-hover" >
                              <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên</th>
                                        <th>Số lượng video</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr ng-repeat="category in categories">
                                		<td>{% category.id %}</td>
                                		<td>{% category.name %}</td>
                                		<td>{% category.count_videos %}</td>
                                		
                                		<td>
                                         <a class="btn btn-xs btn-primary" ng-click="modal('edit',category.id, category.name)" >
                                         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Sửa
                                            </a>
                                              <a class="btn btn-xs btn-danger" ng-click="delete(category.id)" >
                                         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Xóa
                                            </a>

                                    </td>
                                	</tr>
                                </tbody>
</table>

<div class="btn-toolbar" role="toolbar" aria-label="...">
  <div class="btn-group" role="group" aria-label="...">
  	<button type="button" ng-repeat="n in [1,total] | makeRange" ng-click="changePage(n)" class="btn btn-default" ng-disabled="page == n">{% n %}</button>
  </div>

</div>


    <div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{%modalTitle%}</h4>
      </div>
      <div class="modal-body">
 <form class="form-horizontal" name="frmMonth">
  <div class="form-group">
    <label for="inputmonth" class="col-sm-3 control-label">Tên danh mục:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" ng-model="cateName" id="inputmonth" placeholder="Nhập tên nhóm">
    </div>
  </div>


</form>


      </div>
      <div class="modal-footer">
  
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" ng-click="confirm(state)">Lưu</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
@endsection
@section('footer')
  <script src="<?php echo asset('public/app/controller/admins/CateController.js') ; ?>"></script>  
@endsection
