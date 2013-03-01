<?php
/**
 * WebsvcEmcMonitorFixture
 *
 */
class WebsvcEmcMonitorFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'websvc_emc_monitor';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'data' => array('type' => 'binary', 'null' => false, 'default' => null),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => null, 'key' => 'index'),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'start_date' => array('column' => array('start_date', 'end_date'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2013-02-13',
			'end_date' => '2013-02-13'
		),
	);

}
