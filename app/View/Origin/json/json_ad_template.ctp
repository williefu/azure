<?php
	$origin_template['OriginAdTemplate']['config']	= json_decode($origin_template['OriginAdTemplate']['config']);
	$origin_template['OriginAdTemplate']['content']	= json_decode($origin_template['OriginAdTemplate']['content']);
	
	echo json_encode($origin_template);