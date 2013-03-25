<link rel="stylesheet" href="../monitor/webroot/css/pickadate/pickadate.01.default.css">
<!--script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		console.log('hey');
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, legend: 'bottom', title: 'Company Performance'});
      }
    </script-->
	
<div class="" ng-app="monitorApp.services">
	<h2><?php echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	


	<div id="workspaceCtrl" ng:controller="workspaceCtrl" class="">
	<div id="visits">
	
	<div id="chart_div"></div>
	<div chart></div>
	<!--img width='600' height='200' src='../monitor/View/Json/chart'-->
	<!--img width='600' height='200' src='{{monitor_url}}'-->
	
	<!--img src="https://chart.googleapis.com/chart?cht=p3&chs=250x100&chd=t:60,40&chl=Hello|World"/-->
	<?php //echo $imgHelper->img(monitor_url);?>
	
	</div>
	<div id="filter" style="float:right;">
	       			
            <!--input value="August 14" data-value="1988/08/14" id="picker_simple" class="datepicker" type="text" /-->
		<form name="form_search" ng-submit="">
<input value="{{monitor_filter.startDate}}" data-value="" id="datepicker_from" class="datepicker" type="text" style="width:180px;"></input>		
		<input value="{{monitor_filter.endDate}}" id="datepicker_to" class="datepicker" type="text" ng-model="monitorObj.end" style="width:180px;"></input>
			<input type="text" name="category" ng-model="monitorObj.category" id="category" placeholder="<?php echo __('Event Category Title');?>" style=""/><br/>
			<input type="text"  name="date" id="date" ng-model="monitorObj.date"  style="width:180px;" value="testing" ></input>
			<input id="start_date" name="start_date" data-ng-model="start_date" type="hidden"></input>
			<input id="end_date" name="end_date" data-ng-model="end_date" type="hidden"></input>
			<a href="#" class="" ng-click="proceed()"><?php echo __('SEARCH');?></a>
			<!--input type="submit" ng-click="proceed()" value="search"/-->
		</form>
	</div>
	<div id="totals">
		<table>
			<tr>
				<td><?php echo __('Total Events');?></td>
				<td><?php echo __('Unique Events');?></td>
			</tr>
			<tr>
				<td>{{monitor_totals.totalEvents}}</td>
				<td>{{monitor_totals.uniqueEvents}}</td>
			</tr>
		</table>
		
	</div>

	<div id="list">
		<table>
			<tr>
				<td><?php echo __('Event Category');?></td>
				<td><?php echo __('Total Events');?></td>
				<td><?php echo __('Unique Events');?></td>
			</tr>
			<tr ng-repeat="item in monitor_list">
				<td>{{item.category}}</td>
				<td>{{item.totalEvents}}</td>
				<td>{{item.uniqueEvents}}</td>
			</tr>
		</table>
	</div>
</div>

<script src="../monitor/webroot/js/pickadate/pickadate.js"></script>
<script src="https://www.google.com/jsapi"></script>
	<script src="../monitor/webroot/js/controller.js"></script>
	<script src="../monitor/webroot/js/directive.js"></script>
	<script src="../monitor/webroot/js/services.js"></script>
	
	
	<script type="text/javascript">
	$( '#picker_simple' ).pickadate({
		
	})
	
		//var picker_from = $( '#datepicker_from' ).pickadate({
		$( '#datepicker_from' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				/*var fromDate = createDateArray( this.getDate( 'yyyy-mm-dd' ) )
				picker_to.data( 'pickadate' ).setDateLimit( fromDate )*/
				$( '#start_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			},
			onStart: function() {

				var calendar = this;
				//calendar.setDate(2020, 2, 15);
				//calendar.clear();
			}
		})
		
		var picker_to = $( '#datepicker_to' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				/*var toDate = createDateArray( this.getDate( 'yyyy-mm-dd' ) )
				picker_from.data( 'pickadate' ).setDateLimit( toDate, 1 )*/
				$( '#end_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			}
		})
		
		function createDateArray( date ) {
			return date.split( '-' ).map(function( value ) { return +value })
		}
/*
	    $('[type=date], .datepicker').pickadate({
			//formatSubmit: 'dd/mm/yyyy',
			monthSelector: true,
			yearSelector: true,
			onSelect: function() {
				console.log( 'Selected: ' + this.getDate() )
			},
			onStart: function() {
				/*var calendar1 = $('.input_01');
				var calendar2 = $('.input_02');
				console.log(calendar1);
				console.log(calendar2);*/
				//var calendar = this;
				/*calendar1.setDate(2020, 2, 13);
				calendar2.setDate(2020, 2, 16);*/
				//calendar.setDate(2020, 2, 14);
			//}
		//})
		/*$('.datepicker2').pickadate({
			//formatSubmit: 'dd/mm/yyyy',
			monthSelector: true,
			yearSelector: true,
			onSelect: function() {
				console.log( 'Selected: ' + this.getDate() )
			},
			onStart: function() {
				var calendar = this;
				calendar.setDate(2020, 2, 15);
			}
		})*/
    </script>