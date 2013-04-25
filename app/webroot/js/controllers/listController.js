var listController = function($scope, $filter, Origin) {
	
	$scope.templates	= {};
	$scope.ads			= {};
	
	Origin.get('templates').then(function(response) {
		$scope.templates	= response;
		//$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
		
		Origin.get('ads').then(function(response) {
			$scope.ads 	= response.origin_ads;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	});
	
	
	$scope.loadModule = function(model) {
		console.log(model);
	}
	
	
	
	
	
/*
	$scope.originCreator 		= {};
	$scope.originCreator.editor	= {};
	$scope.originCreator.form	= {};
	$scope.originCreator.index 	= 0;
	
	Origin.get('templates').then(function(response) {
		$scope.originCreator.templates	= response;
		$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
		
		Origin.get('ads').then(function(response) {
			$scope.originCreator.list 	= response.origin_ads;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	});
	
	$scope.adCreate = function() {
		$scope.originCreator.editor.route			= 'adCreate';
		$scope.originCreator.editor.config			= $scope.originCreator.form.OriginTemplate.config;
		$scope.originCreator.editor.config.template	= $scope.originCreator.form.OriginTemplate.content.alias;
		Origin.post($scope.originCreator.editor).then(function(response) {
			window.location		= response;
		});
	}
	
	$scope.adCreateModalClose = function() {
		$scope.adCreateModal 	= false;
	}
	
	$scope.adCreateModalOpen = function() {
		$scope.adCreateModal	= true;
	}
	
	$scope.adCreateModalOptions = {
		backdropClick:	false,
		backdropFade:	true
	}
	
	$scope.adTemplateSelect = function(type) {
		//$scope.originCreator.templates.length
	
		switch(type) {
			case 'next':
				$scope.originCreator.index	= $scope._arrayLoop($scope.originCreator.templates, $scope.originCreator.index, 'next');
				//console.log($scope.originCreator.index);
				//$scope.originCreator.form		= $scope.originCreator.templates[1];
				break;
			case 'prev':
				$scope.originCreator.index	= $scope._arrayLoop($scope.originCreator.templates, $scope.originCreator.index, 'prev');
				//console.log($scope.originCreator.index);
				break;
		}
		
		$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
	}
*/
}