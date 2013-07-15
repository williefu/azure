'use strict';

angular.module('originApp.monitorModule.directives', [])
	.directive('chart', function() {
        return {
          restrict: 'A',
          link: function(scope, element, attr) {
			scope.$watch('monitor_visits', function() {
				var data = new google.visualization.DataTable();
				data.addColumn('date', 'Dates');
				data.addColumn('number', 'Visits');

				var rowArray = [];
				angular.forEach(scope.monitor_visits, function(item) {
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
							   'width':1013,
							   'height':160};
				

				// Instantiate and draw our chart, passing in some options.
				//var chart = new google.visualization.PieChart($element[0]);
				var chart = new google.visualization.ComboChart(element[0]);
				chart.draw(data, options);
			});
		}
      }			
    })
	.directive('pickadate', function() {
		return {
		  restrict: 'E',
		  template: '<div><input id="startDate" ng-model="monitorObj.start_date" type="text" class="datepicker"></input><input id="endDate" ng-model="monitorObj.end_date" type="text" class="datepicker"></input></div>',
		  replace: true,
		  link: function(scope, element, attr) {
			scope.$watch('monitor_filter', function() {
				if(scope.monitorObj.start_date) {
					var start_input = $j('#startDate').pickadate({
						format: 'mmm dd, yyyy',
						onStart: function() {
							var date1 = new Date(scope.monitorObj.start_date);
							this.set('select', [date1.getFullYear(), date1.getMonth(), date1.getDate()+1 ]);
						}
					});
					var end_input = $j('#endDate').pickadate({
						format: 'mmm dd, yyyy',
						onStart: function() {
							var date2 = new Date(scope.monitorObj.end_date);
							this.set('select', [date2.getFullYear(), date2.getMonth(), date2.getDate()+1 ]);
						}
					});
					
					var start_picker = start_input.pickadate('picker');		
					var end_picker = end_input.pickadate('picker');
					
					start_picker.on('set', function(event) {
						if(event.select) {
							scope.monitorObj.start_date = start_picker.get('select', 'yyyy-mm-dd');
							end_picker.set('min', start_picker.get('select'))
						}
					});
					end_picker.on('set', function(event) {
						if(event.select) {
							scope.monitorObj.end_date = end_picker.get('select', 'yyyy-mm-dd');
							start_picker.set('max', end_picker.get('select'))
						}
					});
				}
			});
		  }	
		}       		
    });