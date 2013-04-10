var originAd_id		= $j('#originAd_id').val(),
	template_id;
	
	$j('#origin-bar').find('a').each(function() {
		$j(this).click(function() {
			var ask = confirm('Do you want to exit Origin\'s Ad Creator?');
			if(ask){
				window.location = $j(this).attr('href');
			} else {
				return false;
			}
		});
	});
	
/*
	//Prevent closing by accident..
	
	$j(window).on('beforeunload', function() {
		return 'Your own message goes here...';
	});
*/

originApp.value('ui.config', {
    codemirror: {
        mode: 			'htmlmixed',
        lineNumbers: 	true,
        lineWrapping:	true,
        theme:			'night'
    }
});

var creatorController = function($scope, $filter, Origin, Notification) {
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
	
	$scope.refreshUI = function(data) {
		$scope.workspace.ad	= data;
		$scope.updateUI();
	}
	
	$scope.updateUI = function() {
		$scope.workspace.ui.content	= 'OriginAd'+$scope.workspace.ui.platform+$scope.workspace.ui.view+'Content';	//Current view state
		$scope.workspace.display	= $scope.workspace.ad.OriginAdSchedule[$scope.workspace.ui.schedule][$scope.workspace.ui.content];
		$scope.workspace.ui.origin_ad_schedule_id = $scope.workspace.ad.OriginAdSchedule[$scope.workspace.ui.schedule].id;
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
	
	$scope.creatorModalOpen = function(type, content, model) {
		$scope.creatorModal = true;
		
		switch(type) {
			case 'component':
				$scope.workspace.modal.title		= content.OriginComponent.name + ' Editor';
				$scope.workspace.modal.image		= content.OriginComponent.config.img_icon;
				//$scope.workspace.modal.title		= content.OriginComponent.name;
				break;
			case 'schedule':
				break;
		}
		
		if(model) {
			$scope.editor			= angular.copy(model);
		} else {
			$scope.editor	= {
				content: {
					'type': content.OriginComponent.alias
				},
				config: {
					'height': '32px',
					'left': '0px',
					'top':	'0px',
					'width': '32px'/*
,
					'zIndex':(Math.max.apply(Math, zIndexArray) + 1).toString()
*/
				}
			}
		}
		
		$scope.editor.content.title = content.OriginComponent.name;
		$scope.editor.template		= '/administrator/get/components/'+content.OriginComponent.alias;
	}
	
	$scope.creatorModalSave = function() {
		$scope.editor.route					= 'creatorContentSave';
		$scope.editor.model					= $scope.workspace.ui.platform + $scope.workspace.ui.view;
		$scope.editor.origin_ad_schedule_id	= $scope.workspace.ui.origin_ad_schedule_id;
		$scope.editor.originAd_id			= originAd_id;
		
		Origin.post($scope.editor).then(function(response) {
			$scope.creatorModal	= false;
			$scope.refreshUI(response);
			//Notification.message(notification);
		});
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