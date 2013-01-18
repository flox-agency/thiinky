<?php 
	class ThiinkyType extends AppModel {
		public $name = 'ThiinkyType';

		public $hasMany = array(
	 		'Thiinkies' => array(
	 			'className' => 'Thiinky',
	 			'foreignKey' => 'thiinky_type_id'
	 			)
	 		);
	}

?>