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
	//$scope.workspace.display	= {};	//Ad's display model
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
		//$scope.workspace.display	= $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content];
		//$scope.layers				= angular.copy($scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content]);
		
		$scope.layers				= angular.copy($filter('orderBy')($scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content], '-order'));
		//console.log($scope.layers);
		
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
/*
	$scope.updateLayers = function() {
		var order = ($scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content].length - 1);
		for(var layerIndex in $scope.layers) {
			for(var contentIndex in $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content]) {
				if($scope.layers[layerIndex].id === $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content][contentIndex].id) {
					$scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content][contentIndex].order = order;
					order--;
				}
			}
			
		}
		
		//HOW TO TRIGGER REFRESH???
		$scope.refreshUI($scope.workspace.ad);
		
		//console.log($scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content]);
		$j('#save-wrapper, #undo-wrapper').fadeIn(300);
	}
*/
	
/*
	$scope.$watch('layers', function() {
		if(!angular.equals($scope.layers, $scope.workspace.display) && $scope.layers.length) {
			//SORTING SHOULDN'T AUTO UPDATE!
			//PROBLEM: WATCH IS LOOKING IN WRONG SPOT.
			//SOLUTION: SOME SORT OF EVENT HANDLER INSTEAD OF WATCHING
			for(var index in $scope.workspace.display) {
				//$scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule][$scope.ui.content][index].order = index;
				//data[index]		= {'id': $scope.layers[index].id, 'order': index};
			}
			
			$j('#save-wrapper, #undo-wrapper').fadeIn(300);
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
*/
	
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
	* Adds content through drag-and-drop directive
	*/
	$scope.creatorLibrarySave = function(data) {
		$scope.editor						= data;
		$scope.editor.route					= 'creatorContentSave';
		$scope.editor.model					= $scope.ui.platform + $scope.ui.view;
		$scope.editor.origin_ad_schedule_id	= $scope.ui.origin_ad_schedule_id;
		$scope.editor.originAd_id			= originAd_id;
		
		Origin.post($scope.editor).then(function(response) {
			$scope.editor = {};
			$scope.refreshUI(response);
			Notification.message({'title': 'Added', 'content': 'Asset added to workspace'});
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
	* Undo workspace changes
	*/
	$scope.workspaceUndo = function() {
		Origin.get('ad/'+originAd_id).then(function(response) {
			$scope.refreshUI(response);
		});
	}
	
	/**
	* Saves all changes (resizes, moving) done in workspace
	*/
	$scope.workspaceUpdate = function() {
		$scope.editor.data					= $scope.workspace.ad.OriginAdSchedule;
		$scope.editor.route					= 'creatorWorkspaceUpdate';
		
		Origin.post($scope.editor).then(function() {
			Notification.message({'title': 'Saved', 'content': 'Workspace saved'});
			$j('#save-wrapper').fadeOut(200);
		});
	}
};