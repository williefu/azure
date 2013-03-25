'use strict';

angular.module('originApp.services', [])
	.factory('Origin', function($http) {
		var Origin = {
			get: function(action) {
				var promise = $http.get('/administrator/Origin/'+action+'.json').then(function(response) {
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
	.factory('List', function($http) {
		var List = {
			get: function(action) {
				var promise = $http.get('/administrator/Origin/'+action+'.json').then(function(response) {
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
		return List;
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
	});


/*



'use strict';

angular.module('originApp.services', ['ngResource'])
	.factory('loadJSON', function($resource) {
		return $resource('/:administrator/:components/com_emc_origin/assets/data/:filename', {}, {
			'components': {method: 'GET', params: {administrator: 'administrator', components: 'components', filename: 'components.json'}},
			'types': {method: 'GET', params: {administrator: 'components', filename: 'originTypes.json'}, isArray: true}
		});
	})
	.factory('List', function($resource) {
		return $resource('index.php', {option: 'com_emc_origin'}, {
			'create': {method: 'POST', params: {task: 'create'}},
			'load': {method: 'GET', params: {task: 'jsonList'}, isArray: true}
		});
	})
	.factory('Workspace', function($http) {
		var Workspace = {
			get: function(location) {
				var promise = $http.get(location).then(function(response) {
					return response.data;
				});
				return promise;
			},
			post: function(task, data) {
				var promise = $http.post('index.php?option=com_emc_origin&task='+task, data).then(function(response) {
					return response.data;
				});
				return promise;
			}
		};
		
		return Workspace;
	});
*/