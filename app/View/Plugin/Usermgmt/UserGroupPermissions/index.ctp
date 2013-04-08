<?php
echo $this->Html->script('/usermgmt/js/umupdate');
?>
<div id="system-config" class="originUI-bgColorSecondary originUI-shadow" ng:controller="originSystems">
	<div id="systemConfig-groupAdd" class="originUI-bgColor originUI-shadow">
		<h3 id="groupAdd-header" class="originUiModal-header originUI-borderColor originUI-textColor">Add Group</h3>
		<form id="groupAdd-form">
			<ul class="originUI-list">
				<li>
					<label>Group Name</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" placeholder="Name" ng:model="editor.name" ng:change="groupAlias()"/>
					</div>
				</li>
				<li>
					<label>Group Alias</label>
					<div class="originUI-field">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" placeholder="Alias" ng:model="editor.alias_name"/>
					</div>
				</li>
			</ul>
		</form>
		<div class="originUiModal-footer">
			<div class="originUiModalFooter-center" ng:click="groupCreate()">Create Group</div>
		</div>
	</div>
	<div id="systemConfig-access" class="originUI-bgColor originUI-shadow">
		<h3 id="systemConfig-header" class="originUiModal-header originUI-borderColor originUI-textColor">
			System Access
			<?php echo $this->Form->input("controller",array('type'=>'select','div'=>false,'options'=>$allControllers,'selected'=>$c,'label'=>false,"onchange"=>"window.location='".SITE_URL."administrator/dashboard/access/?c='+(this).value"))?>
		</h3>
		
		
		<?php   if (!empty($controllers)) { ?>
				<input type="hidden" id="BASE_URL" value="<?php echo SITE_URL?>">
				<input type="hidden" id="groups" value="<?php echo $groups?>">
				<table id="systemConfig-table" cellspacing="0" cellpadding="0" width="100%" border="0">
					<thead>
						<tr>
							<th> <?php echo __("Controller");?> </th>
							<th> <?php echo __("Action");?> </th>
							<th> <?php echo __("Permission");?> </th>
							<th> <?php echo __("Operation");?> </th>
						</tr>
					</thead>
					<tbody>
		<?php
				$k=1;
				foreach ($controllers as $key=>$value) {
					if (!empty($value)) {
						for ($i=0; $i<count($value); $i++) {
							if (isset($value[$i])) {
								$action=$value[$i];
								echo $this->Form->create();
								echo $this->Form->hidden('controller',array('id'=>'controller'.$k,'value'=>$key));
								echo $this->Form->hidden('action',array('id'=>'action'.$k,'value'=>$action));
								echo "<tr class='systemConfig-tableRow'>";
								echo "<td class='systemConfig-tableController'>".$key."</td>";
								echo "<td class='systemConfig-tableAction'>".$action."</td>";
								echo "<td class='systemConfig-tablePermission'>";
								foreach ($user_groups as $user_group) {
									$ugname=$user_group['name'];
									$ugname_alias=$user_group['alias_name'];
									if (isset($value[$action][$ugname_alias]) && $value[$action][$ugname_alias]==1) {
										$checked=true;
									} else {
										$checked=false;
									}
									echo $this->Form->input($ugname, array('id'=>$ugname_alias.$k,'type'=>'checkbox','checked'=>$checked));
								}
								echo "</td>";
								echo "<td class='systemConfig-tableOperation'>";
								echo $this->Form->button('Update', array('type'=>'button','id'=>'mybutton123','name'=>$k,'onClick'=>'javascript:update_fields('.$k.');', 'class'=>'umbtn'));
								echo "<div id='updateDiv".$k."' align='right' class='updateDiv'>&nbsp;</div>";
								echo "</td>";
								echo "</tr>";
								echo $this->Form->end();
								$k++;
							}
						}
					}
				} ?>
				</tbody>
			</table>
	<?php   }   ?>
	</div>
</div>