<?php

App::uses('Origin', 'Model');

class OriginAdTabletTriggeredContent extends AppModel {
	public $belongsTo	= 'OriginAdSchedule';
}