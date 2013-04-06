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
	$scope.workspace.components = {};	//List of all components
	$scope.workspace.display	= {};	//Ad's display model
	$scope.workspace.modal		= {};	//Modal content
	$scope.workspace.template	= {};	//Ad's corresponding template model
	$scope.workspace.ui			= {};	//UI wrapper model
	$scope.workspace.ui.schedule= 0;	//Current schedule state
	$scope.workspace.ui.layer	= 'Layers';
	$scope.workspace.ui.view 	= 'Initial';
	$scope.workspace.ui.platform= 'Desktop';
	
	//Load components
	Origin.get('components').then(function(response) {
		$scope.workspace.components		= response;
		
		Origin.get('ad/'+originAd_id).then(function(response) {
			template_id					= response.OriginAd.config.type_id;
			$scope.workspace.ad			= response;
			//$scope.updateUI();
			
			Origin.get('template/'+template_id).then(function(response) {
				$scope.workspace.template	= response.OriginTemplate;
				
				$scope.$watch('workspace.ui.view', function() {
					$scope.updateUI();
				});
				
				
			});
		});
	});
	
	
	$scope.updateUI = function() {
		$scope.workspace.ui.content	= 'OriginAd'+$scope.workspace.ui.platform+$scope.workspace.ui.view+'Content';	//Current view state
		$scope.workspace.display	= $scope.workspace.ad.OriginAdSchedule[$scope.workspace.ui.schedule][$scope.workspace.ui.content];
		
		$scope.workspaceTemplateConfig = function() {
			return {
				height:	$scope.workspace.template.config.dimensions[$scope.workspace.ui.view][$scope.workspace.ui.platform].height+'px',
				width: 	$scope.workspace.template.config.dimensions[$scope.workspace.ui.view][$scope.workspace.ui.platform].width+'px'
			}
		}
	}
	
	$scope.creatorToggle = function(type) {
		switch(type) {
			case 'view':
				var toggle	= $j('#displaySwitch').prop('checked', !$j('#displaySwitch').prop('checked'));
				$scope.workspace.ui.view 	= ($j('#displaySwitch').prop('checked'))? 'Initial': 'Triggered';
				break;
			default:
				var toggle	= $j('#layerSwitch').prop('checked', !$j('#layerSwitch').prop('checked'));
				$scope.workspace.ui.layer 	= ($j('#layerSwitch').prop('checked'))? 'Layers': 'Library';
				break;
		}
	}
	
	$scope.creatorModalClose = function() {
		$scope.creatorModal	= false;
	}
	
	$scope.creatorModalOpen = function(type, content) {
		$scope.creatorModal = true;
		
		switch(type) {
			case 'component':
				$scope.workspace.modal.title		= content.OriginComponent.name + ' Editor';
				//$scope.workspace.modal.title		= content.OriginComponent.name;
				break;
			case 'schedule':
				break;
		}
	}
	
	$scope.creatorModalOptions = {
		backdropClick: 	false,
		backdropFade:	true
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