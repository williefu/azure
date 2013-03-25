'use strict';

var $j = jQuery.noConflict();

var originGeneral = function($scope) {
	$scope.formSubmit = function() {
		$j('#UserEditUserForm').submit();
	}
} 

var originAllUsers = function($scope, $filter, Users) {
	$scope.originUsers	= {};
	
	Users.get('allUsers').then(function(response) {
		$scope.originUsers	= response;
		$scope.sortBy		= 'User.id';
	});
}

var originAllGroups = function($scope, Users) {
	$scope.originGroups = {};
	Users.get('allGroups').then(function(response) {
		$scope.originGroups	= response;
		$scope.sortBy		= 'UserGroup.id';
	});
}

var originTemplates	= function($scope, $filter, List) {
	$scope.originTemplates					= {};
	$scope.originTemplates.confirmDelete	= false;
	$scope.originTemplates.editor			= {};
	$scope.originTemplates.modalOptions 	= {
		backdropClick:	false,
		backdropFade: 	true
	}
	
	List.get('templates').then(function(response) {
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
		
		List.post($scope.originTemplates.editor).then(function(response) {
			$scope.templateRefresh(response);
		});
	}
	
	$scope.templateEdit = function(data) {
		$scope.originTemplates.editor	= data.OriginAdTemplate;
		$scope.templateModal			= true;
	}
	
	$scope.templateModalClose = function() {
		$scope.templateModal					= false;
		$scope.originTemplates.editor			= {};
		$scope.originTemplates.confirmDelete	= false;
	}
	
	$scope.templateSave = function() {
		$scope.originTemplates.editor.alias	= $filter('createAlias')($scope.originTemplates.editor.name);
		$scope.originTemplates.editor.route	= 'templateSave';
		
		List.post($scope.originTemplates.editor).then(function(response) {
			$scope.templateRefresh(response);
		});
	}
	
	$scope.templateUnchanged = function() {
		return angular.equals(undefined, $scope.originTemplates.editor);
	}
}

/**
* List Controller
**/
//angular.module('listApp', ['originApp.services', 'originApp.directives', 'originApp.filters']);


//'creatorApp.services', 'creatorApp.directives'
var originAds = function($scope, $filter, Origin) {
	
	$scope.originCreator 		= {};
	$scope.originCreator.editor	= {};
	$scope.originCreator.form	= {};
	
	Origin.get('templates').then(function(response) {
		$scope.originCreator.templates	= response;
		$scope.originCreator.form		= $scope.originCreator.templates[0];
		
		Origin.get('ads').then(function(response) {
			$scope.originCreator.list 	= response.origin_ads;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	});
	
	$scope.adCreate = function() {
		$scope.originCreator.editor.route	= 'adCreate';
		$scope.originCreator.editor.type 	= $scope.originCreator.form.OriginAdTemplate.content.alias;

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
	
}

/*


  $scope.open = function () {
    $scope.shouldBeOpen = true;
  };

  $scope.close = function () {
    $scope.closeMsg = 'I was closed at: ' + new Date();
    $scope.shouldBeOpen = false;
  };

  $scope.items = ['item1', 'item2'];

  $scope.opts = {
    backdropFade: true,
    dialogFade:true
  };

*/