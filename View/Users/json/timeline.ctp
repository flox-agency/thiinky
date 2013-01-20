<?php 
	$items_html = '';
	$since_id = '';
	$profile_stats = array();

	if(!empty($thiinkies)) {
		$since_id = $thiinkies[0]['Thiinky']['id'];
		foreach ($thiinkies as $thiinky) {
			$items_html .= $this->element('list_item',array('thiinky'=>$thiinky));
		}

		$profile_stats[1]['user_id'] = $user['User']['id'];
		$profile_stats[1]['stat'] = 'sent';
		$profile_stats[1]['html'] = $this->element('stats.sent',array('nbSent'=>$nbSent));

		$profile_stats[0]['user_id'] = $user['User']['id'];
		$profile_stats[0]['stat'] = 'received';
		$profile_stats[0]['html'] = $this->element('stats.received',array('nbReceived'=>$nbReceived));

	}

	$response = array('profile_stats'=>$profile_stats,'items_html'=>$items_html,'since_id'=>$since_id);
?>
<?php echo json_encode($response)?>