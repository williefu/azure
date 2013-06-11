<div id="actionsWorkspace" ng:controller="actionsCtrl" ng:cloak>
	<div id="visits">
		<div chart></div>
	</div>
	<input type="hidden" ng-model="actionsObj.categoryId" id="categoryId" name="categoryId" ng-init="actionsObj.categoryId='<?php echo $category; ?>'"></input>
	<?php echo $this->element('form_filters');?>
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
