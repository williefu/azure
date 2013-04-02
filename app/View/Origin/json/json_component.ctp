<?php
	foreach($origin_components as $key=>&$origin_component) {
		$origin_component['OriginComponent']['config']	= json_decode($origin_component['OriginComponent']['config']);
		$origin_component['OriginComponent']['content']	= json_decode($origin_component['OriginComponent']['content']);
	}
	echo json_encode($origin_components);