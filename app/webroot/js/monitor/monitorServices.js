'use strict';

angular.module('originApp.monitorModule.services', [])
	.factory('Monitor', function($http) {
		var Monitor = {
				get: function(action) {
					var promise = $http.get('/administrator/get/monitor/'+action+'.json').then(function(response) {
						return response.data;
					});
					return promise;
				},
				post: function(data) {
					var promise = $http.post('/administrator/Monitor/Post', data).then(function(response) {
						return response.data;
					});
					return promise;
				}
			}
		return Monitor;
	});