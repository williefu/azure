<div id="origin-notification" class="originUI-bgColor originUI-shadow none" ng:class="notification.type">
	<img id="originNotification-icon" ng:src="{{notification.icon}}">
	<span id="originNotification-content">{{notification.content}}</span>
	<a href="javascript:void(0)" id="originNotification-close" ng:click="notificationClose()">close</a>
</div>