<?php
App::uses('AppModel', 'Model');

class SharingObject extends AppModel {

	public $actsAs = array('Containable');

	public $validate = array(
		'organisation_uuid' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				'message' => 'Please provide a valid UUID'
			),
		),
		'sharing_group_uuid' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				'message' => 'Please provide a valid UUID'
			),
		)
	);

	public $belongsTo = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'foreign_key',
			'conditions' => array('SharingObject.object_type' => 'event'),
			'fields' => '',
			'order' => ''
		),
		'Attribute' => array(
			'className' => 'Attribute',
			'foreignKey' => 'foreign_key',
			'conditions' => array('SharingObject.object_type' => 'attribute'),
			'fields' => '',
			'order' => ''
		),
		'Organisation' => array(
			'className' => 'Organisation',
			'foreignKey' => 'organisation_uuid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SharingGroup' => array(
			'className' => 'SharingGroup',
			'foreignKey' => 'sharing_group_id',
			'fields' => '',
			'order' => ''
		)
	);

}