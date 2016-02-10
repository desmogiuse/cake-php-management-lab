<?php

  class TasksController extends AppController {
    public $scaffold;
    public $uses = array('Task', 'User');

    function usertasks($user_id) {
      $u = $this->User->findById($user_id);
      $this->set('u', $u['User']);

      $t = $this->Task->find('all', array(
        'conditions'=> array('Task.user_id' => $user_id),
        'order' => array('Task.deadline DESC')
        )
      );

      $this->set('tasks', $t);
    }

    function add(){
      if(!empty($this->request->data)){
        if ($this->Task->save($this->request->data)){
          return $this->redirect('index');
        }
      }

      $users = $this->Task->User->find('list');
      $projects = $this->Task->Project->find('list');
      $tasks = $this->Task->find('list');

      $this->set(compact('users', 'projects', 'tasks'));
    }

    function edit($id){
      if(!empty($this->request->data)){
        if ($this->Task->save($this->request->data)){
          return $this->redirect('index');
        }
      }

      $this->data = $this->Task->findById($id);

      $users = $this->Task->User->find('list');
      $projects = $this->Task->Project->find('list');
      $tasks = $this->Task->find('list');

      $this->set(compact('users', 'projects', 'tasks'));
    }

    function index(){
      $this->Task->Project->recursive = 2;
      $projects = $this->Task->Project->find('all');
      $this->set('projects', $projects);

    }
    
    function complete($id){
        $this->layout = 'ajax';
        $this->autoRender = false;
        
        $t = $this->Task->findById($id);
        $t['Task']['complete'] = !$t['Task']['complete'];
        
        $this->Task->save($t);
        
    }
    
    function starred($id){
        $this->layout = 'ajax';
        $this->autoRender = false;
        
        $t = $this->Task->findById($id);
        $t['Task']['starred'] = !$t['Task']['starred'];
        
        $this->Task->save($t);
        
    }
  }
