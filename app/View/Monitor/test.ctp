<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>Origin - Monitor</title>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/min-css?f=/usermgmt/css/umstyle.css,/css/normalize.css,/css/bootstrap.css,/css/origin.css" />
	<script type="text/javascript" src="/min-js?f=/js/jquery.js,/js/jquery.ui.widget.js,/js/jquery.fileupload.js,/js/angularjs.js,/js/angularui-bootstrap.js,/js/origin.js,/js/controller.js,/js/services.js,/js/directives.js,/js/filters.js">
	</script>
</head>
<body class="originUI-bgTexture" ng:app="originApp">
	<div id="origin-bar" class="originUI-bgColor">
		<div class="wrapper">
			<a href="/administrator/" id="originBar-logo">Origin</a>
			
			<input type="text" id="originBar-search" ng:model="searchOrigin"/>
			
			<div id="originBar-settings">
				<a href="javascript:void(0);" class="originUI-icon originUiIcon-settings dropdown-toggle">Settings</a>
				<ul class="dropdown-menu originUI-bgColor">
					<li>
						<a href="/administrator/dashboard">Origin Settings</a>
					</li>
					<li>
						<a href="/administrator/editUser/1">Update Profile</a>
					</li>
					<li>
						<a href="/administrator/changePassword">Update Password</a>
					</li>
					<li>
						<a href="/administrator/logout">Logout</a>
					</li>		
				</ul>
			</div>
			<div id="origin-notification" class="originUI-bgColor none">
			<div id="originNotification-icon" class="inline"></div>
			<div id="originNotification-message" class="inline">
				<a href="javascript:void(0)" id="originNotification-close">close</a>
				<div id="originNotification-header">Title</div>
				<div id="originNotification-content">Content has been updated</div>
			</div>
			</div>	
		</div>
	</div>	
	<div id="container" class="wrapper" ng:controller="originGeneral">
	<div class="" ng-app="monitorApp.services">
		<h2>Top Events</h2>
		<h3></h3>
		<h1></h1>
		
		<div id="workspaceCtrl" ng:controller="workspaceCtrl" class="">
			<div id="visits">
				<div chart></div>
			</div>
			<div id="filter" style="float:right;">
							
					<!--input value="August 14" data-value="1988/08/14" id="picker_simple" class="datepicker" type="text" /-->
				<form name="form_search" ng-submit="">
					<input value="{{monitor_filter.startDate}}" data-value="" id="datepicker_from" class="datepicker" type="text" style="width:180px;"></input>		
					<input value="{{monitor_filter.endDate}}" id="datepicker_to" class="datepicker" type="text" ng-model="monitorObj.end" style="width:180px;"></input>
					<input type="text" name="category" ng-model="monitorObj.category" id="category" placeholder="Event Category Title" style=""/><br/>
					<input type="text"  name="date" id="date" ng-model="monitorObj.date"  style="width:180px;" value="testing" ></input>
					<input id="start_date" name="start_date" data-ng-model="start_date" type="hidden"></input>
					<input id="end_date" name="end_date" data-ng-model="end_date" type="hidden"></input>
					<a href="#" class="" ng-click="proceed()">SEARCH</a>
					<!--input type="submit" ng-click="proceed()" value="search"/-->
					<a href="#" class="" ng-click="export()">EXPORT</a>
				</form>
			</div>
			<div id="totals">
				<table>
					<tr>
						<td>Total Events</td>
						<td>Unique Events</td>
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
						<td>Event Category</td>
						<td>Total Events</td>
						<td>Unique Events</td>
					</tr>
					<tr ng-repeat="item in monitor_list">
						<td>{{item.category}}</td>
						<td>{{item.totalEvents}}</td>
						<td>{{item.uniqueEvents}}</td>
					</tr>
				</table>
			</div>
		</div>
		</div>
		<script src="https://www.google.com/jsapi"></script>

		<script type="text/javascript">
			$( '#picker_simple' ).pickadate({
				
			})
			$( '#datepicker_from' ).pickadate({
				format: 'mmm dd, yyyy',
				formatSubmit: 'yyyy-m-d',
				onSelect: function() {
					$( '#start_date' ).val(this.getDate( 'yyyy-mm-dd' ));
				},
				onStart: function() {
					var calendar = this;
				}
			})
			
			var picker_to = $( '#datepicker_to' ).pickadate({
				format: 'mmm dd, yyyy',
				formatSubmit: 'yyyy-m-d',
				onSelect: function() {
					$( '#end_date' ).val(this.getDate( 'yyyy-mm-dd' ));
				}
			})
			
			function createDateArray( date ) {
				return date.split( '-' ).map(function( value ) { return +value })
			}

		</script>
		<link rel="stylesheet" type="text/css" href="/min-css?f=/css/monitor/pickadate/pickadate.01.default.css" />
		<script type="text/javascript" src="/min-js?f=/js/jquery/jquery1.7.1.min.js,/js/jquery/jquery1.8.0.min.js,/js/monitor/controller.js,/js/monitor/services.js,/js/monitor/directives.js,/js/monitor/pickadate/pickadate.js">
		</script>	
	</div>


	<div id="footer">&copy;2013 All Rights Reserved. EVOLVE MEDIA, LLC</div>
</body>
</html>