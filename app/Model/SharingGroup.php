<?php
App::uses('AppModel', 'Model');

class SharingGroup extends AppModel {

	public $actsAs = array('Containable');

	public $validate = array(
		'name' => array(
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'A sharing group with this name already exists.'
			),
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'uuid' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				'message' => 'Please provide a valid UUID'
			),
		)
	);

	public $hasAndBelongsToMany = array(
		'Organisation' => array(
			'className' => 'Organisation',
			'joinTable' => 'organisations_sharing_groups',
			'foreignKey' => 'sharing_group_id',
			'associationForeignKey' => 'organisation_id',
		)
	);

	public function beforeValidate($options = array()) {
		parent::beforeValidate();

		if (empty($this->data['SharingGroup']['uuid'])) {
			$this->data['SharingGroup']['uuid'] = String::uuid();
		}

		return true;
	}
}