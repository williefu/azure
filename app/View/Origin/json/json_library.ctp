<?php
	$assets			= "{$_SERVER['DOCUMENT_ROOT']}/app/webroot/assets/creator/{$originAd_id}/";
	$ignore			= array('cgi-bin', '.', '..', '._');
	$json			= array();
	$directorySize	= '';
	$directory		= new RecursiveDirectoryIterator($assets);
	$i=0;
	foreach(new RecursiveIteratorIterator($directory) as $filepath=>$fileObj) {
		if(!in_array($fileObj->getFilename(), $ignore) and substr($fileObj->getFilename(), 0, 1) != '.') {
			//array_push($json['files'], $fileObj->getFilename());
			list($width, $height)		= getimagesize($fileObj);
			$json['files'][$i]['name']	= $fileObj->getFilename();
			$json['files'][$i]['type']	= pathinfo($filepath, PATHINFO_EXTENSION);
			$json['files'][$i]['width']	= $width;
			$json['files'][$i]['height']= $height;
			$directorySize += $fileObj->getSize();
			$i++;
		}
		//echo pathinfo($filepath, PATHINFO_EXTENSION);
	}
	
	$json['totalSize']	= $directorySize/1000;
	echo json_encode($json);
	//print_r($json);
?>