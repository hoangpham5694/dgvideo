app.controller('VideoListController', function($scope, $http, API,$timeout){	
	var maxRecord = 20 	;
	$scope.maxRecord = maxRecord;
	$scope.sltCateId = "";
	$scope.txtKeyword = "";
	 var getTotalVideos = function(){
	 	$http.get(API + 'managersites/video/ajax/total').then(function successCallback (response){
	
		$scope.total = response.data /maxRecord +1 ;
		console.log(response.data);
		//return response.data;
		
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
	 }
	var getListVideos = function (max, page){
		var url=API + 'managersites/video/ajax/list/'+max+'/'+page+"?cateid="+$scope.sltCateId+"&key="+$scope.txtKeyword;
		console.log(url);
		$http.get(url).then(function successCallback (response){
		getTotalVideos();
		$scope.videos = response.data;
		$scope.page = page;
		console.log(response.data);
		}  , function errorCallback(response) {
			console.log(response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  		}) ;
		
	 };

	getListVideos(maxRecord,1);
	$scope.changePage = function(page){
		getListVideos(maxRecord,page);
	}
	$scope.changeCate = function(){
		getListVideos(maxRecord,1);
	}
	$scope.delete = function(id){
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa video này không');
		if(isConfirmDelete){
			$http.get(API + 'managersites/video/ajax/delete/'+id).then(function successCallback (response){
			console.log(response);
			console.log($scope.page);
			getListVideos(maxRecord,$scope.page);
		//	alert(response.data);
			}  , function errorCallback(response) {
			console.log(response);

			}) ;
		}else{
			return false;
		}
	}


	$scope.changeKey = function(){
		getListVideos(maxRecord,1);
	}


});