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
	
}