app.controller('SinhVienController', function($scope, $http, API,$timeout){
	//$scope.names = "hoang";
	

	 var retrieveItems = function (){
		$http.get(API + 'list').then(function successCallback (response){
	
		$scope.sinhviens = response.data;
		}  , function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		$timeout(retrieveItems, 2000);
	 };

	 retrieveItems();
	$scope.modal = function(state,id){

		$scope.state  = state;
		switch (state){
			case "add":
				$scope.frmTitle = "Thêm sinh viên";
				break;
			case "edit":
				$scope.frmTitle = "Sửa sinh viên";
				$scope.id = id;
				$http.get(API + 'edit/'+id).then(function successCallback (response){
				$scope.sinhvien = response.data;
				}  , function errorCallback(response) {
  				}) ;

				break;
			default:
				$scope.frmTitle = "Không biết";
				break;
		}
		console.log(id);
		$("#myModal").modal('show');

	}
	$scope.save = function(state,id){
		//console.log(state1);
		if(state ==  "add"){
			var url = API + "add";
			var data = $.param($scope.sinhvien)
			console.log(data);
			$http({
				method: 'POST',
				url : url,
				data : data,
				headers : {'Content-Type':'application/x-www-form-urlencoded'}
			}).then(function mySucces(response) {
        		console.log(response);
        		retrieveItems();
    		}, function myError(response) {
        		console.log(response);
        		alert("Xãy ra lỗi");
    		});
		}
		if(state ==  "edit"){
			var url = API + "edit/"+id;
			var data = $.param($scope.sinhvien)
			console.log(data);
			$http({
				method: 'POST',
				url : url,
				data : data,
				headers : {'Content-Type':'application/x-www-form-urlencoded'}
			}).then(function mySucces(response) {
        		console.log(response);
        		retrieveItems();
        		$("#myModal").modal('hide');
    		}, function myError(response) {
        		console.log(response);
        		alert("Xãy ra lỗi");
    		});
		}

	}

	$scope.confirmDelete = function(id){
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa dòng dữ liệu này không');
		if(isConfirmDelete){
			$http.get(API + 'delete/'+id).then(function successCallback (response){
			console.log(response);
			retrieveItems();
			}  , function errorCallback(response) {
			console.log(response);
			}) ;
		}else{
			return false;
		}
	}
});