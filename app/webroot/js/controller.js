'use strict';


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

var originTemplates	= function($scope, List) {
	$scope.originTemplates					= {};
	$scope.originTemplates.editor			= {};
	$scope.originTemplates.modalOptions 	= {
		backdropFade: true
	}
	
	List.get('templates').then(function(response) {
		$scope.originTemplates	= response;		
	});
	
	$scope.templateCreate = function() {
		$scope.templateModal 	= true;
	}
	
	$scope.templateEdit = function(data) {
		$scope.originTemplates.editor	= data.OriginAdTemplate;
		$scope.templateModal			= true;
	}
	
	$scope.templateModalClose = function() {
		$scope.templateModal	= false;
	}
	
	$scope.templateSave = function() {
		$scope.originTemplates.editor.route	= 'templateSave';
	
		List.post($scope.originTemplates.editor).then(function(response) {
			$scope.originTemplates 	= response;
			$scope.templateModal 	= false;
			//console.log(response);
		});
		//console.log($scope.originTemplates.editor);
	}
}

/**
* List Controller
**/
//angular.module('listApp', ['originApp.services', 'originApp.directives', 'originApp.filters']);


//'creatorApp.services', 'creatorApp.directives'
var listCtrl = function($scope, $filter, List) {
	$scope.originCreator 		= {};
	$scope.originCreator.form	= {};
	
	List.get('templates').then(function(response) {
		$scope.originCreator.templates	= response;
		$scope.originCreator.form		= $scope.originCreator.templates[0];
		
		List.get('ads').then(function(response) {
			$scope.originCreator.list 	= response.origin_ads;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	});
	
	
	$scope.listCreateNew = function() {
		$scope.listCreateModal	= true;
	}
	
	$scope.listCreateModalClose = function() {
		$scope.listCreateModal 	= false;
	}
	
	$scope.listCreateModalOptions = {
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