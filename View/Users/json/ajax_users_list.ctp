[<?php
	$i=0;
	foreach ($u as $key => $user) {
	 	$i++;
	 	echo '{"label":"'.$user['User']['username'].'","value":"'.$user['User']['username'].'"}';
	 	echo ($i==count($u)) ? '' : ',';
	 } 
?>]