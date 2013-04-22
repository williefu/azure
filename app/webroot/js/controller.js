'use strict';

var $j = jQuery.noConflict();

$j(function() {
	$j('#originBar-help').click(function() {
		$j('body').chardinJs('start');
	});
});

var notification = {
		'title': 	'',
		'content':	''
	};

var originGeneral = function($scope, $filter, Origin, Notification) {
	$scope.notification = {};
	
	$scope.back = function() {
		window.history.back();
	}

	$scope.formSubmit = function(form) {
		$j('#'+form).submit();
		//$j('#UserEditUserForm').submit();
	}
	
	$scope.$on('notificationBroadcast', function() {
		$scope.notification.type 		= Notification.type;
		$scope.notification.icon 		= Notification.icon;
		$scope.notification.content 	= Notification.content;
		$j('#origin-notification').fadeIn().delay(2700).fadeOut();
	});   
	
	$scope._arrayLoop = function(array, index, direction) {
		var i 		= (index)? index: 0;
		var size	= array.length;
		
		switch(direction) {
			case 'next':
				i 	= (i+1)%size;
				break;
			case 'prev':
				i 	= (i-1)%size;
				if(i < 0) {
					i = (size-1);
				}
				break;
		}	
			
		return i;
	}
	
	
	
	
	$scope.notificationOpen = function(content, type, icon) {
		$scope.notification.type 		= (type)? 'originNotification-'+type: 'originNotification-default';
		$scope.notification.icon 		= (icon)? '/img/'+icon: '/img/notification-26x26.png';
		$scope.notification.content 	= content;

		$j('#origin-notification').fadeIn().delay(2700).fadeOut();
	}
	
	$scope.notificationClose = function() {
		$j('#origin-notification').hide();
	}
	
	$scope.createAlias = function(model) {
		return $filter('createAlias')(model);
	}
	
	$scope.toggleStatus = function(model, id, status) {
		$scope.status = {
			id:		id,
			model:	model,
			route:	'toggleStatus'
		};
		
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				//notification.content 	= 'Template disabled';
				break;
			case 'enable':
				$scope.status.status	= 1;
				//notification.content 	= 'Template enabled';
				break;
		}
		return $scope.status;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	$scope.listRefresh = function(data) {
		$scope.originModal = false;
		return data;
	}
	
	$scope.originModalClose = function() {
		$scope.originModal = false;
	}
	
	$scope.originModalOpen = function() {
		$scope.originModal = true;
	}
	
	$scope.originModalOptions = {
		backdropClick:	false,
		backdropFade: 	true
	}
	
} 

var originAllUsers = function($scope, $filter, Origin, Notification) {
	var notification = {
		'title': 	'',
		'content':	''
	};
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
			Notification.message(notification);
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
			Notification.message(notification);
		});
	}
	
	$scope.userGroup = function(id, name) {
		$scope.groupName			= name;
		$scope.editor.user_group_id	= id;
	}
	
	$scope.userStatus = function(id, status) {
		notification.title 		= 'Updated';
		$scope.status.id		= id;
		
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				notification.content 	= 'User disabled';
				break;
			case 'enable':
				$scope.status.status	= 1;
				notification.content 	= 'User enabled';
				break;
		}
		
		$scope.status.route			= 'dashboardUserStatus';
		Origin.post($scope.status).then(function() {
			$scope.loadUsers();
			Notification.message(notification);
		});
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
}

var originUser = function($scope, Origin, Notification) {
	var notification = {
		'title': 	'',
		'content':	''
	};
	$scope.password 	= {};
	
	$scope.groupName	= 'Select Group';
	
	$scope.userGroup = function(id, name) {
		$scope.groupName			= name;
		$scope.editor.user_group_id	= id;
	}
	
	$scope.userPasswordUpdate = function() {
		$scope.password.route			= 'dashboardUserPasswordUpdate';
		Origin.post($scope.password).then(function(response) {
			if(response.oldpassword) {
				notification.title 		= 'Error';
				notification.content 	= 'Old password incorrect';
			} else if(response.password) {
				notification.title 		= 'Error';
				notification.content 	= response.password[0];
			} else if(response === ''){
				notification.title 		= 'Updated';
				notification.content 	= 'Password updated';
			}
			
			Notification.message(notification);
			$scope.password = {};
		});
	}
}
/*

var originAllGroups = function($scope, Users) {
	$scope.originGroups = {};
	Users.get('allGroups').then(function(response) {
		$scope.originGroups	= response;
		$scope.sortBy		= 'UserGroup.id';
	});
}
*/



var originSystems = function($scope, $filter, Origin, Notification) {
	$scope.editor				= {};
	
	$scope.groupAlias = function() {
		$scope.editor.alias_name	= $filter('createAlias')($scope.editor.name);
	}
	
	$scope.groupCreate = function() {
		if($scope.editor.name) {
			$scope.editor.route					= 'dashboardGroupAdd';
			$scope.editor.allowRegistration		= 1;
			
			Origin.post($scope.editor).then(function(response) {
				$editor	= {};
				//$scope.componentRefresh(response);
			});
		}
	}
}


/**
* List Controller
**/
//angular.module('listApp', ['originApp.services', 'originApp.directives', 'originApp.filters']);


//'creatorApp.services', 'creatorApp.directives'
var originAds = function($scope, $filter, Origin) {
	
	$scope.originCreator 		= {};
	$scope.originCreator.editor	= {};
	$scope.originCreator.form	= {};
	$scope.originCreator.index 	= 0;
	
	Origin.get('templates').then(function(response) {
		$scope.originCreator.templates	= response;
		$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
		
		Origin.get('ads').then(function(response) {
			$scope.originCreator.list 	= response.origin_ads;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	});
	
	$scope.adCreate = function() {
		$scope.originCreator.editor.route			= 'adCreate';
		$scope.originCreator.editor.config			= $scope.originCreator.form.OriginTemplate.config;
		$scope.originCreator.editor.config.template	= $scope.originCreator.form.OriginTemplate.content.alias;
		Origin.post($scope.originCreator.editor).then(function(response) {
			window.location		= response;
		});
/*
		$scope.originCreator.editor.type_alias 	= $scope.originCreator.form.OriginTemplate.content.alias;
		$scope.originCreator.editor.type_id		= $scope.originCreator.form.OriginTemplate.id;
		Origin.post($scope.originCreator.editor).then(function(response) {
			window.location		= response;
		});
*/
	}
	
	$scope.adCreateModalClose = function() {
		$scope.adCreateModal 	= false;
	}
	
	$scope.adCreateModalOpen = function() {
		$scope.adCreateModal	= true;
	}
	
	$scope.adCreateModalOptions = {
		backdropClick:	false,
		backdropFade:	true
	}
	
	$scope.adTemplateSelect = function(type) {
		//$scope.originCreator.templates.length
	
		switch(type) {
			case 'next':
				$scope.originCreator.index	= $scope._arrayLoop($scope.originCreator.templates, $scope.originCreator.index, 'next');
				//console.log($scope.originCreator.index);
				//$scope.originCreator.form		= $scope.originCreator.templates[1];
				break;
			case 'prev':
				$scope.originCreator.index	= $scope._arrayLoop($scope.originCreator.templates, $scope.originCreator.index, 'prev');
				//console.log($scope.originCreator.index);
				break;
		}
		
		$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
	}
}