<div class="" ng-app="monitorApp.services">
	<h2><?php echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	
	<div id="workspaceCtrl" ng:controller="workspaceCtrl" class="">
	<div id="visits">
		<div chart></div>
	<!--img width='600' height='200' src='../monitor/View/Json/chart'-->
	<!--img width='600' height='200' src='{{monitor_url}}'-->
	
	<!--img src="https://chart.googleapis.com/chart?cht=p3&chs=250x100&chd=t:60,40&chl=Hello|World"/-->
	
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
</div>
<script src="https://www.google.com/jsapi"></script>
<!--script src="../monitor/webroot/js/pickadate/pickadate.js"></script>
<script src="https://www.google.com/jsapi"></script>
	<script src="../monitor/webroot/js/controller.js"></script>
	<script src="../monitor/webroot/js/directive.js"></script>
	<script src="../monitor/webroot/js/services.js"></script-->
	<script type="text/javascript">
		/*$( '#picker_simple' ).pickadate({
			
		})
		$( '#datepicker_from' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				$( '#start_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			},
			onStart: function() {
				var calendar = this;
			}
		})
		
		var picker_to = $( '#datepicker_to' ).pickadate({
			format: 'mmm dd, yyyy',
			formatSubmit: 'yyyy-m-d',
			onSelect: function() {
				$( '#end_date' ).val(this.getDate( 'yyyy-mm-dd' ));
			}
		})
		
		function createDateArray( date ) {
			return date.split( '-' ).map(function( value ) { return +value })
		}
*/
    </script>
<?php
	echo $this->Minify->css(array('monitor/pickadate/pickadate.01.default'));
	echo $this->Minify->script(array('monitor/controller','monitor/services','monitor/directives','monitor/pickadate/pickadate'));