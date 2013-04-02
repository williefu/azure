'use strict';

angular.module('monitorApp.services',[])
	.factory('Workspace', function($http){
		var Workspace = {
				get: function(location) {
					var promise = $http.get(location).then(function(response) {
						return response.data;
					});
					return promise;
				},
				post: function(link, data) {
					var promise = $http.post(link, data).then(function(response) {
						return response.data;
					});
					return promise;
				}
			};

			return Workspace;
	});