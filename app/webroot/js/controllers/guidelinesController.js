var guidelinesController = function($scope, Origin) {
	$scope.components	= {};
	$scope.template 	= angular.fromJson(_template);
	$scope.platforms	= [{name: 'Desktop'}, {name: 'Tablet'}, {name: 'Mobile'}];
	$scope.platformShow	= 'Desktop';
	
	
	Origin.get('components').then(function(response) {
		$scope.components = response['raw'];
	});
	
	$scope.dimensionsShow = function(platform) {
		$scope.platformShow = platform;
	}
	
};