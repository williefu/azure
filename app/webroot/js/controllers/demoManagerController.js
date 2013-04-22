var demoManagerController = function($scope, $filter, Origin) {
	$scope.demoManagers = {};
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};

	
	Origin.get('demos').then(function(response) {
		$scope.demoManagers = $scope.$parent.listRefresh(response);
	});
	
	$scope.createAlias = function(model) {
		$scope[model].alias		= $scope.$parent.createAlias($scope[model].name);
	}
	
	$scope.demoManagerCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginDemo';
		Origin.post($scope.editor).then(function(response) {
			$scope.demoManagers = response;
			$scope.$parent.notificationOpen('Demo created');
		});
	}
	
	$scope.demoManagerEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.OriginDemo);
	}
	
	$scope.demoManagerRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginDemo';
		
		var ask = confirm('Do you want to remove this demo?');
		if(ask){
			Origin.post($scope.editorModal).then(function(response) {
				$scope.$parent.notificationOpen('Demo removed', 'alert');
				$scope.demoManagers = response;
				$scope.$parent.originModalClose();
			});
		}
	}
	
	$scope.demoManagerSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginDemo';
		Origin.post($scope.editorModal).then(function(response) {
			$scope.$parent.notificationOpen('Demo updated');
			$scope.demoManagers = response;
			$scope.$parent.originModalClose();
		});
	}
	
	$scope.toggleStatus = function(model, id, status) {
		Origin.post($scope.$parent.toggleStatus(model, id, status)).then(function(response) {
			$scope.demoManagers = response;
			switch(status) {
				case 'disable':
					var notification = {
						message: 	'Demo disabled',
						type:		'alert'
					}
					break;
				case 'enable':
					var notification = {
						message: 	'Demo enabled',
						type:		'default'
					}
					break;
			}
			$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}
}

/*
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
	
	$scope.demoManagerLoad = function() {		
		Origin.get('sites').then(function(response) {
			$scope.demoManagerRefresh(response);
		});
	}
	
	$scope.demoManagerRefresh = function(data) {
		$scope.originDemoManager	= data;
		$scope.demoManagerModal 	= false;
	}
	
	$scope.demoManagerAlias = function() {
		$scope.editor.alias	= $filter('createAlias')($scope.editor.name);
	}
	
	$scope.demoManagerEdit = function(data) {
		$scope.modalEditor		= data.OriginDemo;
		$scope.demoManagerModal		= true;
	}
	
	
	$scope.demoManagerSave = function(type) {
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
			$scope.demoManagerRefresh(response);
		});
	}
	
	$scope.demoManagerStatus = function(id, status) {
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
			$scope.demoManagerRefresh(response);
			Notification.message(notification);
		});
	}

	$scope.demoManagerLoad();	
}
*/
