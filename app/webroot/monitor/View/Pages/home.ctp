<div class="" ng-app="monitorApp.services">
	<h2><?php echo __('Monitor'); ?></h2>
	<h3><?php //echo $monitor; ?></h3>
	<h1>Top Events</h1>
	<script src="../monitor/webroot/js/controller.js"></script>
	<script src="../monitor/webroot/js/services.js"></script>
	<div id="workspaceCtrl" ng:controller="workspaceCtrl" class="">
	<div id="totals">
		<div class="total-titles">
				<span class="title-total-events"><?php echo __('Total Events');?></span>&nbsp
				<span class="title-unique-events"><?php echo __('Unique Events');?></span>
			</div>
			<span class="item-total-events">{{monitor_totals.totalEvents}}</span>&nbsp
			<span class="item-unique-events">{{monitor_totals.uniqueEvents}}</span>
	</div>
	<div id="list">
		<table>
			<tr>
				<td><?php echo __('Event Category');?></td>
				<td><?php echo __('Total Events');?></td>
				<td><?php echo __('Unique Events');?></td>
			</tr>
			<tr ng-repeat="item in monitor_list">
				<td>{{item.category}}</td>
				<td>{{item.totalEvents}}</td>
				<td>{{item.uniqueEvents}}</td>
			</tr>
		</table>
	</div>
</div>
<!--
<hr>

<button id="authorize-button" style="visibility: hidden">Authorize</button>

<ul id="ga-table">
  <li><p class="c1">Table Id:</p>
      <input id="table-id" class="c2" value="ga:26782196"></input>
      <p class="note">Format is ga:xxx where xxx is your profile ID.</p></li>
  <li><p class="c1">Start Date:</p>
      <input id="start-date" class="c2"></input></li>
  <li><p class="c1">End Date:</p>
      <input id="end-date" class="c2"></input></li>
</ul>
<!--button id="run-demo-button" style="visibility: hidden">Run Demo</button-->
<!--
<hr>
<div id="output">Loading, one sec....</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
//var $j				= jQuery.noConflict();
$(function() {
	makeApiCall();
});
</script>
<script src="../monitor/webroot/js/api/auth_util.js"></script>
<script src="../monitor/webroot/js/api/core_reporting_api_v3_reference.js"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>-->