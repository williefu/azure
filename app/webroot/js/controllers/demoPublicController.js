
var demoPublicController = function($scope) {
	$scope.demo 		= angular.fromJson(_config);
	
	$scope.reskin = {
		backgroundColor: $scope.demo.reskin_color
	}
	

};