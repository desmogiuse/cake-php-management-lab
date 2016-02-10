<h1>Modifica Progetto <?php echo $this->request->data['Project']['name'] ?></h1>

<?php echo $this->Form->create(
  'Project',
  array(
  	'inputDefaults' => array(
  		'div' => 'form-group',
  		'wrapInput' => false,
  		'class' => 'form-control'
  	),
  	'class' => 'well'
  ));
?>

  <?php echo $this->Form->hidden('id'); ?>
  <?php echo $this->Form->input('name'); ?>
  <?php echo $this->Form->input('description'); ?>
  <?php echo $this->Form->input('startdate', array('class'=>'', 'type'=>'date', 'dateFormat'=>'DMY')); ?>
  <?php echo $this->Form->input('enddate', array('class'=>'', 'type'=>'date', 'dateFormat'=>'DMY')); ?>
  <?php echo $this->Form->input('User' , array('empty' => '-- non definito --')); ?>
  <?php echo $this->Form->input('manager_id' , array('empty' => '-- non definito --')); ?>
  <?php echo $this->Form->input('task_id' , array('empty' => '-- non definito --')); ?>
  <?php echo $this->Form->input('complete', array('class'=>null)) ?>

<?php echo $this->Form->end('Salva'); ?>

