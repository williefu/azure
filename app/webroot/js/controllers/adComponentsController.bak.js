var originComponents	= function($scope, $filter, Origin, Notification) {
	$scope.editor							= {};
	$scope.editor.content 					= {};
	$scope.editor.config					= {};
	$scope.modalEditor						= {};
	$scope.status							= {};
	$scope.originComponents					= {};
	$scope.originComponents.confirmDelete	= false;
	
	$scope.groups = [
		{
			name:	'Embed',
			alias:	'embed'
		},
		{
			name:	'CTA',
			alias:	'cta'
		},
		{
			name:	'Media',
			alias:	'media'
		},
		{
			name:	'Link',
			alias:	'link'
		},
		{
			name:	'Video',
			alias:	'video'
		},
	];
	//$scope.editor.config.group				= $scope.groups[0].alias;
	
	
	$scope.originComponents.modalOptions = {
		backdropClick:	false,
		backdropFade: 	true
	}
	
	$scope.componentGroup = function(data, model) {
		console.log(data);
		console.log($scope['editor'].config.group);
	}
	
	$scope.componentLoad = function() {		
		Origin.get('components').then(function(response) {
			$scope.componentRefresh(response);
		});
	}
	
	$scope.componentRefresh = function(data) {
		$scope.originComponents	= data;
		$scope.componentModal 	= false;
	}
	
	$scope.componentAlias = function() {
		$scope.editor.alias	= $filter('createAlias')($scope.editor.name);
	}
	
	/*
	$scope.componentCreate = function() {
		$scope.componentModal 	= true;
	}
	*/
	
/*
	$scope.componentDelete = function() {
		$scope.editor.route	= 'componentDelete';
		
		List.post($scope.editor).then(function(response) {
			$scope.componentRefresh(response);
		});
	}
*/
	
	$scope.componentEdit = function(data) {
		$scope.modalEditor		= data.OriginComponent;
		$scope.componentModal	= true;
	}
	
	$scope.componentModalClose = function() {
		$scope.componentModal					= false;
		$scope.modalEditor						= {};
		$scope.originComponents.confirmDelete	= false;
	}
	
	$scope.componentSave = function(type) {
		switch(type) {
			case 'create':
				break;
			case 'update':
				$scope.editor		= angular.copy($scope.modalEditor);
				break;
		}
		
		$scope.editor.route			= 'componentSave';
		Origin.post($scope.editor).then(function(response) {
			$scope.editor = {};
			$scope.componentRefresh(response);
		});
	}
	
	$scope.componentStatus = function(id, status) {
		notification.title 		= 'Updated';
		$scope.status.id		= id;
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				notification.content 	= 'Component disabled';
				break;
			case 'enable':
				$scope.status.status	= 1;
				notification.content 	= 'Component enabled';
				break;
		}
		
		$scope.status.route			= 'componentStatus';
		Origin.post($scope.status).then(function(response) {
			$scope.componentRefresh(response);
			Notification.message(notification);
		});
	}
	
	$scope.componentLoad();
}
