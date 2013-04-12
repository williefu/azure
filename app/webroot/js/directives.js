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
	.directive('content', function() {
		return {
			restrict: 'E',
			scope: {
				ngModel: '='
			},
			link: function(scope, element, attrs) {
				//Prep CSS
				var css = {
					'height':	scope.ngModel.config.height,
					'width':	scope.ngModel.config.width,
					'left':		scope.ngModel.config.left,
					'top':		scope.ngModel.config.top,
					'zIndex':	scope.ngModel.order
				};
				
				//Prep render
				var render = scope.ngModel.render.replace('<%=style%>', '');
				
				//Compile config into inline styles
				element.css(css).html(render);
				
				//Make it draggable
				element.draggable({
					containment: $j('#creator-panel-workspace'),
					iframeFix: true,
					snap: true,
					snapTolerance: 5,
					stop: function(event, ui) {
						$j('#save-wrapper').fadeIn(300);
						
						
						//console.log(scope.ngModel);
						
						
						//construct config dataset
						scope.ngModel.config = {
							top: 	Math.round(ui.position.top)+'px',
							left: 	Math.round(ui.position.left)+'px',
							width: 	Math.round(ui.helper.width())+'px',
							height: Math.round(ui.helper.height())+'px'
						}
						
					
						/*
						
						//scope.originEditor.content_config	= config;
						scope.originServices('content_config', {id: scope.content.id, oid: origin_id, config: config});
						*/
					}
				});
				
				//Make it resizable
				element.resizable({
					containment: $j('#creator-panel-workspace'),
					handles: 'all',
					stop: function(event, ui) {
						$j('#save-wrapper').fadeIn(300);
						/*
						var config = {
							top: 	Math.round(ui.position.top)+'px',
							left: 	Math.round(ui.position.left)+'px',
							width: 	Math.round(ui.helper.width())+'px',
							height: Math.round(ui.helper.height())+'px',
							zIndex: ui.helper.css('z-index')
						}
						scope.originServices('content_config', {id: scope.content.id, oid: origin_id, config: config});
						*/
					}
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
	})
	.directive('panelUpload', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				$j(document).bind('drop dragover', function (e) {
					e.preventDefault();
				});
			
				element.fileupload({
					dataType: 	'json',
					dropZone: 	$j('#creator-panel-left'),
					url: 		'/administrator/Origin/upload',
					add: function(e, data) {
						data.submit();
						//console.log(data);	
					},
					stop: function(e, data) {
						scope.updateLibrary();
						scope.creatorToggle('library');
					}
				});
			}
		}
	})
	.directive('sortable', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.sortable({
					'axis':		'y',
					'handle':	'.content-handle',
					'update': function(event, ui) {
						//console.log(ui);
						//console.log(scope.workspace.display);
					}
				});
				element.disableSelection();
			}
		}
	})
	.directive('chart', function(Monitor) {
        return {
          restrict: 'A',
          link: function($scope, $element, $attr) {
			//Load Monitor data
			Monitor.get('visits').then(function(data) {
				
				$scope.monitor_visits = data['visits'];
				var data = new google.visualization.DataTable();
				data.addColumn('date', 'Dates');
				data.addColumn('number', 'Visits');

				var rowArray = [];
				angular.forEach($scope.monitor_visits, function(item) {
					var from_date = item.date.toString();
					var YYYY = from_date.substring(0, 4);
					var MM = from_date.substring(4, 6);
					var DD = from_date.substring(6);
					var visitsDate = new Date(parseInt(YYYY, 10), parseInt(MM, 10) - 1, parseInt(DD, 10)); 
					rowArray.push([visitsDate, item.visits-0]);
				});
				
				data.addRows( rowArray );
				// Set chart options
			    var options = {'title':'Audience Overview',
							   'width':1923,
							   'height':160};
				

				// Instantiate and draw our chart, passing in some options.
				//var chart = new google.visualization.PieChart($element[0]);
				var chart = new google.visualization.ComboChart($element[0]);
				chart.draw(data, options);
			});
			
		}
      }
					
    });