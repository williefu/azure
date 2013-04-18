<div ng:controller="homeController">
	<div id="homepage-showcase">
		<div style="width: 200%;">
			<img src="http://placehold.it/300x150"/>
			<img src="http://placehold.it/300x150"/>
			<img src="http://placehold.it/300x150"/>
			<img src="http://placehold.it/300x150"/>
			<img src="http://placehold.it/300x150"/>
			<img src="http://placehold.it/300x150"/>
		</div>
	</div>
	
	
	<div id="homepage-container" class="wrapper">		
		<div id="homepage-featured">
			<img src="http://placehold.it/1000x200"/>
		</div>
	
		<div id="homepage-content">
			<h3>Products</h3>
			<ul>
				<li ng:repeat="product in products">{{product.OriginTemplate.name}}</li>
			</ul>
		</div>
	</div>
</div>




<?php
	echo $this->Minify->script(array('controllers/homeController'));
	echo $this->Minify->css(array('home'));