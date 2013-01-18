<?php

 class ThiinkiesController extends AppController {
 	public $name = 'Thiinkies';
 	public $scaffold;

 	public function create()
 	{
 		$this->layout = 'ajax';
 		$tags = $this->request->data['tags'];
 		//$recipients = preg_split("/\s*@/", $tags);
 		preg_match_all("/@([a-z]*)/", $tags, $recipients);

 		$thiinkies = array();

 		foreach ($recipients[1] as $recipient) {
 			$user = $this->Thiinky->Sender->findByUsername($recipient);
 			$data['sender_id'] = 1;
 			$data['recipient_id'] = $user['Sender']['id'];
 			$data['thiinky_type_id'] = 1;

 			$res = $this->Thiinky->save($data);
 			if($res) {
 				$thiinkies[] = $this->Thiinky->findById($res['Thiinky']['id']);
 			}
 		}

 		$this->set('thiinkies',$thiinkies);

 	}

 }

?>