<?php

App::uses('Origin', 'Model');

class OriginAdSchedule extends AppModel {
	//public $belongsTo	= 'OriginAd';
	public $hasMany		= array('OriginAdDesktopInitialContent', 'OriginAdDesktopTriggeredContent', 'OriginAdMobileInitialContent', 'OriginAdMobileTriggeredContent', 'OriginAdTabletInitialContent', 'OriginAdTabletTriggeredContent');
}