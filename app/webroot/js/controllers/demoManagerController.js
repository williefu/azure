var originDemoManager	= function($scope, $filter, Origin, Notification) {
	$scope.editor							= {};
	$scope.editor.content 					= {};
	$scope.editor.config					= {};
	$scope.status							= {};
	$scope.originDemoManager				= {};
	$scope.originDemoManager.confirmDelete		= false;
	$scope.originDemoManager.modalOptions = {
		backdropClick:	false,
		backdropFade: 	true
	}
	
	$scope.siteLoad = function() {		
		Origin.get('sites').then(function(response) {
			$scope.siteRefresh(response);
		});
	}
	
	$scope.siteRefresh = function(data) {
		$scope.originDemoManager	= data;
		$scope.demoManagerModal 	= false;
	}
	
	$scope.siteAlias = function() {
		$scope.editor.alias	= $filter('createAlias')($scope.editor.name);
	}
	
	$scope.siteEdit = function(data) {
		$scope.modalEditor		= data.OriginSite;
		$scope.demoManagerModal		= true;
	}
	
	
	$scope.siteSave = function(type) {
		switch(type) {
			case 'create':
				break;
			case 'update':
				$scope.editor		= angular.copy($scope.modalEditor);
				break;
		}
		
		$scope.editor.route			= 'siteSave';
		Origin.post($scope.editor).then(function(response) {
			$scope.editor = {};
			$scope.siteRefresh(response);
		});
	}
	
	$scope.siteStatus = function(id, status) {
		notification.title 		= 'Updated';
		$scope.status.id		= id;
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				notification.content 	= 'Site disabled';
				break;
			case 'enable':
				$scope.status.status	= 1;
				notification.content 	= 'Site enabled';
				break;
		}
		
		$scope.status.route			= 'siteStatus';
		Origin.post($scope.status).then(function(response) {
			$scope.siteRefresh(response);
			Notification.message(notification);
		});
	}

	$scope.siteLoad();	
}
