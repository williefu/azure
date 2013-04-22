var siteController	= function($scope, $filter, Origin) {
	$scope.sites 		= {};
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};

	
	Origin.get('sites').then(function(response) {
		$scope.sites = $scope.$parent.listRefresh(response);
	});
	
	$scope.createAlias = function(model) {
		$scope[model].alias		= $scope.$parent.createAlias($scope[model].name);
	}
	
	$scope.siteCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginSite';
		Origin.post($scope.editor).then(function(response) {
			$scope.sites = response;
			$scope.$parent.notificationOpen('Site created');
		});
	}
	
	$scope.siteEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.OriginSite);
	}
	
	$scope.siteRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginSite';
		
		var ask = confirm('Do you want to remove this site?');
		if(ask){
			Origin.post($scope.editorModal).then(function(response) {
				$scope.$parent.notificationOpen('Site removed', 'alert');
				$scope.sites = response;
				$scope.$parent.originModalClose();
			});
		}
	}
	
	$scope.siteSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginSite';
		Origin.post($scope.editorModal).then(function(response) {
			$scope.$parent.notificationOpen('Site updated');
			$scope.sites = response;
			$scope.$parent.originModalClose();
		});
	}
	
	$scope.toggleStatus = function(model, id, status) {
		Origin.post($scope.$parent.toggleStatus(model, id, status)).then(function(response) {
			$scope.sites = response;
			switch(status) {
				case 'disable':
					var notification = {
						message: 	'Site disabled',
						type:		'alert'
					}
					break;
				case 'enable':
					var notification = {
						message: 	'Site enabled',
						type:		'default'
					}
					break;
			}
			$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}
}
