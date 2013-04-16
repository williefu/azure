var originAd_id		= $j('#originAd_id').val();
	
	/**
	* Prevent accidental clicks leaving the editor
	*/
/*
	$j('#origin-bar').find('a').not('#originBar-help, #originNotification-close').each(function() {
		$j(this).click(function() {
			var ask = confirm('Do you want to exit Origin\'s Ad Creator?');
			if(ask){
				window.location = $j(this).attr('href');
			} else {
				return false;
			}
		});
	});
*/

var demoController = function($scope, $filter, Origin, Notification) {
	$scope.demo 				= {};
	$scope.demo.templateAlias	= 'origin';
	$scope.reskin 				= {};
	
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
		$scope.demo.template	= '/administrator/get/templates/'+$scope.demo.templateAlias;
	}
	
	/**
	* Saves and creates the demo page for public viewing
	*/
	$scope.demoSave = function() {
		$scope.demo.route		= 'demoSave';
		
		Origin.post($scope.demo).then(function(response) {
			//Do something here...
		});
	}
	
	$scope.demoInit();
};