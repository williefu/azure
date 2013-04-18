<?php
	foreach($origin_components as $key=>&$origin_component) {
		$origin_component['OriginComponent']['config']	= json_decode($origin_component['OriginComponent']['config']);
		$origin_component['OriginComponent']['content']	= json_decode($origin_component['OriginComponent']['content']);
	}
	

	$groups = array();
	$componentGroups = array();
	
	//First grab all groups
	foreach ($origin_components as $component) {
	    $groups[$component['OriginComponent']['group']] = $component['OriginComponent']['group'];
	}
	$groups = array_values($groups);
	
	//Now match it against the data set
	foreach($groups as $group) {
		$componentGroups[$group]	= array();
		foreach($origin_components as $component) {
			if($component['OriginComponent']['group'] === $group) {
				array_push($componentGroups[$group], $component['OriginComponent']);
				//$componentGroups[$group]	= array_push($componentGroups[$group], $origin_component['OriginComponent']);
			}
		}
	}
	
	$componentGroups['raw']	= $origin_components;
	
	//print_r($componentGroups);
	echo json_encode($componentGroups);
	//echo json_encode($origin_components);
	//print_r($origin_components);