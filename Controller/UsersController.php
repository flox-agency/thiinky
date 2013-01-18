<?php

 class UsersController extends AppController {
 	public $name = 'Users';
 	public $uses = array('User','Thiinky');
 	public $scaffold;
 	
 	public function view($username = null)
 	{
 		$this->User->recursive = -1;
 		$user = $this->User->findByUsername($username);
 		$this->set('user',$user);

 		
 		$this->Thiinky->recursive = 0;
 		$thiinkies = $this->Thiinky->find('all',array('conditions' =>array('OR'=>array('Thiinky.sender_id'=>$user['User']['id'],
 																				'Thiinky.recipient_id'=>$user['User']['id']
 																				)),
 														'order' => 'Thiinky.created DESC')
 													);
 		$this->set('thiinkies',$thiinkies);

 		$nbSent = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.sender_id'=>$user['User']['id'])));
 		$this->set('nbSent',$nbSent);

 		$nbReceived = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.recipient_id'=>$user['User']['id'])));
 		$this->set('nbReceived',$nbReceived);

 	}

 	public function ajaxUsersList()
 	{
 		$term = $this->request->query['term'];
 		$this->layout = 'ajax';
 		
 		$this->User->recursive = -1;
 		$u = $this->User->find('all',array('fields' => array('User.username'),
 											'conditions' => array('User.username LIKE' => '%'.$term.'%')));

 		$this->set('u',$u);

 	}

 	public function timeline($username)
 	{
 		$this->layout = 'ajax';
 		$since_id = $this->request->query['since_id'];

 		$this->User->recursive = -1;
 		$user = $this->User->findByUsername($username);

 		$this->Thiinky->recursive = 0;
 		$thiinkies = $this->Thiinky->find('all',array('conditions' =>array('OR'=>array('Thiinky.sender_id'=>$user['User']['id'],
 																				'Thiinky.recipient_id'=>$user['User']['id']
 																				),
 																	'Thiinky.id >'=>$since_id),
 														'order' => 'Thiinky.created DESC')
 													);
 		$this->set('thiinkies',$thiinkies);
 	}
 }

?>