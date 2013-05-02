<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
	<div id="header"></div>
	<div id="wrapper">
		<div id="" class="adPlacement" ng:bind-html-unsafe="embed">
			<img src="http://placehold.it/970x66"/>
		</div>
		<div id="content"></div>
	</div>
</div>
<?
	echo $this->Minify->css(array('demo/craveonline'));