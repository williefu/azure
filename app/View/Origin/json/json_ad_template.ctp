<?php
	$origin_template['OriginTemplate']['config']	= json_decode($origin_template['OriginTemplate']['config']);
	$origin_template['OriginTemplate']['content']	= json_decode($origin_template['OriginTemplate']['content']);
	
	echo json_encode($origin_template);