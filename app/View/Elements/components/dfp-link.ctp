<div id="editor-dfp-link" ng:controller="componentCtrl">
	<ul class="originUI-list">
		<li>
			<label>URL</label>
			<div class="originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.content.link" placeholder="http://"/>
			</div>
		</li>
		<li>
			<div class="inline">Open link on</div>
			<div id="editorLink-type" class="inline">
				<div class="originUI-switch">
				    <input type="checkbox" name="editorLinkTypeSwitch" class="originUI-switchInput" id="editorLinkTypeSwitch" ng:model="editor.content.event">
				    <label class="originUI-switchLabel" for="editorLinkTypeSwitch">
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
		</li>
	</ul>
	
	<script type="text/javascript">
		var componentCtrl = function($scope) {
			var toggleEvent,
				url;
			
			if(!$scope.editor.content.event) {
				$scope.editor.content.event = true;
			}
		
			var _scope = angular.element($j('#ad-edit')).scope();
			
				_scope.$watch('editor.content', function() {
					url		= ($scope.editor.content.link)? $scope.editor.content.link: '';
				
					switch($scope.editor.content.event) {
						case false:
							toggleEvent 	= 'ng:mouseover="link()"';
							break;
						case true:
							//toggleEvent 	= 'ng:click="toggle()"';
							toggleEvent		= '';
							break;
					}
					
					if(!/^https?:\/\//.test(url)) {
						url = 'http://' + url;
					}
					
					_scope.editor.render	= '<a href="'+url+'" target="_blank" class="dfp-link" '+toggleEvent+'></a>';
				}, true);
		}
	</script>
</div>