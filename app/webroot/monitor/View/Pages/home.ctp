<div class="" ng-app="monitorApp.services">
	<h2><?php echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	<script src="../monitor/webroot/js/controller.js"></script>
	<script src="../monitor/webroot/js/services.js"></script>
	<script src="../monitor/webroot/js/pickadate/pickadate.legacy.js"></script>
	
	<link rel="stylesheet" href="../monitor/webroot/css/pickadate/pickadate.01.default.css">
	
	<div id="workspaceCtrl" ng:controller="workspaceCtrl" class="">
	<div id="filter" style="float:right;">
		<form id="form_search" ng-hide="hide">
			<input type="text" name="category" data-ng-model="category" id="monitor.category" placeholder="<?php echo __('Event Category Title');?>" style=""/><br/>
			<input id="datepicker_from" name="datepicker_from" data-ng-model="date" class="datepicker" value="{{monitor_filter.startDate}}" type="text" style="width:180px;"></input>
			<input id="datepicker_to" name="datepicker_to" data-ng-model="test" class="datepicker" value="{{monitor_filter.endDate}}" type="text" style="width:180px;"></input>
			<input id="start_date" name="start_date" data-ng-model="start_date" type="hidden"></input>
			<input id="end_date" name="end_date" data-ng-model="end_date" type="hidden"></input>
			<a href="#" class="" ng:click="proceed()"><?php echo __('SEARCH');?></a>
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

	<script type="text/javascript">
	
		var picker_from = $( '#datepicker_from' ).pickadate({
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