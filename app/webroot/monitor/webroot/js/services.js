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
				post: function(task, data) {
					/*var promise = $http.post('index.php?option=com_emc_origin&task='+task, data).then(function(response) {
						return response.data;
					});
					return promise;*/
				}
			};

			return Workspace;
	});