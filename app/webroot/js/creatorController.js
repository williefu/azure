var originAd_id		= $j('#originAd_id').val(),
	template_id;
	
/*
	//REACTIVATE THIS!!
	
	$j(window).on('beforeunload', function() {
		return 'Your own message goes here...';
	});
*/

var creatorController = function($scope, $filter, Origin) {
	$scope.editor				= {};	//Editor model
	$scope.workspace			= {};	//Workspace wrapper model
	$scope.workspace.ad 		= {};	//Complete ad unit model
	$scope.workspace.template	= {};	//Ad's corresponding template model
	$scope.workspace.display	= {};	//Ad's display model
	$scope.workspace.ui			= {};	//UI wrapper model
	$scope.workspace.ui.schedule= 0;	//Current schedule state
	$scope.workspace.ui.view 	= 'Initial';
	$scope.workspace.ui.platform= 'Desktop';
	
	Origin.get('ad/'+originAd_id).then(function(response) {
		template_id					= response.OriginAd.config.type_id;
		$scope.workspace.ad			= response;
		//$scope.updateUI();
		
		$scope.$watch('workspace.ui.view', function() {
			$scope.updateUI();
		});
		
		Origin.get('template/'+template_id).then(function(response) {
			$scope.workspace.template	= response.OriginAdTemplate;
		});
	});
	
	$scope.updateUI = function() {
		$scope.workspace.ui.content	= 'OriginAd'+$scope.workspace.ui.platform+$scope.workspace.ui.view+'Content';	//Current view state
		$scope.workspace.display	= $scope.workspace.ad.OriginAdSchedule[$scope.workspace.ui.schedule][$scope.workspace.ui.content];
	}
	
	$scope.viewToggle = function(action) {
		switch(action) {
			case 'toggle':
				var toggle	= $j('#displaySwitch').prop('checked', !$j('#displaySwitch').prop('checked'));
				break;
			default:
				break;
		}
		
		$scope.workspace.ui.view 	= ($j('#displaySwitch').prop('checked'))? 'Initial': 'Triggered';
	}
	
	
	
	
	
/*
	
	$scope.scheduleModalClose = function() {
		$scope.scheduleModal	= false;
	}
	
	$scope.scheduleModalOpen = function() {
		$scope.scheduleModal	= true;
	}
	
	$scope.scheduleModalOptions = {
		backdropClick:	false,
		backdropFade:	true
	}
*/
	
	/*
	$scope.adCreateModalClose = function() {
		$scope.adCreateModal 	= false;
	}
	
	$scope.adCreateModalOpen = function() {
		$scope.adCreateModal	= true;
	}
	
	$scope.adCreateModalOptions = {
		backdropClick:	false,
		backdropFade:	true
	}
	
	*/
	
};