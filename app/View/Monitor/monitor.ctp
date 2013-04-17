<div class="">
	<h2><?php echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	
<div id="workspaceCtrl" ng:controller="monitorCtrl" class="">

	<div id="visits">
		<div chart></div>
	</div>
	<div id="filter" style="float:right;">
	 
            <!--input value="August 14" data-value="1988/08/14" id="picker_simple" class="datepicker" type="text" /-->
		<!--form name="form_search" ng-submit="">
			<input value="{{monitor_filter.startDate}}" data-value="" id="datepicker_from" class="datepicker" type="text" style="width:180px;" ng-model="monitorObj.start_date"></input>		
			<input value="{{monitor_filter.endDate}}" id="datepicker_to" class="datepicker" type="text" ng-model="monitorObj.end" style="width:180px;" ng-model="monitorObj.end_date"></input>
			<input type="text" name="category" ng-model="monitorObj.category" id="category" placeholder="<?php echo __('Event Category Title');?>" style=""/><br/>
			<input type="text"  name="date" id="date" ng-model="monitorObj.date"  style="width:180px;" value="testing" ></input>
			<input id="start_date" name="start_date" data-ng-model="monitorObj.start_date" type="hidden"/>
			<input id="end_date" name="end_date" data-ng-model="monitorObj.end_date" type="hidden"/>
			<a href="#" class="" ng-click="proceed(monitorObj)"><?php echo __('SEARCH');?></a>
			<!--input type="submit" ng-click="proceed()" value="search"/-->
			<!--a href="#" class="" ng-click="export()"><?php echo __('EXPORT');?></a>
		</form-->
		<form name="test" ng-submit="">
			<input value="{{monitor_filter.startDate}}" id="datepicker_from" name="datepicker_from" class="datepicker" type="text" style="width:180px;"  ng-model="monitorObj.datepicker_from"></input>		
			<!--input name="start_date_submit" id="start_date_submit" class="datepicker" type="hidden" style="width:180px;" ng-model="monitorObj.start_date_submit" value=""></input-->		
			<input value="{{monitor_filter.endDate}}" id="datepicker_to" name="datepicker_to"  class="datepicker" type="text" style="width:180px;" ng-model="monitorObj.datepicker_to"></input>
			<input type="text" name="category" ng-model="monitorObj.category" id="category" placeholder="<?php echo __('Event Category Title');?>" style=""/><br/>
			<input type="text" name="testing" ng-model="monitorObj.testing" id="testing" placeholder="<?php echo __('Test Title');?>" style=""/><br/>
			<button ng-click="getData()">Search</button>
			<button ng-click="exportData()">Export</button>
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
			<tr ng:repeat="item in monitor_list | orderBy:'totalEvents' | filter:category">
				<td ng:click="categoryData(item.category)" style="cursor:pointer">{{item.category}}</td>
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
	echo $this->Minify->script(array('monitor/controller','monitor/pickadate/pickadate'));
?>

<script type="text/javascript">
		google.setOnLoadCallback(function() {
			//angular.bootstrap(document.body, ['monitorApp']);
		});
		google.load('visualization', '1', {packages: ['corechart']});

		jQuery( '#datepicker_from' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			hiddenSuffix: '_submit',
			onSelect: function() {
				//jQuery( '#start_date' ).val(this.getDate( 'yyyy-mm-dd' ));
				//console.log( 'Selected: ' + this.getDate() )
				//jQuery( '#start_date_submit' ).val(this.getDate());
			},
			onStart: function() {
				var calendar = this;
				console.log('start1');
			}
		})
		
		var picker_to = jQuery( '#datepicker_to' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				jQuery( '#end_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			},
			onStart: function() {
				console.log('start2');
			}
		})
		
		function createDateArray( date ) {
			return date.split( '-' ).map(function( value ) { return +value })
		}

</script>
