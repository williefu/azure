'use strict';
/**
* Monitor Controller
**/

//angular.module('monitorApp', ['monitorApp.services', 'monitorApp.directive']);
//angular.bootstrap(document, ['monitorApp']);

var monitorCtrl = function($scope, Monitor) {
	//Global Monitor object
	$scope.monitorObj = {};
	$scope.monitor_filter = {};
	$scope.monitor_totals = {};
	$scope.monitor_list = {};
	$scope.monitor = {};
	
	//Load Monitor data
	Monitor.get('list').then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
			$scope.monitor_title = 'Event Category';
	});

	
	//Load Monitor data
	/*Monitor.get('Json/charts').then(function(data) {
			//console.log(data);
			$scope.monitor_url = data;
	});*/
	
	$scope.getData = function() { //console.log($scope.monitorObj);
		/*Monitor.get('search/'+$scope.monitorObj.category).then(function(data) {
			$scope.refreshMonitor(data);
		});*/
		Monitor.get('list/'+$scope.monitorObj.category).then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
			$scope.monitor_title = 'Event Category';
		});
	}
	
	$scope.exportData = function() {
		$scope.monitor.route		= 'monitorExport';
		$scope.monitor.type = 'multiple';
		$scope.monitor.monitor_filter = $scope.monitor_filter;
		$scope.monitor.monitor_totals = $scope.monitor_totals;
		$scope.monitor.monitor_list = $scope.monitor_list;
		Monitor.post($scope.monitor).then(function(response) {
			//console.log(response);
		});
	}
	
	$scope.refreshMonitor = function(data) {
		$scope.monitor_filter = data.filter;
		$scope.monitor_totals = data.total;
		$scope.monitor_list = data.data;
	}
	
	$scope.categoryData = function(category) {
		/*$scope.monitor.category = category;
		$scope.monitor.startDate = $scope.monitor_filter.startDate;
		$scope.monitor.endDate = $scope.monitor_filter.endDate;*/
		Monitor.get('event/'+category).then(function(data) {
			$scope.refreshMonitor(data);
			$scope.monitor_title = 'Event Action';
		});
	}

}
