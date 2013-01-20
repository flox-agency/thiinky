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

 		$thiinky = null;

		$user = $this->Thiinky->Sender->findByUsername($recipients[1]);
		if($user) {
			$data['sender_id'] = $this->Auth->user('id');
			$data['recipient_id'] = $user['Sender']['id'];
			$data['thiinky_type_id'] = 1;

			$res = $this->Thiinky->save($data);
			if($res) {
				$thiinky = $this->Thiinky->findById($res['Thiinky']['id']);
			}
		}

 		$this->set('thiinky',$thiinky);

 		$nbSent = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.sender_id'=>$this->Auth->user('id'))));
 		$this->set('nbSent',$nbSent);

 	}

 }

?>