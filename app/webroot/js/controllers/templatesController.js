var templatesController	= function($scope, $filter, Origin) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.templates 	= {};
	//$scope.dimensions	= ['Desktop', 'Tablet', 'Mobile'];
	
	Origin.get('templates').then(function(response) {
		$scope.templates = $scope.$parent.listRefresh(response);
	});
	
	$scope.createAlias = function(model) {
		$scope[model].alias		= $scope.$parent.createAlias($scope[model].name);
	}
	
	$scope.templateCreate = function() {
		$scope.editor.route	= 'systemSave';
		$scope.editor.model	= 'OriginTemplate';
		Origin.post($scope.editor).then(function(response) {
			$scope.templates = response;
			$scope.$parent.notificationOpen('Template created');
		});
	}
	
	$scope.templateEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.OriginTemplate);
	}
	
	$scope.templateRemove = function() {
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'OriginTemplate';
		
		var ask = confirm('Do you want to remove this template?');
		if(ask){
			Origin.post($scope.editorModal).then(function(response) {
				$scope.$parent.notificationOpen('Template removed', 'alert');
				$scope.templates = response;
				$scope.$parent.originModalClose();
			});
		}
	}
	
	$scope.templateSave = function() {
		$scope.editorModal.route	= 'systemSave';
		$scope.editorModal.model	= 'OriginTemplate';
		Origin.post($scope.editorModal).then(function(response) {
			$scope.$parent.notificationOpen('Template updated');
			$scope.templates = response;
			$scope.$parent.originModalClose();
		});
	}
	
	$scope.toggleStatus = function(model, id, status) {
		Origin.post($scope.$parent.toggleStatus(model, id, status)).then(function(response) {
			$scope.templates = response;
			switch(status) {
				case 'disable':
					var notification = {
						message: 	'Template disabled',
						type:		'alert'
					}
					break;
				case 'enable':
					var notification = {
						message: 	'Template enabled',
						type:		'default'
					}
					break;
			}
			$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}

/*
	$scope.originTemplates					= {};
	$scope.originTemplates.confirmDelete	= false;
	$scope.originTemplates.editor			= {};
	$scope.originTemplates.editor.content 	= {};
	$scope.originTemplates.editor.config	= {};
	$scope.originTemplates.modalOptions 	= {
		backdropClick:	false,
		backdropFade: 	true
	}
	
	Origin.get('templates').then(function(response) {
		$scope.templateRefresh(response);
	});
	
	
	$scope.templateRefresh = function(data) {
		$scope.originTemplates	= data;
		$scope.templateModal 	= false;
	}
	
	$scope.templateCreate = function() {
		$scope.templateModal 	= true;
	}
	
	$scope.templateDelete = function() {
		$scope.originTemplates.editor.route	= 'templateDelete';
		
		Origin.post($scope.originTemplates.editor).then(function(response) {
			$scope.templateRefresh(response);
		});
	}
	
	$scope.templateEdit = function(data) {
		$scope.originTemplates.editor	= data.OriginTemplate;
		$scope.templateModal			= true;
	}
	
	$scope.templateModalClose = function() {
		$scope.templateModal					= false;
		$scope.originTemplates.editor			= {};
		$scope.originTemplates.confirmDelete	= false;
	}
	
	$scope.templateSave = function() {
		if($scope.originTemplates.editor.name) {
			//$scope.originTemplates.editor.content.alias	= $filter('createAlias')($scope.originTemplates.editor.name);
			$scope.originTemplates.editor.route			= 'templateSave';
			Origin.post($scope.originTemplates.editor).then(function(response) {
				$scope.templateRefresh(response);
			});
		}
	}
	
	$scope.templateUnchanged = function() {
		return angular.equals(undefined, $scope.originTemplates.editor);
	}
*/
}
