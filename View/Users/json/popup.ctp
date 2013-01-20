<?php
	echo $this->element('profile_card',array('user'=>$user,'nbSent'=>$nbSent,'nbReceived'=>$nbReceived)).'<div style="clear:both"></div>';
	//echo json_encode(array('html'=>$html));
	//echo $html
	//echo 'This is just a test !!!!!!';
?>
