var dashboardController = function($scope, Origin) {
	$scope.activities = {};
	
	Origin.get('activity').then(function(response) {
		$scope.activities = response;
	});
/*
	$scope.products	= {};
	$scope.ads		= {};
	
	Origin.get('ads').then(function(response) {
		$scope.ads	= response.origin_ads;
	});
	
	Origin.get('templates').then(function(response) {
		$scope.products	= response;
	});
*/
};