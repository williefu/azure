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
	$scope.ad 					= {};
	$scope.ad.content 			= {};
	$scope.ad.content.image		= {};
	$scope.workspace			= {};	//Workspace wrapper model
	$scope.workspace.ad 		= {};	//Complete ad unit model
	$scope.workspace.components = {};	//List of all components
	$scope.workspace.componentsRaw	= {};
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
		$scope.workspace.componentsRaw	= $scope.workspace.components['raw'];
		delete $scope.workspace.components['raw'];
		
		$scope.updateLibrary();
		
		Origin.get('ad/'+originAd_id).then(function(response) {
			template_id					= response.OriginAd.config.type_id;
			//$scope.ad.content			= response.OriginAd.content;
			$scope.workspace.ad			= response;
			//$scope.updateUI();
			
			//Origin.get('template/'+template_id).then(function(response) {
			//	$scope.workspace.template	= response.OriginTemplate;
				
				$scope.$watch('ui.view', function() {
					$scope.updateUI();
				});	
			//});
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
		
		$scope.ui.origin_ad_schedule_id = $scope.workspace.ad.OriginAdSchedule[$scope.ui.schedule].id;
		$scope.workspaceTemplateConfig = function() {
			return {
				height:	$scope.workspace.ad.OriginAd.config.dimensions[$scope.ui.view][$scope.ui.platform].height+'px',
				width: 	$scope.workspace.ad.OriginAd.config.dimensions[$scope.ui.view][$scope.ui.platform].width+'px'
				/*
height:	$scope.workspace.template.config.dimensions[$scope.ui.view][$scope.ui.platform].height+'px',
				width: 	$scope.workspace.template.config.dimensions[$scope.ui.view][$scope.ui.platform].width+'px'
*/
			}
		}
	}
	
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
		switch(type) {
			case 'component':
				$scope.workspace.modal.title		= content.name + ' Editor';
				$scope.workspace.modal.image		= content.config.img_icon;
				$scope.workspace.modal.alias		= content.alias;
				//$scope.workspace.modal.title		= content.OriginComponent.name;
				break;
			case 'content':
				for(var i in $scope.workspace.componentsRaw) {
					if($scope.workspace.componentsRaw[i].OriginComponent.alias	=== model.content.type) {
						$scope.workspace.modal.title		= $scope.workspace.componentsRaw[i].OriginComponent.name + ' Editor';
						$scope.workspace.modal.image		= $scope.workspace.componentsRaw[i].OriginComponent.config.img_icon;
					}
				}
				$scope.workspace.modal.alias		= model.content.type;
				break;
			case 'schedule':
				break;
		}
		
		if(model) {
			$scope.editor 			= angular.copy(model);
			$scope.editor.remove 	= true;
		} else {
			$scope.editor = {
				content: {
					'title': 	content.name,
					'type': 	content.alias
				},
				config: {
					'height': '32px',
					'left': '0px',
					'top':	'0px',
					'width': '32px'
				},
				remove: false
			}
		}
		
		$scope.editor.template		= '/administrator/get/components/'+$scope.workspace.modal.alias;
	}
		
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
			Notification.message({'content': 'Content saved'});
		});
	}
	
	/**
	* Removes the content from the ad
	*/
	$scope.creatorModalRemove = function(data) {
		var ask = confirm('Do you want to remove this item?');
		if(ask){
			$scope.editor				= data;
			$scope.editor.route			= 'creatorContentRemove';
			$scope.editor.model			= $scope.ui.platform + $scope.ui.view;
			$scope.editor.originAd_id	= originAd_id;

			Origin.post($scope.editor).then(function(response) {
				$scope.creatorModal	= false;
				$scope.refreshUI(response);
				Notification.message({'content': 'Content deleted', 'type': 'alert'});
				//Notification.message({'title': 'Removed', 'content': 'Content deleted'});
			});	
		} else {
			return false;
		}
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
			Notification.message({'content': 'Asset added to workspace'});
			//Notification.message({'title': 'Added', 'content': 'Asset added to workspace'});
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
		$scope.editor				= $scope.workspace.ad.OriginAd;
		$scope.editor.statusSwitch	= ($scope.editor.status === '1')? true: false;
		$scope.settingsModal 		= true;
	}
	
	/**
	* Update Origin ad settings
	*/
	$scope.settingsModalSave = function() {
		$scope.editor.route			= 'creatorSettingsUpdate';
		
		Origin.post($scope.editor).then(function() {
			$scope.settingsModalClose();
			Notification.message({'content': 'Settings updated'});
		});
	}
	
	/**
	* Close settings modal window
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
			Notification.message({'content': 'Previous workspace loaded'});
			$j('#actions-wrapper').fadeOut(200);
		});
	}
	
	/**
	* Saves all changes (resizes, moving) done in workspace
	*/
	$scope.workspaceUpdate = function() {
		$scope.editor.data					= $scope.workspace.ad.OriginAdSchedule;
		$scope.editor.route					= 'creatorWorkspaceUpdate';
		
		Origin.post($scope.editor).then(function() {
			Notification.message({'content': 'Workspace saved'});
			$j('#actions-wrapper').fadeOut(200);
		});
	}
};