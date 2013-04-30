'use strict';

var $j = jQuery.noConflict();

$j(function() {
	$j('#originBar-help').click(function() {
		$j('body').chardinJs('start');
	});
	
	
	var fixed = $j('#origin-bar');
	
    $j(window).scroll(function () {
        if($j(this).scrollTop() > 0) {
            fixed.addClass('originUI-fixed');
        } else {
            fixed.removeClass('originUI-fixed');
        }
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
