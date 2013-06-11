/**
* Monitor Actions Controller
**/

var actionsCtrl = function($scope, Monitor) {
	$scope.actionsObj = {};
	$scope.monitor_actions = {};
	$scope.monitorObj = {};
	
	$scope.$watch('actionsObj.categoryId', function() {
		$scope.categoryId = $scope.actionsObj.categoryId;
		//$scope.watch('categoryId', function() { console.log('hey');
			//console.log(item);
			Monitor.get('event/'+$scope.categoryId).then(function(data) { //console.log(data);
				//$scope.monitorObj.category = category;
				$scope.monitor_actions = data.data;
				//$scope.monitor_filter = data.filter;
				$scope.monitor_totals = data.total;
				$scope.monitorObj.start_date = data.filter.startDate;
				$scope.monitorObj.end_date = data.filter.endDate;
				//Load Visits data
				Monitor.get('visits/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+$scope.categoryId).then(function(data) {
						$scope.monitor_visits = data.visits;
				});
				//$scope.refreshMonitor(data);
				$scope.monitor_title = 'Event Action';
				$scope.note = 'There is no label data for this event action.';
			});
		//});
	});
	
}
/*
var filterCtrl = function($scope, Filters) {
	console.log('filter in!');
}*/