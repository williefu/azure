<?php

App::uses('Origin', 'Model');

class OriginAd extends AppModel {
	public $actsAs 		= array('Containable');
	public $hasMany		= 'OriginAdSchedule';
}