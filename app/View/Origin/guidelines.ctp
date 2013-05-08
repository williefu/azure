<script type="text/javascript">
	var _template	= '<?php echo json_encode($specsheet);?>';
</script>
<div id="guidelines" ng:controller="guidelinesController">
	<h2 class="originUI-header">{{template.name}}</h2>
	
	
	<div class="originUI-bgColor originUI-shadow originUI-tileContent">
		<div id="guidelines-summary" class="originUI-borderColorSecondary">
			<div class="guidelines-left">
				<h2 id="guidelines-summaryHeader" class="originUI-borderColor guidelines-header">Summary</h2>
				<p id="guidelines-summaryDescription" class="">{{template.content.description}}</p>
			</div>
			<img id="guidelines-summaryStoryboard" class="guidelines-right" ng:src="{{template.content.file_storyboard}}"/>
		</div>
		<div id="guidelines-dimensions" class="originUI-borderColorSecondary">
			<div class="guidelines-left">
				<h2 id="guidelines-dimensionsHeader" class="originUI-borderColor guidelines-header">Guidelines</h2>
				<ul id="guidelines-dimensionsPlatforms" class="originUI-list">
					<li id="guidelines-dimensions{{platform.name}}" class="guidelines-dimensionsIcon" ng:show="template.config.dimensions.Initial[platform.name]" ng:repeat="platform in platforms" ng:click="dimensionsShow(platform.name)">{{platform.name}}</li>
				</ul>
			</div>
			
			<div class="guidelines-right">
				<ul class="originUI-list">
					<li>Initial: {{template.config.dimensions.Initial[platformShow].width}} x {{template.config.dimensions.Initial[platformShow].height}}</li>
					<li>Triggered: {{template.config.dimensions.Triggered[platformShow].width}} x {{template.config.dimensions.Triggered[platformShow].height}}</li>
				</ul>
			</div>
			<div id="" ng:repeat="platform in platforms" ng:show="platform.name == platformShow">
				
			
<!--
				<div class="guidelines-dimensionsInitial" style="width:{{template.config.dimensions.Initial[platform.name].width}}px;height:{{template.config.dimensions.Initial[platform.name].height}}px">
					<span class="guidelines-dimensionsMeta">{{template.config.dimensions.Initial[platform.name].width}} x {{template.config.dimensions.Initial[platform.name].height}}</span>
				</div>
				<img class="guidelines-dimensionsImage" ng:src="http://placehold.it/{{template.config.dimensions.Triggered[platform.name].width}}x{{template.config.dimensions.Triggered[platform.name].height}}"/>
-->
			</div>
			
		</div>
		<div id="guidelines-components">
			<h2 id="guidelines-componentsHeader" class="originUI-borderColor guidelines-header">Features</h2>
			<div ng:repeat="component in components" class="originUI-bgColorSecondary originUI-borderColor inline guidelines-component" tooltip-placement="bottom" tooltip="{{component.OriginComponent.content.description}}">
				{{component.OriginComponent.name}}
				<img ng:src="{{component.OriginComponent.config.img_icon}}"/>
			</div>
		</div>
	</div>

	
<!--
	<div id="guidelines-dimensions" class="originUI-tileRight originUI-shadow originUI-bgColor" data-intro="Ad unit dimension guidelines. Click on the Desktop, Tablet or Mobile icons to switch views." data-position="bottom">
		<h3 id="guidelines-dimensionsHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">{{platformShow}} Ad Dimensions</h3>
		<ul id="guidelines-dimensionsPlatforms" class="originUI-list">
			<li id="guidelines-dimensions{{platform.name}}" class="guidelines-dimensionsIcon" ng:show="template.config.dimensions.Initial[platform.name]" ng:repeat="platform in platforms" ng:click="dimensionsShow(platform.name)">{{platform.name}}</li>
		</ul>
		<div class="originUI-tileContent">
			<div id="" ng:repeat="platform in platforms" ng:show="platform.name == platformShow" ng:cloak>
				<div class="guidelines-dimensionsInitial" style="width:{{template.config.dimensions.Initial[platform.name].width}}px;height:{{template.config.dimensions.Initial[platform.name].height}}px">
					<span class="guidelines-dimensionsMeta">{{template.config.dimensions.Initial[platform.name].width}} x {{template.config.dimensions.Initial[platform.name].height}}</span>
				</div>
				<img class="guidelines-dimensionsImage" ng:src="http://placehold.it/{{template.config.dimensions.Triggered[platform.name].width}}x{{template.config.dimensions.Triggered[platform.name].height}}"/>
			</div>
		</div>
	</div>
</div>
-->


<?php
	echo $this->Minify->script(array('controllers/guidelinesController'));


	//print_r($specsheet);


	/*
	
	
	<img src="http://placehold.it/<?php echo $specsheet['config']->dimensions->Initial->Desktop->width;?>x<?php echo $specsheet['config']->dimensions->Initial->Desktop->height;?>"/>
	
	
	
	Array
(
    [OriginTemplate] => Array
        (
            [id] => 1
            [name] => Sliver
            [alias] => horizon
            [content] => stdClass Object
                (
                    [alias] => horizon
                    [description] => This out-of-page unit appears above the site. Triggering the expansion will pushdown the site to reveal the contents.
                    [file_storyboard] => /assets/templates/horizon.png
                    [file_specs] => 
                    [file_logo] => 
                )

            [config] => stdClass Object
                (
                    [type] => expandable
                    [dimensions] => stdClass Object
                        (
                            [Initial] => stdClass Object
                                (
                                    [Desktop] => stdClass Object
                                        (
                                            [width] => 1500
                                            [height] => 66
                                        )

                                )

                            [Triggered] => stdClass Object
                                (
                                    [Desktop] => stdClass Object
                                        (
                                            [width] => 1500
                                            [height] => 415
                                        )

                                )

                        )

                    [animations] => stdClass Object
                        (
                            [start] => 0
                            [end] => 415
                            [selector] => initial
                            [openDuration] => 500
                            [closeDuration] => 400
                        )

                )

            [create_date] => 2013-04-20 23:35:45
            [modify_date] => 2013-04-23 16:59:46
            [create_by] => 1
            [modify_by] => 1
            [status] => 1
        )

)
	
	*/