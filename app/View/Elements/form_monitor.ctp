<div id="monitorHeader" ng-show="monitor_title=='Event Action'">
	<a ng-href="/administrator/analytics">ALL</a>>> Event Category: {{title}}
</div>
</br>
<div id="monitorVisits">
		<div chart></div>
</div>
<div id="monitorFilters" style="float:right;">
		<form name="test" ng-submit="">
			<pickadate></pickadate>
			<input type="text" ng-model="monitorObj.category" id="category" name="category" placeholder="<?php echo __('Event Category Title');?>" style="width:400px;"></input><br/>
			<button ng-click="getData()" enable>Search</button>
			<a ng-href="/administrator/monitor/export/ALL/{{monitorObj.start_date}}/{{monitorObj.end_date}}" id="export-monitor" class="" ng-show="monitor_title=='Event Category'">Export</a>
			<a ng-href="/administrator/monitor/export/{{monitorObj.category}}/{{monitorObj.start_date}}/{{monitorObj.end_date}}" id="export-monitor" class="" ng-hide="monitor_title=='Event Category'">Export</a><br/>
		</form>
</div>

<?php
	echo $this->Minify->css(array('monitor/pickadate/default','monitor/pickadate/default.date','monitor/pickadate/default.time'));
	echo $this->Minify->script(array('monitor/pickadate/picker','monitor/pickadate/picker.date','monitor/pickadate/picker.time','monitor/pickadate/legacy'));
?>