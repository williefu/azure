<div id="actionsWorkspace" ng:controller="actionsCtrl" ng:cloak>
	<div id="visits">
		<div chart></div>
	</div>
	<?php echo $this->element('form_monitor');?>
	<input type="hidden" ng-model="monitorObj.category_id" id="categoryId" name="categoryId" ng-init="monitorObj.category_id='<?php echo $actions['category']; ?>'"></input>
	<input type="hidden" ng-model="monitorObj.start_date" id="startDate" name="startDate" ng-init="monitorObj.start_date='<?php echo $actions['startDate']; ?>'"></input>
	<input type="hidden" ng-model="monitorObj.end_date" id="endDate" name="endDate" ng-init="monitorObj.end_date='<?php echo $actions['endDate']; ?>'"></input>
	
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
			<tr ng-repeat="item in monitor_actions">
					<td> 
						<accordion>
						<accordion-group heading="{{item.event}}  {{item.totalEvents}}  {{item.uniqueEvents}}">
							<div ng:repeat="label in item.labels">
								{{label.label}}  {{label.totalEvents}}  {{label.uniqueEvents}}
							</div>
							<div ng-hide="item.labels">
								{{note}}
							</div>
						</accordion-group>
						</accordion>
					</td>    
			</tr>
		</table>
	</div>
</div>
</div>

<script src="https://www.google.com/jsapi"></script>
<?php
	echo $this->Minify->script(array('controllers/actionsController'));
?>

<script type="text/javascript">
		google.setOnLoadCallback(function() {
		});
		google.load('visualization', '1', {packages: ['corechart']});
</script>
