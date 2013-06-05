'use strict';
/**
* Monitor Controller
**/

var monitorCtrl = function($scope, Monitor, $filter) {
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
			$scope.listFilter = function() {
				var array = [];
				for(var key in $scope.monitor_list) {
				  array.push($scope.monitor_list[key]);
				}
				return $filter('filter')(array, $scope.monitorObj.category);
			};
			$scope.note = 'empty';
	});
	
	/*$scope.listFilter = function(data) {
				var array = [];
				for(var key in data) {
				  array.push(data[key]);
				}
				console.log($filter('filter')(array, $scope.monitorObj.category));
				return $filter('filter')(array, $scope.monitorObj.category);
	}*/
	
	//Load Visits data
	Monitor.get('visits').then(function(data) {
			$scope.monitor_visits = data.visits;
	});

	$scope.getData = function() {
		$scope.monitorObj.category = ($scope.monitorObj.category == '' ? 'undefined' : $scope.monitorObj.category);
		//$scope.monitorObj.start_date = '20130601';
		//$scope.monitorObj.end_date = '20130604';
		Monitor.get('list/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+$scope.monitorObj.category).then(function(data) {
			$scope.monitorObj.category = ($scope.monitorObj.category == 'undefined' ? '' : $scope.monitorObj.category);
			$scope.monitor_title = 'Event Category';
			if( data.data != undefined ) {
				$scope.refreshMonitor(data);
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
			
	$scope.refreshMonitor = function(data) {
		$scope.monitor_list = data.data;
		$scope.monitor_filter = data.filter;
		$scope.monitor_totals = data.total;
		$scope.monitorObj.start_date = data.filter.startDate;
		$scope.monitorObj.end_date = data.filter.endDate;
		
		//Load Visits data
		Monitor.get('visits/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+$scope.monitorObj.category).then(function(data) {
				$scope.monitor_visits = data.visits;
		});
		
	}
	
	$scope.categoryData = function(id,category) {
		if($scope.monitor_title!='Event Action') {
			Monitor.get('event/'+id).then(function(data) {
				$scope.monitorObj.category = category;
				$scope.refreshMonitor(data);
				$scope.monitor_title = 'Event Action';
				$scope.note = 'empty';
			});
		}
	}
	
	$scope.conditions = function() {
		return $scope.monitor_title=='Event Category' && $scope.note=='empty';
	}
}
