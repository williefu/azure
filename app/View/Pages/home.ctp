<div ng:controller="homeController">
	<div id="homepage-showcase">
		<div style="width: 200%;">
			<a href="/demo/Origin/{{ad.OriginAd.id}}" class="showcase-ad originUI-borderColor" target="_blank" ng:repeat="ad in ads|limitTo:10|filter:{OriginAd.showcase:1}">
				<img class="showcase-adImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
				<span class="showcase-adTitle originUI-bgColor">{{ad.OriginAd.name}}</span>
			</a>
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