<?php
	$num_results = count($u);
	$query = $q;
	$users = array();

	foreach ($u as $user) {
		$users[] = array('id'=>$user['User']['id'],
						'name'=>$user['User']['name'],
						'username'=>$user['User']['username'],
						'avatar_normal'=>$user['User']['avatar_normal'],
						'label'=>'<img src="'.$user['User']['avatar_normal'].'">',
						'value'=>$user['User']['username']
						);
	}

	$response = array('num_results'=>$num_results,'query'=>$query,'users'=>$users);

	echo json_encode($response);
?>