var originAdController = function($scope, serviceAnalytics, serviceFrequency) {
	$scope.origin_ad		= angular.fromJson(origin_ad);
	$scope.originAd_id		= 'originAd-'+$scope.origin_ad.OriginAd.id;
	$scope.originAd_config	= angular.fromJson($scope.origin_ad.OriginAd.config);
	$scope.originAd_configContent	= angular.fromJson($scope.origin_ad.OriginAd.content);
	$scope.originAd_content	= {};
	$scope.originParams		= (window.name)? angular.fromJson(decodeURIComponent(window.name)): {}; //Retrieve embed code params
	
	/**
	* Cross-domain function wrapper
	*/
	$scope._xd = function(data) {
		XD.postMessage(JSON.stringify(data), $scope.originParams.xdSource);
	}
	
	/**
	* Loads the content based on the current date
	*/
	var currentDate	= new Date();
	
	for(i in $scope.origin_ad.OriginAdSchedule) {
		var startDate	= new Date($scope.origin_ad.OriginAdSchedule[i].start_date),
			endDate		= new Date($scope.origin_ad.OriginAdSchedule[i].end_date),
			date,
			endDate		= endDate.setDate(endDate.getDate() + 1);
		
		if(currentDate >= startDate && currentDate <= endDate) {
			$scope.originAd_content = $scope.origin_ad.OriginSchedule[i];
			date = true;
		}
	}
	
	if(!date) {
		$scope.originAd_content = $scope.origin_ad.OriginAdSchedule[0];
	}
	
	/**
	* Send dimensional data to container unit
	*/
	$scope.init = function() {
		$scope.xdData = {
			auto:		{},
			callback:	'containerInit',
			id:			'originAd-'+$scope.origin_ad.OriginAd.id,
			width: 		$scope.originAd_config.dimensions.Initial[origin_platform].width+'px',
			height:		$scope.originAd_config.dimensions.Initial[origin_platform].height+'px'
		}
		
		switch($scope.originAd_config.template) {
			case 'horizon':
				/**
				* Horizon units are always 100% page width
				*/
				$scope.xdData.width		= '100%';
				//$scope.xdData.autoOpen	= serviceFrequency.check($scope.originAd_id, $scope.originParams.auto);
				$scope.xdDataExpand = {
					callback: 	'toggleExpand',
					id:			'originAd-'+$scope.origin_ad.OriginAd.id,
					action:		'open'
				};
				break;
			case 'nova':
				/**
				* A 'close' case means it's being called from Nova's triggered view. Set it to 100% width/height
				*/
				if(originAd_action === 'close') {
					$scope.xdData.id 		= 'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay'
					$scope.xdData.width		= '100%';
					$scope.xdData.height	= '100%';
					$scope.xdData.autoOpen	= false;
					serviceAnalytics.track('Close');
				} else {
					serviceAnalytics.track('Open');
					//$scope.xdData.autoOpen	= serviceFrequency.check($scope.originAd_id, $scope.originParams.auto);
				}
				
				$scope.xdDataOverlay = {
					callback:	'toggleOverlay',
					action:		originAd_action,
					idInitial:	'originAd-'+$scope.origin_ad.OriginAd.id,
					idTriggered:'originAd-'+$scope.origin_ad.OriginAd.id+'-overlay'
				};
				break;
			default:
				break;
		}
		$scope._xd($scope.xdData);
		
		/**
		* Auto-expand logic
		*/
		if(serviceFrequency.check($scope.originAd_id, $scope.originParams.auto)) {
			switch($scope.originAd_config.template) {
				case 'horizon':
					$scope.toggle();
					break;
				case 'nova':
					if(originAd_action !== 'close') {
						$scope.toggle();
					}
					break;
			}
		}
		
		serviceAnalytics.track('Load');
	}
	
	/**
	* Toggle functionality
	*/
	$scope.toggle = function() {
		//SOME CODE RELATING TO A HOVER INTENT
		var animateObj = angular.copy($scope.originAd_config.animations);
		switch($scope.originAd_config.type) {
			case 'expandable':
			
				//action:		originAd_action, THIS MAY BE THE KEY!!!
			
				var element 	= document.getElementById(animateObj.selector),
					animateTo,
					duration;
					
				//Close unit
				if(element.style.top === animateObj.end+'px') {
					animateTo		= animateObj.start+'px';
					duration		= animateObj.closeDuration/1000;
					
					$scope.xdDataExpand.resizeTo	= $scope.originAd_config.dimensions.Initial[origin_platform].height+'px';
					$scope.xdDataExpand.duration	= animateObj.closeDuration/1000;
					serviceAnalytics.track('Close');
					
				} else {
					animateTo		= animateObj.end+'px';
					duration		= animateObj.openDuration/1000;
					
					$scope.xdDataExpand.resizeTo	= $scope.originAd_config.dimensions.Triggered[origin_platform].height+'px';
					$scope.xdDataExpand.duration	= animateObj.openDuration/1000;
					serviceAnalytics.track('Open');
				}
				$scope._xd($scope.xdDataExpand);
				
				anim(document.getElementById(animateObj.selector), {top:animateTo}, duration, 'ease-out');
				break;
			case 'overlay':
				/**
				* 'action' param determines if an overlay unit should open or close.
				*/
				$scope._xd($scope.xdDataOverlay);
				break;
		}
	}
	
	/**
	* Initialize unit
	*/
	$scope.init();
}