var homeController = function($scope, Origin) {
	$scope.products	= {};
	$scope.ads		= {};
	
	Origin.get('ads').then(function(response) {
		$scope.ads	= response.origin_ads;
	});
	
	Origin.get('templates').then(function(response) {
		$scope.products	= response;
	});
};