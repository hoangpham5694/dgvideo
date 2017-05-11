@extends('admins.master')
@section('header')
    <title>Admin::Quản lý user</title>
@endsection
@section('title','Quản lý user')
@section('content')
<div ng-controller="UserListController">

<div class="row" >
        <div class="col-sm-4">
         <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Tăng giảm:</label>
    <div class="col-sm-8">
      <select name="" ng-model="sltSort" class="form-control" ng-change="changeSort()" id="">
         <option value="ASC">Tăng dần</option>
          <option value="DESC">Giảm dần</option>
           
      
      </select>
    </div>
       
  </div>
        </div>
                <div class="col-sm-4">
            <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Sắp xếp theo:</label>
    <div class="col-sm-8">
      <select name="" ng-model="sltOrderBy" class="form-control" ng-change="changeOrderBy()" id="">
          <option value="id">ID</option>
<option value="firstname">Tên</option>
      <option value="lastname">Họ</option>
      <option value="username">Tên đăng nhập</option>
      </select>
    </div>
       
  </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group custom-search-form">
                                <input type="text" ng-model="txtKeyword" ng-change="changeKey()" class="form-control" placeholder="Nhập họ, tên, username.... ">
                                 <span class="input-group-addon" id="sizing-addon2"> <i class="fa fa-search"></i></span>
                                
                            </div>
        </div>
    </div>
<table class="table table-hover" >
                              <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Username</th>
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <th>Vai trò</th>
                                        <th>Số video</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr ng-repeat="user in users">
                                		<td>{%user.id%}</td>
                                		<td>{%user.username%}</td>
                                    <td>{%user.lastname%}</td>
                                		<td>{%user.firstname%}</td>
                                    <td ng-switch on="user.level">{%%}
                                          <span ng-switch-when="1">Quản trị</span>
                                          <span ng-switch-when="2">Nhân viên</span>
                                    </td>
                                    <td>{%user.count_videos%}</td>
                                		<td>
                                         <a class="btn btn-xs btn-primary" ng-href="{{ url('adminsites/edit') }}/{%user.id%}" >
                                         <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Sửa
                                            </a>
                                              <a class="btn btn-xs btn-danger" ng-click="delete(user.id)" >
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


</div>
@endsection
@section('footer')
  <script src="<?php echo asset('public/app/controller/admins/UserController.js') ; ?>"></script>  
@endsection
