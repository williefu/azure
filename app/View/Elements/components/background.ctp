<div id="editor-background" ng:controller="componentCtrl">
	<form id="editorBackground-form" name="editorBackground-form" class="">
		<input type="hidden" name="uploadDir" value="/assets/creator/{{workspace.ad.OriginAd.id}}/"/>
		<div id="background-upload" class="originUI-upload originUI-icon originUiIcon-upload">
			<span class="originUI-uploadLabel">Upload Background</span>
			<input type="file" name="files[]" id="editorBackground-upload" class="originUI-uploadInput" ng:model="editor.content.upload" fileupload>
		</div>
		<ul id="editorBackground-list">
			<li class="originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" ng:click="backgroundSelect(asset)">
				<a href="javascript:void(0);">{{asset.name}}</a>
			</li>
		</ul>
	</form>
	
	<script type="text/javascript">
		var componentCtrl = function($scope) {
			//var _scope = angular.element($j('#ad-edit')).scope();
			var _scope = $scope.$parent;
			
			$scope.$watch('editor.content.upload', function(newValue, oldValue) {
				if(newValue) {
					_scope.editor.content.image = newValue;
					generateRender();
				}
			}, true);
			
			$scope.backgroundSelect = function(model) {
				$scope.$parent.editor.content.image = '/assets/creator/'+_scope.workspace.ad.OriginAd.id+'/'+model.name;
				generateRender();
			}
			
			function generateRender() {
				_scope.editor.config.height	= _scope.editor.config.width = '100%';
				_scope.editor.render		= '<img src="'+$scope.$parent.editor.content.image+'" class="background"/>';
				_scope.editor.order 		= '-1';
			}
		}
	</script>
</div>