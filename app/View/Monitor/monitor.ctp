<div class="" ng-app="monitorApp.services">
	<h2><?php echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	
<div id="workspaceCtrl" ng:controller="workspaceCtrl" class="">
	<div id="visits">
		<div chart></div>
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
			<a href="#" class="" ng-click="export()"><?php echo __('EXPORT');?></a>
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
			<tr ng-repeat="index in monitor_totals">
				<td>{{index}}</td>
				<!--td>{{test.totalEvents}}</td>
				<td>{{test.uniqueEvents}}</td-->
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
			<tr ng:repeat="item in monitor_list|filter:monitorObj.category">
				<td>{{item.category}}</td>
				<td>{{item.totalEvents}}</td>
				<td>{{item.uniqueEvents}}</td>
			</tr>
		</table>
	</div>
</div>
</div>
<script src="https://www.google.com/jsapi"></script>
<?php
	echo $this->Minify->css(array('monitor/pickadate/pickadate.01.default'));
	echo $this->Minify->script(array('monitor/controller','monitor/services','monitor/directives','monitor/pickadate/pickadate'));
?>

<script type="text/javascript">
		jQuery( '#datepicker_from' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				jQuery( '#start_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			},
			onStart: function() {
				var calendar = this;
			}
		})
		
		var picker_to = jQuery( '#datepicker_to' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				jQuery( '#end_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			}
		})
		
		function createDateArray( date ) {
			return date.split( '-' ).map(function( value ) { return +value })
		}

</script>