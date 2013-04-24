var originAdController = function($scope, $filter) {
	$scope.origin_ad		= angular.fromJson(origin_ad);
	$scope.originAd_config	= angular.fromJson($scope.origin_ad.OriginAd.config);
	$scope.originAd_content	= {};
	$scope.originParams		= (window.name)? angular.fromJson(decodeURIComponent(window.name)): {}; //Retrieve embed code params
	
	//console.log($scope.originParams);
	
	
	/**
	* Send dimensional data to container unit
	*/
	$scope.xdData = {
		callback:	'containerInit',
		id:			'originAd-'+$scope.origin_ad.OriginAd.id,
		width: 		($scope.originAd_config.template === 'horizon')? '100%': $scope.originAd_config.dimensions.Initial[origin_platform].width+'px',
		height:		$scope.originAd_config.dimensions.Initial[origin_platform].height+'px'
	}
	
	XD.postMessage(JSON.stringify($scope.xdData), $scope.originParams.xdSource);
	
	
	
	/**
	* Loads the content based on the current date
	*/
	var currentDate	= new Date();
	
	for(i in $scope.origin_ad.OriginAdSchedule) {
		var startDate	= new Date($scope.origin_ad.OriginAdSchedule[i].start_date),
			endDate		= new Date($scope.origin_ad.OriginAdSchedule[i].end_date),
			date;
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
	* Toggle functionality
	*/
	$scope.toggle = function() {
		//SOME CODE RELATING TO A HOVER INTENT
		var animateObj = angular.copy($scope.originAd_config.animations);
		switch($scope.originAd_config.type) {
			case 'expandable':
				var element 	= document.getElementById(animateObj.selector),
					animateTo,
					duration;
					
					$scope.xdData = {
						callback: 	'toggle',
						id:			'originAd-'+$scope.origin_ad.OriginAd.id
					}
				
				//Close unit
				if(element.style.top === animateObj.end+'px') {
					animateTo		= animateObj.start+'px';
					duration		= animateObj.closeDuration/1000;
					
					$scope.xdData.resizeTo	= $scope.originAd_config.dimensions.Initial[origin_platform].height+'px';
					$scope.xdData.duration	= animateObj.closeDuration/1000;
					
				} else {
					animateTo		= animateObj.end+'px';
					duration		= animateObj.openDuration/1000;
					
					$scope.xdData.resizeTo	= $scope.originAd_config.dimensions.Triggered[origin_platform].height+'px';
					$scope.xdData.duration	= animateObj.openDuration/1000;
				}
				XD.postMessage(JSON.stringify($scope.xdData), $scope.originParams.xdSource);
				
				anim(document.getElementById(animateObj.selector), {top:animateTo}, duration, 'ease-out');
				break;
			case 'overlay':
				break;
		}
	}
}