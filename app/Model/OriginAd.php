<?php

App::uses('Origin', 'Model');

class OriginAd extends AppModel {
	public $hasMany		= 'OriginAdSchedule';
}