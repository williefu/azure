<!--link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
<script>document.write("<base href=\"" + document.location + "\" />");</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.2/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
  <script src="https://raw.github.com/angular-ui/angular-ui/master/build/angular-ui.js"></script-->
<div class="">
	<h2><?php //echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	
<div id="workspaceCtrl" ng:controller="monitorCtrl" class="" ng:cloak>

	<div id="visits">
		<div chart></div>
	</div>
	<div id="filters" style="float:right;">
		<form name="test" ng-submit="">
			<input ng-model="monitorObj.start_date" ui-date="{ dateFormat: 'yy-mm-dd' }" ui-date-format="yy-mm-dd" name="datepicker1" type="text" class="input-medium" value="{{monitor_filter.startDate}}" placeholder="">
			<input ng-model="monitorObj.end_date" ui-date="{ dateFormat: 'yy-mm-dd' }" ui-date-format="yy-mm-dd" name="datepicker2" type="text" class="input-medium" value="{{monitor_filter.endDate}}" placeholder="">
			<input type="text" ng-model="monitorObj.category" id="category" name="category" placeholder="<?php echo __('Event Category Title');?>" style=""></input><br/>
			<button ng-click="getData()">Search</button>
			<a ng-href="/administrator/monitor/export/ALL/{{monitor_filter.startDate}}/{{monitor_filter.endDate}}" id="export-monitor" class="" ng-show="monitor_title=='Event Category'">Export</a>
			<a ng-href="/administrator/monitor/export/{{monitorObj.category}}/{{monitor_filter.startDate}}/{{monitor_filter.endDate}}" id="export-monitor" class="" ng-hide="monitor_title=='Event Category'">Export</a>
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
				<td>{{monitor_title}}</td>
				<td><?php echo __('Total Events');?></td>
				<td><?php echo __('Unique Events');?></td>
			</tr>
			<tr ng-repeat="item in listFilter()" ng-show="conditions()">
			<!--tr ng-repeat="item in listFilter()" ng-show="monitor_title=='Event Category';note=='empty'"-->
					<td ng:click="categoryData(item.categoryId,item.category)" style="{{monitor_title=='Event Category' && 'cursor:pointer'}}">{{item.category}}</td>
					<td>{{item.totalEvents}}</td>
					<td>{{item.uniqueEvents}}</td>
			</tr>
			<tr ng-repeat="item in monitor_list" ng-hide="monitor_title=='Event Category'">
					<td> 
						<accordion>
						<accordion-group heading="{{item.event}}  {{item.totalEvents}}  {{item.uniqueEvents}}">
							
							<div ng:repeat="label in item.labels">
								{{label.label}}  {{label.totalEvents}}  {{label.uniqueEvents}}
							</div>
							<div ng-hide="item.labels">
								There is no label data for this event action.
							</div>
						</accordion-group>
						</accordion>
					</td>    
			</tr>
			<tr ng-hide="note=='empty'">
				<td>{{note}}</td>
			</tr>
		</table>
	</div>
</div>
</div>
<script src="https://www.google.com/jsapi"></script>
<?php
	echo $this->Minify->script(array('controllers/monitorController'));
?>

<script type="text/javascript">
		google.setOnLoadCallback(function() {
			//angular.bootstrap(document.body, ['monitorApp']);
		});
		google.load('visualization', '1', {packages: ['corechart']});
</script>
