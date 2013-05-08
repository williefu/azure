<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
	<?php echo $this->element('bar');?>
	<div id="originDemo-wrapper">
		<!-- <div id="originDemo-leaderboard" class="adPlacement" ng:bind-html-unsafe="embed" ng:click="test()"> -->
		<div id="originDemo-leaderboard" class="">
			<img src="http://placehold.it/970x66"/ ng:click="bindEmbed($event)" ng:show="!embed">
			<div class="adPlacement" ng:bind-html-unsafe="embed"></div>
		</div>
	
		<div id="originDemoContent-center" class="originUI-borderColor">
			<img src="http://placehold.it/970x250"/>
		</div>
		<div id="originDemoContent-wrapper" class="originUI-bgColor">		
			<div id="originDemoContent-left" class="inline">
				<img src="http://placehold.it/645x100"/>
				<img src="http://placehold.it/205x100"/><!--
				--><img src="http://placehold.it/205x100"/><!--
				--><img src="http://placehold.it/205x100"/>
			</div><!--
			--><div id="originDemoContent-right" class="inline">
					<div class="adPlacement">
						<img src="http://placehold.it/300x600"/>
					</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('footer');?>
</div>
<?
	echo $this->Minify->css(array('origin', 'demo/originDemo'));