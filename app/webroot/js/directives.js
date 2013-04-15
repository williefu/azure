'use strict';

angular.module('originApp.directives', [])
	.directive('asset', function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.draggable({
					appendTo: 'body',
					cursorAt: {
						top: 16,
						left: 16 
					},
					helper: 'clone',
					revert: true,
					revertDuration: 0,
					scroll: false,
					start: function(event, ui) {
						//scope.panelSlide('close');
						//element.data('asset', scope.asset);
					}
				});
			}
		}
	})
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
	.directive('workspaceContent', function() {
		return {
			restrict: 'E',
			replace: true,
			template: '<div class="workspace-content" ng:click="creatorCompanionSelect()" ng:dblclick="creatorModalOpen()"></div>',
			scope: {
				ngModel: '='
			},
			link: function(scope, element, attrs) {
			
				//Updates the workspace z-index based on layer panel updates
				scope.$watch('ngModel.order', function(newValue, oldValue) {
					if(newValue !== oldValue) {
						element.css({'zIndex': scope.ngModel.order});
					}
				});
				
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
				element.css(css).html(render).append('<span class="workspace-content-label">'+scope.ngModel.content.title+'</span>').addClass('content-'+scope.ngModel.content.type);
				
				//Make it draggable
				element.draggable({
					containment: $j('#creator-panel-workspace'),
					iframeFix: true,
					snap: true,
					snapTolerance: 7,
					stop: function(event, ui) {
						$j('#save-wrapper, #undo-wrapper').fadeIn(300);
						
						//construct config dataset
						scope.ngModel.config = {
							top: 	Math.round(ui.position.top)+'px',
							left: 	Math.round(ui.position.left)+'px',
							width: 	Math.round(ui.helper.width())+'px',
							height: Math.round(ui.helper.height())+'px'
						}
					}
				});
				
				//Make it resizable
				element.resizable({
					cancel: '.content-image',
					containment: $j('#creator-panel-workspace'),
					handles: 'all',
					stop: function(event, ui) {
						$j('#save-wrapper, #undo-wrapper').fadeIn(300);
						
						//construct config dataset
						scope.ngModel.config = {
							top: 	Math.round(ui.position.top)+'px',
							left: 	Math.round(ui.position.left)+'px',
							width: 	Math.round(ui.helper.width())+'px',
							height: Math.round(ui.helper.height())+'px'
						}
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
	.directive('layerSortable', function() {
		return {
			restrict: 'A',
			replace: false,
			scope: true,
			template: '<li class="content-item" ng:repeat="content in layers|orderBy:\'-order\'" data-id="{{content.id}}"> <span class="content-handle inline">handle</span> <span class="content-label inline">{{content.content.title}}-{{content.id}}</span> <span class="content-edit inline" ng:click="creatorModalOpen(\'content\', \'\', content)">edit</span></li>',
			link: function(scope, element, attr) {
			
				element.sortable({
					'axis':		'y',
					'handle':	'.content-handle',
					'update': function(event, ui) {
						var newOrder	= $j(element).find('.content-item').length - 1;
						
						$j(element).find('.content-item').each(function() {
							//console.log($j(this).data('id'));
							
							for(var i in scope.workspace.ad.OriginAdSchedule[scope.ui.schedule][scope.ui.content]) {
								
								if($j(this).data('id').toString() === scope.workspace.ad.OriginAdSchedule[scope.ui.schedule][scope.ui.content][i].id) {
									scope.$apply(function() {
										scope.workspace.ad.OriginAdSchedule[scope.ui.schedule][scope.ui.content][i].order = newOrder;
									});
									
									newOrder--;
								}
							}
							
						});
					}
				});
			},
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
/*
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
*/
	.directive('workspace', function(){
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				//Accepts drag and drop items from library
				element.droppable({
					accept: '.asset',
					drop: function(event, ui) {
						var id 		= ui.draggable.data('asset'),
							data = {
								content: {
									type: 	scope.library[id].type,
									title:	scope.library[id].name
								},
								config: {
									top: 	Math.floor(event.pageY - $j(this).offset().top - 16)+'px',
									left:	Math.floor(event.pageX - $j(this).offset().left - 16)+'px',
									width: 	scope.library[id].width,
									height: scope.library[id].height
								}
							};
						
						switch(scope.library[id].type) {
							case 'flash':
								//FINISH THIS....
								break;
							default:
								data.render = '<img src="http://'+document.domain+'/assets/creator/'+originAd_id+'/'+scope.library[id].name+'" <%=style%>/>';
								break;
						}
						
						//Send data over to controller to save
						scope.creatorLibrarySave(data);
					}
				});
								
			}	
		}
	});