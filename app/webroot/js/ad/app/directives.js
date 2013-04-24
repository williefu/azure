'use strict';

angular.module('originAd.directives', [])
	.directive('content', function($compile){
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				//Construct styles object
				var styles = {
					'position':	'absolute',
					'width':	scope.content.config.width,
					'height':	scope.content.config.height,
					'top':		scope.content.config.top,
					'left':		scope.content.config.left,
					'zIndex':	scope.content.order
				},
				render	= angular.element(decodeURIComponent(scope.content.render.replace(/\+/g, ' '))).css(styles);
				element.append(render);
				$compile(render)(scope);
			}
		}
	});