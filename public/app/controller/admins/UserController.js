app.controller('UserListController', function($scope, $http, API,$timeout){	
	var maxRecord = 20 	;
	$scope.maxRecord = maxRecord;
	$scope.sltOrderBy= "id";
	$scope.sltSort= "DESC";
	$scope.txtKeyword = "";
	 var getTotalUsers = function(){
	 	$http.get(API + 'adminsites/user/ajax/total').then(function successCallback (response){
	
		$scope.total = response.data /maxRecord +1 ;
		console.log(response.data);
		//return response.data;
		
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	 }
	var getListUsers = function (max, page){
		var url=API + 'adminsites/user/ajax/list/'+max+'/'+page+"?orderby="+$scope.sltOrderBy+"&sort="+$scope.sltSort+"&key="+$scope.txtKeyword;
		console.log(url);
		$http.get(url).then(function successCallback (response){
		getTotalUsers();
		$scope.users = response.data;
		$scope.page = page;
		console.log(response.data);
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		
	 };

	getListUsers(maxRecord,1);
	$scope.changePage = function(page){
		getListUsers(maxRecord,page);
	}
	$scope.changeOrderBy = function(){
		getListUsers(maxRecord,1);
	}
	$scope.changeSort = function(){
		getListUsers(maxRecord,1);
	}
	$scope.delete = function(id){
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa user này không');
		if(isConfirmDelete){
			$http.get(API + 'adminsites/user/ajax/delete/'+id).then(
				function successCallback (response){
					console.log(response);
					console.log($scope.page);
					alert(response.data);
					getListUsers(maxRecord,$scope.page);
				//	alert(response.data);
				}  , function errorCallback(response) {
					console.log(response);

				}) ;
		}else{
			return false;
		}
	}


	$scope.changeKey = function(){
		getListUsers(maxRecord,1);
	}


});