<?php
	$xml	= XML::fromArray(array('response'=>$ad_units));
	echo $xml->asXML();