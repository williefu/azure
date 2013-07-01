/**
* Monitor Actions Controller
**/

var actionsCtrl = function($scope, Monitor) {
	$scope.monitor_actions = {};
	$scope.exp_template = 2;
	
	$scope.$watch('monitorObj.category_id', function() {
		$scope.title = $scope.monitorObj.category;	
		Monitor.get('event/'+$scope.monitorObj.category_id+'/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date).then(function(data) {
				$scope.monitor_actions = data.data;
				$scope.monitor_totals = data.total;
				//Load Visits data
				Monitor.get('visits/'+$scope.monitorObj.start_date+'/'+$scope.monitorObj.end_date+'/'+$scope.monitorObj.category_id).then(function(data) {
						$scope.monitor_visits = data.visits;
				});
				
				$scope.monitor_title = 'Event Action';
				$scope.note = 'There is no label data for this event action.';
		});
	});
	
}