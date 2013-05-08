<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
<script>document.write("<base href=\"" + document.location + "\" />");</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.2/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
  <script src="https://raw.github.com/angular-ui/angular-ui/master/build/angular-ui.js"></script>
<div class="">
	<h2><?php echo __('Top Events'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1></h1>
	
<div id="workspaceCtrl" ng:controller="monitorCtrl" class="">

	<div id="visits">
		<div chart></div>
	</div>
	<div id="filter" style="float:right;">
		<form name="test" ng-submit="">
			<input ng-model="monitorObj.start_date" ui-date="{ dateFormat: 'yy-mm-dd' }" ui-date-format="yy-mm-dd" name="datepicker1" type="text" class="input-medium" value="{{monitor_filter.startDate}}" placeholder="">
			<input ng-model="monitorObj.end_date" ui-date="{ dateFormat: 'yy-mm-dd' }" ui-date-format="yy-mm-dd" name="datepicker2" type="text" class="input-medium" value="{{monitor_filter.endDate}}" placeholder="">
			<input type="text" name="category" ng-model="monitorObj.category" id="category" placeholder="<?php echo __('Event Category Title');?>" style=""/><br/>
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
				<td>{{monitor_title}}</td>
				<td><?php echo __('Total Events');?></td>
				<td><?php echo __('Unique Events');?></td>
			</tr>
			 <?php $index = 0;?>
			<tr ng:repeat="item in monitor_list | orderBy:'totalEvents' | filter:monitorObj.category">
					<td ng:click="categoryData(item.category)" style="{{monitor_title=='Event Category' && 'cursor:pointer'}}" ng-show="monitor_title=='Event Category'">{{item.category}}</td>
					<td ng-show="monitor_title=='Event Category'">{{item.totalEvents}}</td>
					<td ng-show="monitor_title=='Event Category'">{{item.uniqueEvents}}</td>
					<td ng-hide="monitor_title=='Event Category'"> 
						<accordion></accordion>
					</td>    
			</tr>
		</table>
	</div>
</div>
</div>
<script src="https://www.google.com/jsapi"></script>
<?php
	echo $this->Minify->script(array('controllers/monitorController','monitor/bootstrap-collapse'));
?>

<script type="text/javascript">
		google.setOnLoadCallback(function() {
			//angular.bootstrap(document.body, ['monitorApp']);
		});
		google.load('visualization', '1', {packages: ['corechart']});
</script>
