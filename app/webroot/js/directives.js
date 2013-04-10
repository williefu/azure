'use strict';

angular.module('originApp.directives', [])
	.directive('backImg', function() {
		return function(scope, element, attrs) {
			attrs.$observe('backImg', function(value) {
				element.css({
					'background-image': 'url('+value+')'
				});
			});
		}
	})
	.directive('config', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {			
				element.keypress(function(event) {
					if(event.keyCode === 38 || event.keyCode === 40) {
						switch(event.keyCode) {
							case 38:
								var value 	= element.val().split('px')[0],
	                    			value 	= Number(value) + 1;
	                    			element.val(value+'px');
								break;
							case 40:
								var value 	= element.val().split('px')[0],
	                    			value 	= Number(value) - 1;
	                    			element.val(value+'px');
								break;
						}
						scope.$apply(function() {
	                    	scope.editor.config[attrs.config] 	= element.val();
	                    	//Update workspace - SHOULD THIS UPDATE WORKSPACE???
	                    	//console.log(scope.originEditor.content_config[attrs.config]);
	                    	//$j('#workspace #content-'+scope.originEditor.id).css(attrs.config, element.val());
	                    });
					}
				});
				element.blur(function(event) {
					var value 	= element.val(),
	                    value 	= value.match(/[0-9]+/g);
	                element.val(value[0]+'px');
	                
	                scope.$apply(function() {
	                    scope.editor.config[attrs.config] 		= element.val();
	                    //$j('#workspace #content-'+scope.originEditor.id).css(attrs.config, element.val());
	                });              
				});
			}
		}
	})
	.directive('fileupload', function() {
		return {
			restrict: 'A',
			scope: {
				ngModel: '='
      		},
			link: function(scope, element, attrs) {
				element.fileupload({
					dataType: 'json',
					url: '/administrator/Origin/upload',
					add: function(e, data) {
						//console.log($j(e.target).data('path'));
						//console.log(data);
						data.submit();
					},
					done: function(e, data) {					
						scope.$apply(function() {
							scope.ngModel	= data.result[0].path;
						});
					}
				});
			}
		}
	})
	.directive('overscroll', function() {
		//FIX THIS!!
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.overscroll();
			}
		}
	});