app.controller('CateController', function($scope, $http, API,$timeout){	
	var maxRecord = 20 	;
	$scope.maxRecord = maxRecord;
	 var getTotalCategories = function(){
	 	$http.get(API + 'adminsites/category/ajax/total').then(function successCallback (response){
	
		$scope.total = response.data /maxRecord +1 ;
		console.log(response.data);
		//return response.data;
		
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	 }
	var getListCategories = function (max, page){
		$http.get(API + 'adminsites/category/ajax/list/'+max+'/'+page).then(function successCallback (response){
		getTotalCategories();
		$scope.categories = response.data;
		$scope.page = page;
		console.log(response.data);
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		
	 };

	getListCategories(maxRecord,1);
	$scope.changePage = function(page){
		getListCategories(maxRecord,page);
	}
	$scope.delete = function(id){
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa danh mục này không');
		if(isConfirmDelete){
			$http.get(API + 'adminsites/category/ajax/delete/'+id).then(function successCallback (response){
			console.log(response);
			console.log($scope.page);
			getListCategories(maxRecord,$scope.page);
		//	alert(response.data);
			}  , function errorCallback(response) {
			console.log(response);

			}) ;
		}else{
			return false;
		}
	}
	$scope.modal = function(state,id,name){
		//console.log(state);
		$("#modalAdd").modal("show");
		$scope.state = state;
		switch(state){
			case 'add':
				$scope.modalTitle = "Thêm danh mục";
				
				
			break;
			case 'edit':
				$scope.modalTitle = "Sửa danh mục " + id;
				$scope.cateId= id;
				$scope.cateName = name;

			break;
		}
		 

		
	}
	$scope.confirm = function(state){
		switch(state){
			case 'add':
				var url= API + 'adminsites/category/ajax/add?catename='+ $scope.cateName;
			break;
			case 'edit':
				var url= API + 'adminsites/category/ajax/edit?cateid='+ $scope.cateId+'&catename='+$scope.cateName;
			break;

		}
		console.log(url);
		$http.get(url).then(function successCallback (response){

		//console.log(response.data);
			alert(response.data);
			$("#modalAdd").modal("hide");
			getListCategories(maxRecord,1);
		}  , function errorCallback(response) {
			//alert("Xảy ra lỗi trong khi ");
			console.log(response.data);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	}


});