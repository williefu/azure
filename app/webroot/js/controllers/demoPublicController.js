
var demoPublicController = function($scope, $compile) {
	$scope.demo 		= angular.fromJson(_config);
	
	$scope.reskin = {
		//backgroundColor: $scope.demo.reskin_color
	}

	$scope.embedOptions = {
		auto: 	0,
		close:	0,
		hover:	0,
		id:		$scope.demo.OriginDemo.origin_ad_id,
		type:	$scope.demo.OriginDemo.config.type
	};
	
	$scope.reskin = {
		backgroundColor:	$scope.demo.OriginDemo.config.reskin_color,
		reskin_img:			$scope.demo.OriginDemo.config.reskin_img
	}

	$scope.embed				= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($scope);

	//$scope.demo.template		= '';
	$scope.demo.template		= '/administrator/get/templates/'+$scope.demo.OriginDemo.config.templateAlias;
};