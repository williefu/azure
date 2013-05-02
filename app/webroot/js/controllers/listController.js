$j(function() {	
	var fixed = $j('#adList-right');
	
    $j(window).scroll(function () {
        if($j(this).scrollTop() > 10) {
            fixed.addClass('originUI-fixed');
        } else {
            fixed.removeClass('originUI-fixed');
        }
    });
});

var listController = function($scope, $filter, Origin) {
	$scope.ads			= {};
	$scope.demos		= {};
	$scope.editor		= {};
	$scope.editor.content = {}
	$scope.module		= {};
	$scope.templates	= {};
	$scope.users		= {};
	$scope.embedOptions = {
		'auto':		0,
		/* 'bg':		'#000000', WHY IS THIS EVEN AN OPTION? */
		'close':	0,
		'hover':	0
	};
	
	Origin.get('templates').then(function(response) {
		$scope.templates		= response;
		//$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
		
		Origin.get('ads').then(function(response) {
			$scope.ads 		= response.origin_ads;
			$scope.module	= $scope.ads[0].OriginAd;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
			
			$scope.refreshDemo();
			
		});
	});
	
	$scope.adCreate = function() {
		$scope.editor.advance 		= false;
		$scope.editor.content 		= {};
		$scope.editor.content.ga_id = 'UA-12310597-73';
		$scope.editor.content.img_thumbnail='';
		$scope.editor.header		= 'Create New Ad';
		$scope.editor.statusSwitch	= true;
		//$scope.editor.template 		= $scope.templates[0];
		$scope.editor.type			= 'create';
		$scope.$parent.originModalOpen();
		//$scope.editorModal = angular.copy(model.OriginTemplate);
	}
	
	$scope.adCreateSave = function() {
		$scope.editor.route				= 'adCreate';
		$scope.editor.status			= ($scope.editor.statusSwitch)? 1: 0;
		//$scope.editor.content.ga_id		= $scope.editor.ga_id;
		$scope.editor.config			= $scope.editor.template.OriginTemplate.config;
		$scope.editor.config.template	= $scope.editor.template.OriginTemplate.alias;
		
		$scope.$parent.originModalClose();
		
		delete $scope.editor.advance;
		delete $scope.editor.ga_id;
		delete $scope.editor.header;
		delete $scope.editor.statusSwitch;
		delete $scope.editor.template;
		delete $scope.editor.type;
				
		Origin.post($scope.editor).then(function(response) {
			window.location		= response;
		});
	}
	
	$scope.embedCreate = function() {
		$scope.editor = {
			header:	'Generate Embed Code',
			type:	'embed'
		}
		
		$scope.embedOptions.id	= $scope.module.id;
		$scope.embedOptions.type= $scope.module.config.template;
		$scope.$parent.originModalOpen();
	}
	
	$scope.loadModule = function(model) {
		//console.log(model);
		$scope.module = model.OriginAd;
		$scope.refreshDemo();
	}
	
	$scope.refreshDemo = function() {
		Origin.get('demo/'+$scope.module.id).then(function(response) {
			$scope.demos 	= response;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	}
	
	$scope.templateLoad = function() {
		$scope.editor.config= $scope.editor.template.OriginTemplate.config;
	}
	
	$scope.templateToggle = function() {
		switch($scope.editor.advance) {
			case false:
				$scope.editor.advance = true;
				break;
			case true:
				$scope.editor.advance = false;
				break;
		}
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