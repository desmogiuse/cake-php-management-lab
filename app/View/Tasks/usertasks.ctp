<h1>Tasks dell'utente <a href='<?php echo $this->Html->url('/users/view/'.$u['id']) ?>'><?php echo $u['username']; ?></a></h1>

<div class="well">
  <?php echo $this->Form->create('Task', array(
      'url' => array('action' => 'add'),
	    'inputDefaults' => array(
    		'div' => 'form-group',
    		'label' => false,
    		'wrapInput' => false,
    		'class' => 'form-control'
	     ),
	    'class' => 'well form-inline'
      )); ?>

    <?php echo $this->Form->input('Task.name',
      array('placeholder' => 'Aggiungi un task alla tua lista',
            'class' => 'form-control',
            'div' => 'col-md-10',
            'style' => 'width: 100%'
    )); ?>
    <?php echo $this->Form->hidden('Task.user_id', array('value'=>$u['id'])); ?>
    <?php echo $this->Form->submit('Sign in', array(
		'div' => 'form-group',
		'class' => 'btn btn-default'
	)); ?>
<?php echo $this->Form->end(); ?>
</div>

<table class="table table-striped">
  <th>Completo</th>
  <th>Nome</th>
  <th>Descrizione Task</th>
  <th>Deadline</th>
  <th>Azioni</th>
  <?php foreach ($tasks as $t): ?>

    <tr>
      <td>
        <?php if (isset($t['Task']['complete']))
        {
          echo $this->Form->checkbox('Task.complete',
          array('default' => $t['Task']['complete'])
          );
        }
        ?>
      </td>

      <td>
        <?php if (isset($t['Task']['name'])) ?>
      <?php { ?>
        <?php  echo $t['Task']['name']; ?>
          <a href='<?php echo $this->Html->url('/projects/view/'.$t['Project']['id']) ?>'>
         <?php
          if (empty($t['Project']['name']))
            {

            } else {echo '#'.$t['Project']['name'];}
         ?>
          </a>
      <?php } ?>
      </td>

      <td>
        <?php if (isset($t['Task']['description']))
        {
          echo $t['Task']['description'];
        }
        ?>
      </td>

      <td>
        <?php if (isset($t['Task']['deadline']) && $t['Task']['deadline'] > 0)
        {
          echo $t['Task']['deadline'];
        }
        ?>
      </td>
      <td>
        <a class='btn btn-xs btn-default' href='<?php echo $this->Html->url('edit/'.$t['Task']['id']) ?>' role='button'>Modifica</a>
      </td>
    </tr>

  <?php endforeach; ?>
</table>
