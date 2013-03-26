var originAd_id		= $j('#originAd_id').val(),
	template_id;

var creatorController = function($scope, $filter, Origin) {
	$scope.creator 			= {};
	$scope.creator.ad 		= {};
	$scope.creator.editor	= {};
	$scope.creator.template	= {};
	$scope.creator.workspace= {};
	
	Origin.get('ad/'+originAd_id).then(function(response) {
		template_id					= response.OriginAd.config.type_id;
		$scope.creator.ad			= response;
		$scope.creator.workspace	= '';
		
		Origin.get('template/'+template_id).then(function(response) {
			$scope.creator.template		= response.OriginAdTemplate;
			
			console.log($scope.creator);
		});
	});
	
	
	
	
	
/*

	http://local.evolveorigin/administrator/Origin/ad/1.json
	http://local.evolveorigin/administrator/Origin/template/1.json

	
	Origin.get('templates').then(function(response) {
		$scope.originCreator.templates	= response;
		$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
		
		Origin.get('ads').then(function(response) {
			$scope.originCreator.list 	= response.origin_ads;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	});
*/
};