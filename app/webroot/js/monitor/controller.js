'use strict';
/**
* Workspace Controller
**/

angular.module('workspaceApp', ['monitorApp.services', 'monitorApp.directive']);

var workspaceCtrl = function($scope, Workspace) {
	//Global Monitor object
	$scope.monitorObj = {};
	$scope.monitortest = [];
	//Load Monitor data
	Workspace.get('list').then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
			$scope.testmonitor = data.total;
			$scope.monitortest.push(['1', 's', 'g']);
	});

	
	//Load Monitor data
	/*Workspace.get('Json/charts').then(function(data) {
			//console.log(data);
			$scope.monitor_url = data;
	});*/
	
	$scope.getData = function($monitor) {
		Workspace.get('event/'+$monitor.category).then(function(data) {
			//console.log(data);
		});
	}
	
	$scope.export = function() {
		Workspace.post('Json/export',$scope.monitor_list).then(function(response) {
			console.log(response);
			//$scope.templateRefresh(response);
		});
	}

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

