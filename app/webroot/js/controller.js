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
	
	
	$scope.notificationClose = function() {
		$j('#origin-notification').hide();
	}
	
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


var originComponents	= function($scope, $filter, Origin, Notification) {
	$scope.editor							= {};
	$scope.editor.content 					= {};
	$scope.editor.config					= {};
	$scope.modalEditor						= {};
	$scope.status							= {};
	$scope.originComponents					= {};
	$scope.originComponents.confirmDelete	= false;
	
	$scope.groups = [
		{
			name:	'Embed',
			alias:	'embed'
		},
		{
			name:	'CTA',
			alias:	'cta'
		},
		{
			name:	'Media',
			alias:	'media'
		},
		{
			name:	'Link',
			alias:	'link'
		},
		{
			name:	'Video',
			alias:	'video'
		},
	];
	//$scope.editor.config.group				= $scope.groups[0].alias;
	
	
	$scope.originComponents.modalOptions = {
		backdropClick:	false,
		backdropFade: 	true
	}
	
	$scope.componentGroup = function(data, model) {
		console.log(data);
		console.log($scope['editor'].config.group);
	}
	
	$scope.componentLoad = function() {		
		Origin.get('components').then(function(response) {
			$scope.componentRefresh(response);
		});
	}
	
	$scope.componentRefresh = function(data) {
		$scope.originComponents	= data;
		$scope.componentModal 	= false;
	}
	
	$scope.componentAlias = function() {
		$scope.editor.alias	= $filter('createAlias')($scope.editor.name);
	}
	
	/*
	$scope.componentCreate = function() {
		$scope.componentModal 	= true;
	}
	*/
	
/*
	$scope.componentDelete = function() {
		$scope.editor.route	= 'componentDelete';
		
		List.post($scope.editor).then(function(response) {
			$scope.componentRefresh(response);
		});
	}
*/
	
	$scope.componentEdit = function(data) {
		$scope.modalEditor		= data.OriginComponent;
		$scope.componentModal	= true;
	}
	
	$scope.componentModalClose = function() {
		$scope.componentModal					= false;
		$scope.modalEditor						= {};
		$scope.originComponents.confirmDelete	= false;
	}
	
	$scope.componentSave = function(type) {
		switch(type) {
			case 'create':
				break;
			case 'update':
				$scope.editor		= angular.copy($scope.modalEditor);
				break;
		}
		
		$scope.editor.route			= 'componentSave';
		Origin.post($scope.editor).then(function(response) {
			$scope.editor = {};
			$scope.componentRefresh(response);
		});
	}
	
	$scope.componentStatus = function(id, status) {
		notification.title 		= 'Updated';
		$scope.status.id		= id;
		switch(status) {
			case 'disable':
				$scope.status.status	= 0;
				notification.content 	= 'Component disabled';
				break;
			case 'enable':
				$scope.status.status	= 1;
				notification.content 	= 'Component enabled';
				break;
		}
		
		$scope.status.route			= 'componentStatus';
		Origin.post($scope.status).then(function(response) {
			$scope.componentRefresh(response);
			Notification.message(notification);
		});
	}
	
	$scope.componentLoad();
}

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


var originTemplates	= function($scope, $filter, Origin, Notification) {
	$scope.originTemplates					= {};
	$scope.originTemplates.confirmDelete	= false;
	$scope.originTemplates.editor			= {};
	$scope.originTemplates.editor.content 	= {};
	$scope.originTemplates.editor.config	= {};
	$scope.originTemplates.modalOptions 	= {
		backdropClick:	false,
		backdropFade: 	true
	}
	
	Origin.get('templates').then(function(response) {
		$scope.templateRefresh(response);
	});
	
	
	$scope.templateRefresh = function(data) {
		$scope.originTemplates	= data;
		$scope.templateModal 	= false;
	}
	
	$scope.templateCreate = function() {
		$scope.templateModal 	= true;
	}
	
	$scope.templateDelete = function() {
		$scope.originTemplates.editor.route	= 'templateDelete';
		
		Origin.post($scope.originTemplates.editor).then(function(response) {
			$scope.templateRefresh(response);
		});
	}
	
	$scope.templateEdit = function(data) {
		$scope.originTemplates.editor	= data.OriginTemplate;
		$scope.templateModal			= true;
	}
	
	$scope.templateModalClose = function() {
		$scope.templateModal					= false;
		$scope.originTemplates.editor			= {};
		$scope.originTemplates.confirmDelete	= false;
	}
	
	$scope.templateSave = function() {
		if($scope.originTemplates.editor.name) {
			//$scope.originTemplates.editor.content.alias	= $filter('createAlias')($scope.originTemplates.editor.name);
			$scope.originTemplates.editor.route			= 'templateSave';
			Origin.post($scope.originTemplates.editor).then(function(response) {
				$scope.templateRefresh(response);
			});
		}
	}
	
	$scope.templateUnchanged = function() {
		return angular.equals(undefined, $scope.originTemplates.editor);
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
		$scope.originCreator.editor.route		= 'adCreate';
		$scope.originCreator.editor.type_alias 	= $scope.originCreator.form.OriginTemplate.content.alias;
		$scope.originCreator.editor.type_id		= $scope.originCreator.form.OriginTemplate.id;
		Origin.post($scope.originCreator.editor).then(function(response) {
			window.location		= response;
		});
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