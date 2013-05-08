
	
<div id="homepage-container" class="wrapper" ng:controller="homeController">
	<img id="homepage-cover" src="http://placehold.it/1000x200"/>
<!--
	<div id="homepage-showcase">
		<div style="width: 200%;">
			<a href="/demo/Origin/{{ad.OriginAd.id}}" class="showcase-ad originUI-borderColor" target="_blank" ng:repeat="ad in ads|limitTo:10|filter:{OriginAd.showcase:1}">
				<img class="showcase-adImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
				<span class="showcase-adTitle originUI-bgColor">{{ad.OriginAd.name}}</span>
			</a>
		</div>
	</div>
-->

	<div id="homepage-products" class="inline">
		<div class="product-item originUI-bgColor originUI-shadow originUI-borderColor" ng:repeat="product in products|filter:{OriginTemplate.status: '1'}">
			<div class="product-meta originUI-gradient">
				<div class="product-metaName originUI-borderColor">{{product.OriginTemplate.name}}</div>
				<div class="product-metaDescription">{{product.OriginTemplate.content.description}}</div>
			</div>
			<img ng:src="{{product.OriginTemplate.content.file_storyboard}}" class="product-image"/>
			<a href="/guidelines/{{product.OriginTemplate.alias}}" class="product-link"></a>
			<!-- {{ads|filter:product.OriginTemplate.alias}} -->
		</div>
	</div><!--
	--><div id="homepage-about" class="inline">
	
		<a href="/demo/Origin/{{ad.OriginAd.id}}" class="showcase-ad" target="_blank" ng:repeat="ad in ads|limitTo:10|filter:{OriginAd.showcase:1}">
			<img class="showcase-adImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
			<span class="showcase-adTitle originUI-bgColor">{{ad.OriginAd.name}}</span>
		</a>
	
	</div>
</div>


<?php
	echo $this->Minify->script(array('controllers/homeController'));
	echo $this->Minify->css(array('home'));