<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
	<?php echo $this->element('bar');?>
	<div id="originDemo-wrapper">
	
	
		<div id="originDemo-leaderboard" class="adPlacement">
			<img src="http://placehold.it/970x66"/>
		</div>
	
		<div id="originDemoContent-center" class="originUI-borderColor">
			<img src="http://placehold.it/970x300"/>
		</div>
		<div id="originDemoContent-wrapper" class="originUI-bgColor">		
			<div id="originDemoContent-left" class="inline">
				left
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
	echo $this->Minify->css(array('demo/originDemo'));