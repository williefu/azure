'use strict';

angular.module('originApp.services', [])
	.factory('Origin', function($http) {
		var Origin = {
			get: function(action) {
				var promise = $http.get('/administrator/get/'+action+'.json').then(function(response) {
					return response.data;
				});
				return promise;
			},
			post: function(data) {
				var promise = $http.post('/administrator/Origin/Post', data).then(function(response) {
					return response.data;
				});
				return promise;
			}
		}
		return Origin;
	})
	.factory('Notification', function($rootScope) {
		var notification = {};
		
		notification.message = function(data) {
			notification.type 		= (data.type)? 'originNotification-'+data.type: 'originNotification-default';
			notification.icon		= (data.icon)? '/img/'+data.icon: '/img/notification-26x26.png';
			notification.content	= data.content;
			
			notification.broadcastItem();
		};
		
		notification.broadcastItem = function() {
			$rootScope.$broadcast('notificationBroadcast');
		}
		
		return notification;
	})
	.factory('Users', function($http) {
		var Users = {
			get: function(action) {
				var promise = $http.get('/administrator/'+action+'.json').then(function(response) {
					return response.data;
				});
				return promise;
			}
		}
		return Users;
	})
	.factory('Monitor', function($http){
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