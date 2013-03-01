'use strict';

/*var origin_id		= $j('#origin_id').val(),
	origin_assets	= 'http://'+document.domain+'/assets/components/com_emc_origin/'+origin_id,
	duration		= 200;
	*/
	
/**
* List Controller
**/
//var listCtrl = function($scope, loadJSON, List) {
//	$scope.monitor 		= {};
		/*
	$scope.proceed = function($event) {
		if(evolveJS.validate($j(evolveJS.currentForm($event.target)))) {
			List.create(
				{data: $scope.origin},
				function(response) {
					window.location 	= 'index.php?option=com_emc_origin&task='+response['task']+'&id='+response['oid'];
				}
			);
		}
		return false;
	}*/
		
//}

/**
* Workspace Controller
**/

angular.module('workspaceApp', ['monitorApp.services', 'ui']);

var workspaceCtrl = function($scope, Workspace) {
	//Global Monitor object
	$scope.monitorObj = {};
	$scope.test1			= 'testing!';
	
	//Global workspace settings
	$scope.originWorkspace	= {
		//'id':		origin_id,
		'panel':	'layers',
		'panelSlide':'close',
		'panelSlideContent': 'components',
		'schedule':	'0',
		'settings':	'close',
		'state':	'initial',
		'view':		'desktop',
		'state_view':'initial_desktop'
	};

	//Load Monitor data
	Workspace.get('Json/monitorlist').then(function(data) {
				/*
$scope.originObj.content	= data.content;
				$scope.originObj.config		= data.config;
				
				$scope.originObj.current 	= $scope.originObj.content[$scope.originWorkspace.schedule][$scope.originWorkspace.state+'_'+$scope.originWorkspace.view];
*/
				//refreshOrigin(data);
				//document.title				= 'Origin | '+$scope.originObj.config.name;
			});



	$scope.workspaceUI = function(type, value) {
		$scope.originWorkspace[type]		= value;
		$scope.originWorkspace.state_view	= $scope.originWorkspace.state+'_'+$scope.originWorkspace.view;
		$scope.originObj.current 	 		= $scope.originObj.content[$scope.originWorkspace.schedule][$scope.originWorkspace.state+'_'+$scope.originWorkspace.view];

		$scope.originWorkspace.settings = 'open';
		$scope.settings('close');
		//$scope.panelAdd('settings');
	}

	$scope.originServices = function(type, data) {
		switch(type) {
			case 'background_preview':
				$scope.background 		= data.name;
				//$scope.originObj.config.config[$scope.originWorkspace.state_view]	= data.name;
/*
				$scope.$watch('originWorkspace.panelSlide', function() {
					console.log('here');
				}, true);
*/
				break;
			case 'background_save':
				$scope.originObj.config.config[$scope.originWorkspace.state_view] = $scope.background;

				Workspace.post('saveOrigin', $scope.originObj.config).then(function(data) {
					$j('html, body').animate({scrollTop: 0}, 'fast', function() {
						azure._originNotification('Background saved');
						refreshOrigin(data);
					});
				});
				break;
			//case 'content_create':
			//	break;
			case 'content_config':
				Workspace.post('saveContentConfig', data).then(function(data) {
					azure._originNotification('Workspace updated');
					refreshOrigin(data);
				});
				break;
			case 'delete':
				data.oid	= origin_id;
				Workspace.post('deleteContent', data).then(function(data) {
					azure._originNotification('Item has been deleted', 'alert');
					$scope.panelSlide('close');
					refreshOrigin(data);
				});
				break;
			case 'droppable':
				Workspace.post('createContent', data).then(function(data) {
					azure._originNotification('Content added to workspace');
					refreshOrigin(data);
				});
				break;
			case 'order':
				Workspace.post('saveOrder', data).then(function(data) {
					azure._originNotification('Item order has been updated');
					refreshOrigin(data);
				});
				break;
			case 'save':
				var data = {
					'content_config':	$scope.originEditor.content_config,
					'content_data':		$scope.originEditor.content_data,
					'content_render':	$scope.originEditor.content_render,
					'id':				$scope.originEditor.id,
					'oid':				origin_id,
					'sid':				$scope.originObj.content[$scope.originWorkspace.schedule].id,
					'state':			$scope.originWorkspace.state_view
				};

				//If there's an content id, update
				if(data.id) {
					Workspace.post('saveContent', data).then(function(data) {
						$scope.panelSlide('close');
						$j('html, body').animate({scrollTop: 0}, 'fast').promise().done(function() {
							azure._originNotification('Content added to workspace');
							refreshOrigin(data);
						});
					});
				} else {	
					Workspace.post('createContent', data).then(function(data) {
						$scope.panelSlide('close');
						azure._originNotification('Content added to workspace');
						refreshOrigin(data);
					});
				}
				break;
		}
	}

	function refreshOrigin(data) {

		if(!$scope.$$phase) {
			$scope.$apply(function() {
				$scope.originObj.content	= data.content;
				$scope.originObj.config		= data.config;
				$scope.originObj.current 	= $scope.originObj.content[$scope.originWorkspace.schedule][$scope.originWorkspace.state+'_'+$scope.originWorkspace.view];
	        });	
		} else {
			//NOT SURE.... FIND A BETTER WAY!
			$scope.originObj.content	= data.content;
			$scope.originObj.config		= data.config;
			$scope.originObj.current 	= $scope.originObj.content[$scope.originWorkspace.schedule][$scope.originWorkspace.state+'_'+$scope.originWorkspace.view];
		}
	}
}