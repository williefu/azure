'use strict';
/**
* Monitor Controller
**/

//angular.module('monitorApp', ['monitorApp.services', 'monitorApp.directive']);
//angular.bootstrap(document, ['monitorApp']);

var monitorCtrl = function($scope, Monitor) {
	//Global Monitor object
	$scope.monitorObj = {};
					
	//Load Monitor data
	Monitor.get('list').then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
	});

	
	//Load Monitor data
	/*Monitor.get('Json/charts').then(function(data) {
			//console.log(data);
			$scope.monitor_url = data;
	});*/
	
	$scope.getData = function() { //console.log($scope.monitorObj.category);
		Monitor.get('event/'+$scope.monitorObj.category).then(function(data) {
			$scope.refreshMonitor(data);
		});
	}
	
	$scope.export = function() {
		Monitor.post('Json/export',$scope.monitor_list).then(function(response) {
		});
	}
	
	$scope.refreshMonitor = function(data) {
		$scope.monitor_filter = data.filter;
		$scope.monitor_totals = data.total;
		$scope.monitor_list = data.data;
		console.log($scope.monitor_list);
	}

}
