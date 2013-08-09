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
		</form>
		<div class="dropdown btn">
		  <div id="collectiondropDown" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
			<span>Export</span>
			<b class="caret"></b>
		  </div>

		  <ul id="exportOptions" class="dropdown-menu originUI-bgColorSecondary originUI-borderColor" role="menu" aria-labelledby="dLabel">
			<li class="dropdown-item">
				<a ng-href="/administrator/monitor/exportxls{{exp_url}}"  id="export-monitor_xls">Excel (XLSX)</a>
			</li>
			<li class="dropdown-item">
				<a ng-href="/administrator/monitor/exportpdf{{exp_url}}"  id="export-monitor_pdf">PDF</a>
			</li>
		  </ul>
		</div>
		<button ng-click="getAccount()" enable>Get Profile ID</button>
</div>

<?php
	echo $this->Minify->css(array('monitor/pickadate/default','monitor/pickadate/default.date','monitor/pickadate/default.time'));
	echo $this->Minify->script(array('monitor/monitorServices','monitor/monitorDirectives','monitor/pickadate/picker','monitor/pickadate/picker.date','monitor/pickadate/picker.time','monitor/pickadate/legacy'));
?>