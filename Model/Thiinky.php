<?php 
	class Thiinky extends AppModel {
		public $name = 'Thiinky';

		public $belongsTo = array(
	 		'Sender' => array(
	 			'className' => 'User',
	 			'foreignKey' => 'sender_id'
	 			),
	 		'Recipient' => array(
	 			'className' => 'User',
	 			'foreignKey' => 'recipient_id'
	 			),
	 		'ThiinkyType' => array(
	 			'className' => 'ThiinkyType',
	 			'foreignKey' => 'thiinky_type_id'
	 			)
 		);

	}

?>