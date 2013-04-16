<?php
	foreach($origin_sites as $key=>&$origin_site) {
		$origin_site['OriginSite']['config']	= json_decode($origin_site['OriginSite']['config']);
		$origin_site['OriginSite']['content']	= json_decode($origin_site['OriginSite']['content']);
	}
	echo json_encode($origin_sites);
	
	
	//print_r($origin_components);