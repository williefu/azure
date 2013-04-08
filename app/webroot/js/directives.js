'use strict';

angular.module('originApp.directives', [])
	.directive('codemirror', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
			
			var editor = CodeMirror.fromTextArea(element[0]);
			
			
			
			
			
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
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.overscroll();
			}
		}
	});