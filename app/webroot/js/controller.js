'use strict';

/**
* List Controller
**/
//angular.module('listApp', ['originApp.services', 'originApp.directives', 'originApp.filters']);


//'creatorApp.services', 'creatorApp.directives'
var listCtrl = function($scope, $filter, List) {
	$scope.originCreator = {};
	
	List.get().then(function(response) {
		$scope.originCreator.list 	= response.origin_ads;
		//console.log($scope.originCreator.list.origin_ads[0].Creator);
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