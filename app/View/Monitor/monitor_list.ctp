<div id="monitorWorkspace" ng:controller="monitorCtrl" ng:cloak>
	<div id="visits">
		<div chart></div>
	</div>
	<?php echo $this->element('form_monitor');?>
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
			<tr ng-repeat="item in listFilter()">
					<td><a ng-href='/administrator/analytics/actions/{{item.categoryId}}'>{{item.category}}</a></td>
					<td>{{item.totalEvents}}</td>
					<td>{{item.uniqueEvents}}</td>
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
		});
		google.load('visualization', '1', {packages: ['corechart']});
</script>