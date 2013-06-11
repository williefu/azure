<div id="filters" style="float:right;">
		<form name="test" ng-submit="">
			<!--input ng-model="monitorObj.start_date" ui-date="{ dateFormat: 'yy-mm-dd' }" ui-date-format="yy-mm-dd" name="datepicker1" type="text" class="input-medium" value="{{monitor_filter.startDate}}" placeholder="">
			<input ng-model="monitorObj.end_date" ui-date="{ dateFormat: 'yy-mm-dd' }" ui-date-format="yy-mm-dd" name="datepicker2" type="text" class="input-medium" value="{{monitor_filter.endDate}}" placeholder=""-->
			<input type="text" ng-model="monitorObj.category" id="category" name="category" placeholder="<?php echo __('Event Category Title');?>"></input><br/>
			<button ng-click="getData()">Search</button>
			<a ng-href="/administrator/monitor/export/ALL/{{monitor_filter.startDate}}/{{monitor_filter.endDate}}" id="export-monitor" class="" ng-show="monitor_title=='Event Category'">Export</a>
			<a ng-href="/administrator/monitor/export/{{monitorObj.category}}/{{monitor_filter.startDate}}/{{monitor_filter.endDate}}" id="export-monitor" class="" ng-hide="monitor_title=='Event Category'">Export</a><br/>
		</form>
</div>