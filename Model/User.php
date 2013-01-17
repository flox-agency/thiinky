<?php 
	class User extends AppModel {
		public $name = 'User';

		public $hasMany = array(
	 		'SendThiinkies' => array(
	 			'className' => 'Thiinky',
	 			'foreignKey' => 'sender_id'
	 			),
	 		'ReceivedThiinkies' => array(
	 			'className' => 'Thiinky',
	 			'foreignKey' => 'recipient_id'
	 			)
	 		);

	}

?>