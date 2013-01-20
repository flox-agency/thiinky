<?php 
	$item_html = '';
	$thiinky_id = false;
	$message = (!empty($thiinky)) ? 'Votre thiinky a bien été envoyé' : 'Votre thiinky n\'a pu être envoyé';

	if(!empty($thiinky)) {
		$thiinky_id = $thiinky['Thiinky']['id'];
		$item_html .= $this->element('list_item',array('thiinky'=>$thiinky));
	}

	$stat_html = $this->element('stats.sent',array('nbSent'=>$nbSent));
?>
{"profile_stats":[{"user_id":"1","stat":"sent","html":<?php echo json_encode($stat_html); ?>}],"item_html":<?php echo json_encode($item_html);?>,"thiinky_id":"<?php echo $thiinky_id; ?>","message":<?php echo json_encode($message);?>}