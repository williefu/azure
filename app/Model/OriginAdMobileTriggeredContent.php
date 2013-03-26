<?php

App::uses('Origin', 'Model');

class OriginAdMobileTriggeredContent extends AppModel {
	public $belongsTo	= 'OriginAdSchedule';
}