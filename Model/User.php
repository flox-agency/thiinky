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

		public function beforeSave($options = array()) {
		    if (isset($this->data[$this->alias]['password'])) {
		        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		    }
		    return true;
		}

	}

?>