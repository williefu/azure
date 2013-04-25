var usersController = function($scope, $filter, Origin) {
	$scope.editor		= {};
	$scope.editorModal	= {};
	$scope.status		= {};
	$scope.users 		= {};
	
	$scope.loadUsers = function() {
		Origin.get('users').then(function(response) {
			$scope.users = $scope.$parent.listRefresh(response);
		});

	}
	
	$scope.userCreate = function() {
		$scope.editor.route	= 'dashboardUserAdd';
		Origin.post($scope.editor).then(function(response) {
			$scope.$parent.notificationOpen('User created');
			$scope.loadUsers();
			$scope.editor 		= {};
		});
	}
	
	$scope.userEdit = function(model) {
		$scope.$parent.originModalOpen();
		$scope.editorModal = angular.copy(model.User);
		$scope.editorModal.password = $scope.editorModal.cpassword = '';
	}
	
	$scope.userRemove = function() {
/*
		$scope.editorModal.route	= 'systemRemove';
		$scope.editorModal.model	= 'User';
		
		var ask = confirm('Do you want to remove this user?');
		if(ask){
			Origin.post($scope.editorModal).then(function(response) {
				$scope.$parent.notificationOpen('User removed', 'alert');
				$scope.users = response;
				$scope.$parent.originModalClose();
			});
		}
*/
	}
	
	$scope.userSave = function() {
		$scope.editorModal.route = 'dashboardUserUpdate';
		
		Origin.post($scope.editorModal).then(function() {
			$scope.loadUsers();
			$scope.$parent.originModalClose();
			$scope.$parent.notificationOpen('User updated');
		});
	}
	
	$scope.toggleStatus = function(id, status) {
		$scope.status.route			= 'dashboardUserStatus';
		$scope.status.id			= id;
		
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				var notification = {
						message: 	'User disabled',
						type:		'alert'
					}
				break;
			case 'enable':
				$scope.status.status	= 1;
				var notification = {
						message: 	'User enabled',
						type:		'default'
					}
				break;
		}
		
		Origin.post($scope.status).then(function() {
			$scope.loadUsers();
			$scope.$parent.notificationOpen(notification.message, notification.type);
		});
	}
	
	$scope.loadUsers();	

/*
	$scope.originUsers	= {};
	$scope.editor		= {};
	$scope.editorEdit	= {};
	$scope.status 		= {};
	$scope.groupName	= 'Select Group';
	
	$scope.loadUsers = function() {
		Origin.get('users').then(function(response) {
			$scope.originUsers	= response;
			//$scope.sortBy		= 'User.id';
		});	
	}
	
	$scope.userCreate = function() {
		notification.title 		= 'Updated';
		notification.content 	= 'User created';
		$scope.editor.route		= 'dashboardUserAdd';
		
		Origin.post($scope.editor).then(function() {
			$scope.editor 		= {};
			$scope.groupName	= 'Select Group';
			//Notification.message(notification);
			$scope.loadUsers();
		});
	}
	
	$scope.userUpdate = function() {
		notification.title 		= 'Updated';
		notification.content 	= 'User updated';
		
		$scope.editorEdit.route = 'dashboardUserUpdate';
		
		Origin.post($scope.editorEdit).then(function() {
			$scope.loadUsers();
			$scope.originModal		= false;
			//Notification.message(notification);
		});
	}
	
	$scope.userGroup = function(id, name) {
		$scope.groupName			= name;
		$scope.editor.user_group_id	= id;
	}
	
	
	$scope.userEdit = function(data) {
		$scope.editorEdit		= angular.copy(data.User);
		
		//Remove irrelevant data
		$scope.editorEdit.password = $scope.editorEdit.salt = $scope.editorEdit.created = $scope.editorEdit.modified = $scope.editorEdit.email_verified = $scope.editorEdit.active = $scope.editorEdit.ip_address = $scope.editorEdit.created = $scope.editorEdit.modified = '';

		$scope.editorEdit.group	= angular.copy(data.UserGroup);
		$scope.originModal		= true;
	}
	
	//Find a way not to dupe this function!!
	$scope.userEditGroup = function(id, name) {
		$scope.editorEdit.group.name	= name;
		$scope.editorEdit.user_group_id	= id;
	}
	
	$scope.originModalClose = function() {
		$scope.originModal	= false;
	}
	
	$scope.originModalOptions = {
		backdropClick:	false,
		backdropFade:	true
	}
	
	$scope.loadUsers();
*/
}
