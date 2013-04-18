var homeController = function($scope, Origin) {
	$scope.products	= {};
	
	Origin.get('templates').then(function(response) {
		$scope.products	= response;
	});
};