<?php
App::uses('AppModel', 'Model');
/**
 * TestAppsArticle Model
 *
 * @property TestApp $TestApp
 */
class TestAppsArticle extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'image';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'desc' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TestApp' => array(
			'className' => 'TestApp',
			'foreignKey' => 'test_app_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
