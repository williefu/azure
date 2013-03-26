<?php

App::uses('Origin', 'Model');

class OriginAdDesktopTriggeredContent extends AppModel {
	public $belongsTo	= 'OriginAdSchedule';
}