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
			<!--a ng-href="/administrator/monitor/export/ALL/{{monitorObj.start_date}}/{{monitorObj.end_date}}/0" id="export-monitor" class="" ng-hide="monitorObj.category">Export</a-->
			<!--a ng-href="/administrator/monitor/export/{{monitorObj.category}}/{{monitorObj.start_date}}/{{monitorObj.end_date}}/{{exp_template}}" id="export-monitor" class="" ng-show="monitorObj.category">Export</a><br/-->
		</form>
		<div class="dropdown btn">
		  <div id="collectiondropDown" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
			<span>{{ selectedItem }}</span>
			<b class="caret"></b>
		  </div>

		  <ul id="exportOptions" class="dropdown-menu originUI-bgColorSecondary originUI-borderColor" role="menu" aria-labelledby="dLabel">
			<li class="dropdown-item">
				<a ng-href="/administrator/monitor/exportXls/ALL/{{monitorObj.start_date}}/{{monitorObj.end_date}}/0"  id="export-monitor" ng-hide="monitorObj.category">Excel (XLSX)</a>
				<a ng-href="/administrator/monitor/exportXls/ALL/{{monitorObj.category}}/{{monitorObj.start_date}}/{{monitorObj.end_date}}/{{exp_template}}"  id="export-monitor" ng-show="monitorObj.category">Excel (XLSX)</a>
			</li>
			<li class="dropdown-item">
				<a ng-href="/administrator/monitor/exportPdf/ALL/{{monitorObj.start_date}}/{{monitorObj.end_date}}/0"  id="export-monitor" ng-hide="monitorObj.category">PDF</a>
				<a ng-href="/administrator/monitor/exportPdf/ALL/{{monitorObj.category}}/{{monitorObj.start_date}}/{{monitorObj.end_date}}/{{exp_template}}" id="export-monitor" ng-show="monitorObj.category">PDF</a>
			</li>
		  </ul>
		</div>
</div>

<?php
	echo $this->Minify->css(array('monitor/pickadate/default','monitor/pickadate/default.date','monitor/pickadate/default.time'));
	echo $this->Minify->script(array('monitor/pickadate/picker','monitor/pickadate/picker.date','monitor/pickadate/picker.time','monitor/pickadate/legacy'));
?>