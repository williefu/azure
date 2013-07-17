'use strict';
/**
* Monitor Controller
**/
//angular.module('monitorApp', ['monitorApp.services', 'monitorApp.directives']);

var monitorCtrl = function($scope, Monitor, $filter) {
	//Global Monitor object
	$scope.monitorObj = {};
	$scope.monitor_filter = {};
	$scope.monitor_totals = {};
	$scope.monitor_list = {};

	//Load Monitor data
	Monitor.get('list').then(function(data) {
			$scope.monitor_filter = data.filter;
			$scope.monitor_totals = data.total;
			$scope.monitor_list = data.data;
			$scope.monitor_title = 'Event Category';
			$scope.monitorObj.start_date = data.filter.startDate;
			$scope.monitorObj.end_date = data.filter.endDate;
			
			$scope.listFilter = function() {
				var array = [];
				for(var key in $scope.monitor_list) {
				  array.push($scope.monitor_list[key]);
				}
				return $filter('filter')(array, $scope.monitorObj.category);
			};
			
			$scope.note = 'empty';
	});
	
	//Load Visits data
	Monitor.get('visits').then(function(data) {
			$scope.monitor_visits = data.visits;
	});

	$scope.getData = function() {
		category = ($scope.monitorObj.category == '' ? 'undefined' : $scope.monitorObj.category);
		Monitor.get('list/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+category).then(function(data) {
			$scope.monitor_title = 'Event Category';
			if( data.data != undefined ) {
				$scope.refreshMonitor(data, category);
				$scope.listFilter = function() {
					var array = [];
					for(var key in data.data) {
					  array.push(data.data[key]);
					}
					return $filter('filter')(array, $scope.monitorObj.category);
				};
				$scope.note = 'empty';
			}
			else {
				$scope.note = 'There is no data for this view.';
			}
		});
		$scope.exp_template = 0;//template for categories
		$scope.exp_url = $scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+category+'/'+$scope.exp_template;
	}
	
	$scope.refreshMonitor = function(data, category) {
		$scope.monitor_list = data.data;
		$scope.monitor_filter = data.filter;
		$scope.monitor_totals = data.total;
		$scope.monitorObj.start_date = data.filter.startDate;
		$scope.monitorObj.end_date = data.filter.endDate;
		
		//Load Visits data
		Monitor.get('visits/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+category).then(function(data) {
				$scope.monitor_visits = data.visits;
		});
		
	}
}