<?php

 class UsersController extends AppController {
 	public $name = 'Users';
 	public $uses = array('User','Thiinky');
 	public $scaffold;

 	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add'); // Letting users register themselves
	}

 	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect(array('action'=>'index')));
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}
 	
 	public function index($username = null)
 	{
 		if(!$username) $username = $this->Auth->user('username');

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
 											'conditions' => array('OR' => array('User.username LIKE' => '%'.$term.'%',
 																				'User.name LIKE' => '%'.$term.'%')
 																)
 											));

 		$this->set('u',$u);

 	}

 	public function timeline($username)
 	{
 		$this->layout = 'ajax';
 		$since_id = $this->request->query['since_id'];
 		$nbSent = null;
 		$nbReceived = null;

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
 		$this->set('user',$user);

 		if($thiinkies) {
 			$nbSent = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.sender_id'=>$user['User']['id'])));
 			$nbReceived = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.recipient_id'=>$user['User']['id'])));
 		
 		}
 		$this->set('nbSent',$nbSent);
 		$this->set('nbReceived',$nbReceived);
 	}

 	public function popup($username)
 	{
 		$this->layout = 'ajax';

 		$this->User->recursive = -1;
 		$user = $this->User->findByUsername($username);
 		$this->set('user',$user);

 		$nbSent = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.sender_id'=>$user['User']['id'])));
 		$nbReceived = $this->Thiinky->find('count',array('conditions'=>array('Thiinky.recipient_id'=>$user['User']['id'])));
 		
 		$this->set('nbSent',$nbSent);
 		$this->set('nbReceived',$nbReceived);
 	}

 	public function search($count=10,$q=null)
 	{
 		$q = $this->request->query['q'];
 		$count = $this->request->query['count'];
 		$this->layout = 'ajax';

 		$this->User->recursive = -1;
 		$u = $this->User->find('all',array('fields' => array('User.id','User.name','User.username','User.avatar_normal'),
 											'conditions' => array('OR' => array('User.username LIKE' => '%'.$q.'%',
 																				'User.name LIKE' => '%'.$q.'%')
 																),
 											'limit' => $count
 											));
 		$this->set('u',$u);
 		$this->set('q',$q);
 		
 	}

 }

?>