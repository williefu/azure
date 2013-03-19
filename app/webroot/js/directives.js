'use strict';

angular.module('originApp.directives', [])
	.directive('alias', function() {
		return {
			restrict: 'A',
			scope: {
				alias: '='
			},
			link: function(scope, element, attrs) {
				console.log(scope);
				//scope.originTemplates.editor.alias	= scope.alias;
			}
		}
	})