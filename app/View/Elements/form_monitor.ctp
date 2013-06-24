<div id="filters" style="float:right;">
		<form name="test" ng-submit="">
			<pickadate></pickadate>
			<input type="text" ng-model="monitorObj.category" id="category" name="category" placeholder="<?php echo __('Event Category Title');?>"></input><br/>
			<button ng-click="getData()" enable>Search</button>
			<a ng-href="/administrator/monitor/export/ALL/{{monitorObj.startDate}}/{{monitorObj.endDate}}" id="export-monitor" class="" ng-show="monitor_title=='Event Category'">Export</a>
			<a ng-href="/administrator/monitor/export/{{monitorObj.category}}/{{monitorObj.startDate}}/{{monitorObj.endDate}}" id="export-monitor" class="" ng-hide="monitor_title=='Event Category'">Export</a><br/>
		</form>
</div>
<?php
	echo $this->Minify->css(array('monitor/pickadate/default','monitor/pickadate/default.date','monitor/pickadate/default.time'));
	echo $this->Minify->script(array('monitor/pickadate/picker','monitor/pickadate/picker.date','monitor/pickadate/picker.time','monitor/pickadate/legacy'));
?>