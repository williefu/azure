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
	
	/*$scope.dateOptions = {
        changeYear: false,
        changeMonth: false,
        nextText: '<i class=icon-arrow-right></i>',
        prevText: '<i class=icon-arrow-left></i>',
        dateFormat: 'mmm dd, yyyy'
    };*/
	
	//Load Monitor data
	Monitor.get('list').then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
			$scope.monitor_title = 'Event Category';
	});
	
	//Load Visits data
	Monitor.get('visits').then(function(data) {
			$scope.monitor_visits = data.visits;
	});

	$scope.getData = function() {
		//$scope.monitorObj.start_date = $scope.parseDate($scope.monitorObj.start_date);
		//$scope.monitorObj.end_date = $scope.parseDate($scope.monitorObj.end_date);
		$scope.monitorObj.category = ($scope.monitorObj.category == '' ? 'undefined' : $scope.monitorObj.category);
		Monitor.get('list/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+$scope.monitorObj.category).then(function(data) {
			$scope.monitorObj.category = ($scope.monitorObj.category == 'undefined' ? '' : $scope.monitorObj.category);
			$scope.refreshMonitor(data);
		});
	}
	
	$scope.parseDate = function(date) {
	  var d = new Date(date);
	  var month = d.getMonth() + 1;
	  var day = d.getDate();
	  var year = d.getFullYear();
	  if(month < 10) month = '0' + month;
	  if(day < 10) day = '0' + day;
	  return year + '-' + month + '-' + day;	// 2013-03-22
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
		/*Monitor.file('export/'+$scope.monitor).then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
			$scope.monitor_title = 'Event Category';
		});*/
	}
	
	$scope.refreshMonitor = function(data) {
		$scope.monitor_list = data.data;
		$scope.monitor_filter = data.filter;
		$scope.monitor_totals = data.total;
		$scope.monitorObj.start_date = data.filter.startDate;
		$scope.monitorObj.end_date = data.filter.endDate;
		console.log($scope.monitor_list);
		
		
		//Load Visits data
		Monitor.get('visits/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+$scope.monitorObj.category).then(function(data) {
				$scope.monitor_visits = data.visits;
		});
	}
	
	$scope.categoryData = function(category) {
		if($scope.monitor_title!='Event Action') {
			Monitor.get('event/'+category).then(function(data) {
				$scope.monitorObj.category = category;
				console.log(data);
				$scope.refreshMonitor(data);
				$scope.monitor_title = 'Event Action';
			});
		}
	}
	/*
	$scope.panelOptions = {
        collapsed : false
    };

    $scope.collapsePanel = function() {
        $scope.panelOptions.collapsed = true;
    };

    $scope.expandPanel = function() {
        $scope.panelOptions.collapsed = false;
    };*/

}
