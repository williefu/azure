var demoController = function($scope, $filter, $compile, Origin) {	
	$scope.demo 				= {};
	$scope.demo.templateAlias	= 'origin';
	$scope.reskin 				= {};
	$scope.origin_ad			= angular.fromJson(origin_ad);
	
	$scope.embedOptions = {
		auto: 	0,
		close:	0,
		hover:	0,
		id:		$scope.origin_ad.OriginAd.id,
		type:	$scope.origin_ad.OriginAd.config.template
	};
	
	
	$scope.bindEmbed = function(event) {
		angular.element(event.currentTarget).parent().find('div').html('test');
		//$scope.embed				= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($scope);		
	}
	
	/**
	* Loads the site demo templates
	*/
	$scope.demoInit = function() {		
		Origin.get('sites').then(function(response) {
			//console.log(response);
			$scope.templates			= response;
			$scope.demo.template		= '/administrator/get/templates/'+$scope.demo.templateAlias;
		});
	}
	
	/**
	* Change reskin color when a custom one is available
	*/
	$scope.$watch('demo.reskin_color', function() {
		$scope.reskin = {
			backgroundColor: $scope.demo.reskin_color
		}
	});
	
	/**
	* Loads the uploaded reskin
	*/
	$scope.loadReskin = function() {
		console.log('here');
		console.log($scope.demo.reskin_img);
	}
	
	/**
	* Load different demo templates
	*/
	$scope.loadTemplate = function() {
		//Clear any out-of-page ads
		angular.element(document.getElementById('originAd-'+$scope.origin_ad.OriginAd.id)).remove();
		$scope.demo.template	= '/administrator/get/templates/'+$scope.demo.templateAlias;
	}
	
	/**
	* Saves and creates the demo page for public viewing
	*/
	$scope.demoSave = function() {
		$scope.demo.route			= 'demoSave';
		$scope.demo.origin_ad_id	= $scope.origin_ad.OriginAd.id;

		$scope.demo.config = {
			reskin_color:	$scope.demo.reskin_color,
			reskin_img:		$scope.demo.reskin_img,
			templateAlias:	$scope.demo.templateAlias,
			type:			$scope.origin_ad.OriginAd.config.template
		};
		
		Origin.post($scope.demo).then(function(response) {
			$scope.link 	= 'http://'+document.domain+'/demo/'+response;
			//window.open('http://'+document.domain+'/demo/'+response,'_blank');
		});
	}
	
	$scope.demoInit();
};