<div id="editor-embed" ng:controller="componentCtrl">
	<textarea ng:model="editor.content.embed"  ui:codemirror></textarea>
	
	<div id="editorEmbed-options">
		<div class="inline">Iframe content</div>
		<div id="editorEmbed-iframe" class="inline">
			<div class="originUI-switch">
			    <input type="checkbox" name="editorEmbedSwitch" class="originUI-switchInput" id="editorEmbedSwitch" ng:model="editor.content.iframe">
			    <label class="originUI-switchLabel" for="editorEmbedSwitch">
			    	<div class="originUI-switchInner">
			    		<div class="originUI-switchActive">
			    			<div class="originUI-switchText">Yes</div>
					    </div>
					    <div class="originUI-switchInactive">
					    	<div class="originUI-switchText">No</div>
						</div>
				    </div>
			    </label>
		    </div> 
		</div>
	</div>
	
	<script>
		var componentCtrl = function($scope) {
			var _scope = angular.element($j('#ad-edit')).scope();
			
				_scope.$watch('editor.content', function() {		
					if($scope.editor.content.iframe !== true) {
						_scope.editor.render = $scope.editor.content.embed;	
					} else {
						_scope.editor.render = '<iframe class="data-embed" src="%cid%" id="embed-%id%" frameborder="0" scrolling="no"></iframe>';
					}
				}, true);
		}
	</script>
</div>