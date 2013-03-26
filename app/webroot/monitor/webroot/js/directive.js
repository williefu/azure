'use strict';

angular.module('monitorApp.directive',[])
	.directive('chart', function(Workspace) {
        return {
          restrict: 'A',
          link: function($scope, $element, $attr) {
			//Load Monitor data
			Workspace.get('Json/monitorlist').then(function(data) {
				
				$scope.monitor_visits = data['visits'];
				var data = new google.visualization.DataTable();
				data.addColumn('number', 'Dates');
				data.addColumn('number', 'Visits');

				var rowArray = [];
				angular.forEach($scope.monitor_visits, function(item) {
					rowArray.push([item.date, item.visits-0]);
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
	

		google.setOnLoadCallback(function() {
						angular.bootstrap(document.body, ['workspaceApp']);
					});
					google.load('visualization', '1', {packages: ['corechart']});
	