<?php 
	$items_html = '';
	$since_id = false;

	if(!empty($thiinkies)) {
		$since_id = $thiinkies[0]['Thiinky']['id'];
		foreach ($thiinkies as $thiinky) {
			$items_html .= $this->element('list_item',array('thiinky'=>$thiinky));
		}
	}
?>
{"items_html" : <?php echo json_encode($items_html)?>,"since_id":<?php echo $since_id; ?>}