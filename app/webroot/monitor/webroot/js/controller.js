'use strict';

/*var origin_id		= $j('#origin_id').val(),
	origin_assets	= 'http://'+document.domain+'/assets/components/com_emc_origin/'+origin_id,
	duration		= 200;
	*/
	
/**
* List Controller
**/
//var listCtrl = function($scope, loadJSON, List) {
//	$scope.monitor 		= {};
		/*
	$scope.proceed = function($event) {
		if(evolveJS.validate($j(evolveJS.currentForm($event.target)))) {
			List.create(
				{data: $scope.origin},
				function(response) {
					window.location 	= 'index.php?option=com_emc_origin&task='+response['task']+'&id='+response['oid'];
				}
			);
		}
		return false;
	}*/
		
//}

/**
* Workspace Controller
**/

angular.module('workspaceApp', ['monitorApp.services', 'ui']);

var workspaceCtrl = function($scope, Workspace) {
	//Global Monitor object
	$scope.monitorObj = {};
	
	//Load Monitor data
	Workspace.get('Json/monitorlist').then(function(data) {
			$scope.monitor_filter = data['filter'];
			$scope.monitor_totals = data['total'];
			$scope.monitor_list = data['data'];
	});

/*
	function refreshOrigin(data) {

		if(!$scope.$$phase) {
			$scope.$apply(function() {
				$scope.originObj.content	= data.content;
				$scope.originObj.config		= data.config;
				$scope.originObj.current 	= $scope.originObj.content[$scope.originWorkspace.schedule][$scope.originWorkspace.state+'_'+$scope.originWorkspace.view];
	        });	
		} else {
			//NOT SURE.... FIND A BETTER WAY!
			$scope.originObj.content	= data.content;
			$scope.originObj.config		= data.config;
			$scope.originObj.current 	= $scope.originObj.content[$scope.originWorkspace.schedule][$scope.originWorkspace.state+'_'+$scope.originWorkspace.view];
		}
	}*/
}