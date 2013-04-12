var originAd_id		= $j('#originAd_id').val(),
	template_id;
	
	/**
	* Prevent accidental clicks leaving the editor
	*/
	$j('#origin-bar').find('a').not('#originBar-help, #originNotification-close').each(function() {
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
	$scope.ui					= {};	//UI wrapper model
	$scope.ui.schedule			= 0;	//Current schedule state
	$scope.ui.layer				= 'Layers';
	$scope.ui.view 				= 'Initial';
	$scope.ui.platform			= 'Desktop';
	$scope.layers				= {};
	$scope.library				= {};
	$scope.creatorModalOptions	= {
		backdropClick: 	false,
		backdropFade:	true
	}
	
	$scope.embedOptions = {
		'auto':		0,
		/* 'bg':		'#000000', WHY IS THIS EVEN AN OPTION? */
		'close':	0,
		'hover':	0
	};
	
	
	/**
	* Init
	*/
	Origin.get('components').then(function(response) {
		$scope.workspace.components		= response;
		
		$scope.updateLibrary();
		
		Origin.get('ad/'+originAd_id).then(function(response) {
			template_id					= response.OriginAd.config.type_id;
			$scope.workspace.ad			= response;
			//$scope.updateUI();
			
			Origin.get('template/'+template_id).then(function(response) {
				$scope.workspace.template	= response.OriginTemplate;
				
				$scope.$watch('ui.view', function() {
					$scope.updateUI();
				});	
			});
		});
	});
	
	/**
	* Refreshes the workspace and layers
	*/
	$scope.refreshUI = function(data) {
		$scope.workspace.ad	= data;
		$scope.updateUI();
	}
	
	/**
	* Refreshes the library panel
	*/
	$scope.updateLibrary = function() {
		Origin.get('library/'+originAd_id).then(function(response) {
			$scope.library				= response.files;
		});
	}
	
	/**
	* Core functionality to update the workspace and layers w/respect to current settings
	*/
	$scope.updateUI = function() {
		$scope.ui.content			= 'OriginAd'+$scope.ui.platform+$scope.ui.view+'Content';	//Current view state
		$scope.workspace.display	= $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content];
		$scope.layers				= angular.copy($scope.workspace.display);
		
		$scope.ui.origin_ad_schedule_id = $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule].id;
		$scope.workspaceTemplateConfig = function() {
			return {
				height:	$scope.workspace.template.config.dimensions[$scope.ui.view][$scope.ui.platform].height+'px',
				width: 	$scope.workspace.template.config.dimensions[$scope.ui.view][$scope.ui.platform].width+'px'
			}
		}
	}
	
	/**
	* Update layers upon sort
	*/
	$scope.$watch('layers', function() {
		if(!angular.equals($scope.layers, $scope.workspace.display) && $scope.layers.length) {
			var data	= [];
			for(var index in $scope.layers) {
				data[index]		= {'id': $scope.layers[index].id, 'order': index};
			}
			$scope.editor.route			= 'creatorLayerUpdate';
			$scope.editor.model			= $scope.ui.platform + $scope.ui.view;
			$scope.editor.data			= data;
			$scope.editor.originAd_id	= originAd_id;
			
			Origin.post($scope.editor).then(function(response) {
				$scope.refreshUI(response);
				Notification.message({'title': 'Updated', 'content': 'Layers updated'});
			});
			
			
		}
	}, true);	
	
	/**
	* Switch toggles throughout the interface
	*/
	$scope.creatorToggle = function(type) {
		switch(type) {
			case 'library':
				var toggle			= $j('#layerSwitch').prop('checked', false);
				$scope.ui.layer 	= 'Library';
				break;
			case 'view':
				var toggle			= $j('#displaySwitch').prop('checked', !$j('#displaySwitch').prop('checked'));
				$scope.ui.view 		= ($j('#displaySwitch').prop('checked'))? 'Initial': 'Triggered';
				break;
			default:
				var toggle			= $j('#layerSwitch').prop('checked', !$j('#layerSwitch').prop('checked'));
				$scope.ui.layer 	= ($j('#layerSwitch').prop('checked'))? 'Layers': 'Library';
				break;
		}
	}
	
	/**
	* Closes the modal window
	*/
	$scope.creatorModalClose = function() {
		$scope.creatorModal	= false;
	}
	
	/**
	* Opens the modal and loads content (if available)
	*/
	$scope.creatorModalOpen = function(type, content, model) {
		$scope.creatorModal = true;
		var component;
		
		switch(type) {
			case 'component':
				$scope.workspace.modal.title		= content.OriginComponent.name + ' Editor';
				$scope.workspace.modal.image		= content.OriginComponent.config.img_icon;
				component							= content.OriginComponent.alias;
				//$scope.workspace.modal.title		= content.OriginComponent.name;
				break;
			case 'content':
				for(var i in $scope.workspace.components) {
					if($scope.workspace.components[i].OriginComponent.alias	=== model.content.type) {
						$scope.workspace.modal.title		= $scope.workspace.components[i].OriginComponent.name + ' Editor';
						$scope.workspace.modal.image		= $scope.workspace.components[i].OriginComponent.config.img_icon;
					}
				}
				component							= model.content.type;
				break;
			case 'schedule':
				break;
			case 'settings':
				break;
		}
		
		if(model) {
			$scope.editor = angular.copy(model);
		} else {
			$scope.editor = {
				content: {
					'title': 	content.OriginComponent.name,
					'type': 	content.OriginComponent.alias
				},
				config: {
					'height': '32px',
					'left': '0px',
					'top':	'0px',
					'width': '32px'
				}
			}
		}
		
		$scope.editor.template		= '/administrator/get/components/'+component;
	}
	
/*
	$scope.contentModalOpen = function(model) {
		$scope.creatorModal = true;
		
		$scope.workspace.modal.title	= content.OriginComponent.name + ' Editor';
		$scope.workspace.modal.image	= content.OriginComponent.config.img_icon;
		
		$scope.editor					= angular.copy(model);
		//$scope.editor.content.title = content.OriginComponent.name;
		$scope.editor.template			= '/administrator/get/components/'+model.content.type;
	}
*/
	
	/**
	* Save/update the content
	*/
	$scope.creatorModalSave = function() {
		$scope.editor.route					= 'creatorContentSave';
		$scope.editor.model					= $scope.ui.platform + $scope.ui.view;
		$scope.editor.origin_ad_schedule_id	= $scope.ui.origin_ad_schedule_id;
		$scope.editor.originAd_id			= originAd_id;
		
		Origin.post($scope.editor).then(function(response) {
			$scope.creatorModal	= false;
			$scope.refreshUI(response);
			//Notification.message(notification);
		});
	}
	
	/**
	* Embed code modal window
	*/
	$scope.embedModalOpen = function() {
		$scope.embedModal = true;
	}
	
	/**
	* Email embed code to user
	*/
	$scope.embedModalEmail = function() {
		
	}
	
	/**
	* Close Embed modal window
	*/
	$scope.embedModalClose = function() {
		$scope.embedModal = false;
	}
	
	/**
	* Settings modal
	*/
	$scope.settingsModalOpen = function() {
		$scope.settingsModal = true;
	}
	
	/**
	* Email embed code to user
	*/
	$scope.settingsModalSave = function() {
		
	}
	
	/**
	* Close Embed modal window
	*/
	$scope.settingsModalClose = function() {
		$scope.settingsModal = false;
	}
	
	/**
	* Saves all changes (resizes, moving) done in workspace
	*/
	$scope.workspaceUpdate = function() {
		$scope.editor.data					= $scope.workspace.ad.OriginAdSchedule;
		$scope.editor.route					= 'creatorWorkspaceUpdate';
		
		Origin.post($scope.editor).then(function(response) {
			if(response) {
				Notification.message({'title': 'Saved', 'content': 'Workspace saved'});
				$j('#save-wrapper').fadeOut(200);
			}
		});
		
/*
	{workspace.ad.OriginAdSchedule[ui.schedule][ui.content]

		
		
		Origin.post($scope.editor).then(function(response) {
			$scope.creatorModal	= false;
			$scope.refreshUI(response);
			//Notification.message(notification);
		});
*/
		
	}
};