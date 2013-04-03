'use strict';

angular.module('monitorApp.services',[])
	.factory('Workspace', function($http){
		var Workspace = {
				get: function(location) {
					//var promise = $http.get(location).then(function(response) {
					var promise = $http.get('/administrator/get/monitor/'+action+'.json').then(function(response) {
						return response.data;
					});
					return promise;
				},
				post: function(link, data) {
					//var promise = $http.post(link, data).then(function(response) {
					var promise = $http.post('/administrator/Monitor/Post', data).then(function(response) {
						return response.data;
					});
					return promise;
				}
			};

			return Workspace;
	});