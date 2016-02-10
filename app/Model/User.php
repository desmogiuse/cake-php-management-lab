<?php

  class User extends AppModel {
    public $displayField = 'username';
    public $hasAndBelongsToMany = array('Project');
    
    public $hasMany = array('Task',

      'Resources'=>array(
        'className' => 'User',
        'foreignKey' => 'manager_id'
      )
    );
    
    public $belongsTo = array(

      'Manager'=>array(
        'className' => 'User',
        'foreignKey' => 'manager_id'
      )
    );
  }
