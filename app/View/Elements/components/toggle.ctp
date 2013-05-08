<div id="editor-toggle" ng:controller="componentCtrl">
	<div class="inline">Toggle on</div>
	<div id="editorToggle-type" class="inline">
		<div class="originUI-switch">
		    <input type="checkbox" name="editorToggleTypeSwitch" class="originUI-switchInput" id="editorToggleTypeSwitch" ng:model="editor.content.event" ng:checked="editor.content.event">
		    <label class="originUI-switchLabel" for="editorToggleTypeSwitch">
		    	<div class="originUI-switchInner">
		    		<div class="originUI-switchActive">
		    			<div class="originUI-switchText">Click</div>
				    </div>
				    <div class="originUI-switchInactive">
				    	<div class="originUI-switchText">Hover</div>
					</div>
			    </div>
		    </label>
	    </div> 
	</div>
	
	<script type="text/javascript">
		var componentCtrl = function($scope) {
			var toggleEvent;
			var _scope = angular.element($j('#ad-edit')).scope();

			if(_scope.editor.content.event === undefined) {
				_scope.editor.content.event = true;
			}
			
/*
			if(!$scope.editor.content.event) {
				$scope.editor.content.event = true;
			}
*/
			
				_scope.$watch('editor.content', function() {
					switch($scope.editor.content.event) {
						case false:
							toggleEvent 	= 'ng:mouseover="toggle()"';
							break;
						case true:
							toggleEvent 	= 'ng:click="toggle()"';
							break;
					}
					_scope.editor.render	= '<a href="javascript:void(0)" class="cta toggle" '+toggleEvent+'></a>';
				}, true);
		}
	</script>
</div>