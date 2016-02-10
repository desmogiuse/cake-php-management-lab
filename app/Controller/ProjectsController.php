<?php

  class ProjectsController extends AppController {
    public $scaffold;

    function index(){
      $p = $this->Project->find('all');
      $this->set('projects', $p);

      $conta = $this->Project->Task->find('all',
        array(
          'fields' => array('Task.project_id', 'count(Task.id) as c'),
          'conditions' => array('Task.complete !=' => 1),
          'group' => array('project_id')
        )
      );

      $conta2 = array();
      foreach ($conta as $c)
      {
        $conta2[$c['Task']['project_id']] = $c[0]['c'];
      }
      $this->set('numtasks', $conta2);
    }

    function report(){
      $projects = $this->Project->find('all');
      $this->set('projects', $projects);

      $numtask = array();

      foreach ($projects as $p) {
        $numtask[$p['Project']['id']]['completati'] = 0;
        $numtask[$p['Project']['id']]['scaduti'] = 0;
        $numtask[$p['Project']['id']]['aperti'] = 0;

        foreach ($p['Task'] as $t) {
          if($t['complete'] == 1)
          {
            $numtask[$p['Project']['id']]['completati'] ++;
          }
          elseif ($t['deadline'] < date('Y-m-d'))
          {
            $numtask[$p['Project']['id']]['scaduti'] ++;
          }
          else
          {
            $numtask[$p['Project']['id']]['aperti'] ++;
          }
        }
      }
      $this->set('numtask', $numtask);
    }
    
    function edit($id){
      if(!empty($this->request->data)){
        if ($this->Project->save($this->request->data)){
          return $this->redirect('index');
        }
      }

      $this->data = $this->Project->findById($id);
      
      $managers = $this->Project->User->find('list', array(
          'conditions' => array('manager_id' => 0)
      ));

      $users = $this->Project->User->find('list', array(
          'conditions' => array('manager_id' => $this->data['Project']['manager_id'])
      ));
      $projects = $this->Project->find('list');
      $tasks = $this->Project->Task->find('list');

      $this->set(compact('users', 'projects', 'tasks'));
      $this->set('managers', $managers);
    }
  }
