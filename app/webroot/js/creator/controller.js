'use strict';

/**
* List Controller
**/
angular.module('listApp', ['creatorApp.services', 'creatorApp.directives', 'creatorApp.filters']);


//'creatorApp.services', 'creatorApp.directives'
var listCtrl = function($scope, $filter, List) {
	$scope.originCreator = {};
	
	List.get().then(function(response) {
		$scope.originCreator.list 	= response.origin_ads;
		//console.log($scope.originCreator.list.origin_ads[0].Creator);
	});
	
}