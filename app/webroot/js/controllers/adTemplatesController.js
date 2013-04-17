var originTemplates	= function($scope, $filter, Origin, Notification) {
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
}
