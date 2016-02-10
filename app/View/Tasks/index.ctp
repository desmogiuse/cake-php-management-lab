<h1>Elenco dei Task</h1>

<?php foreach ($projects as $p): ?>
  <h2><?php echo $p['Project']['name'] ?></h2>

<table class="table table-striped">
  <th width="5%">Completo</th>
  <th width="25%">Nome</th>
  <th width="25%">Descrizione Task</th>
  <th width="20%">Deadline</th>
  <th width="10%">Utenti</th>
  <th width="5%">Preferito</th>
  <th width="10%">Azioni</th>
  <?php foreach ($p['Task'] as $t): ?>

    <tr>
      <td>
        <?php if (isset($t['complete']))
        {
          echo $this->Form->checkbox('Task.complete',
          array('default' => $t['complete'],
                'class' => 'finish',
                'task_id' => $t['id'],
               )
          );
        }
        ?>
      </td>

      <td>
        <?php if (isset($t['name'])) ?>
      <?php { ?>
        <?php  echo $t['name']; ?>
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
        <?php if (isset($t['description']))
        {
          echo $t['description'];
        }
        ?>
      </td>

      <td>
        <?php if (isset($t['deadline']) && $t['deadline'] > 0)
        {
          echo $t['deadline'];
        }
        ?>
      </td>

      <td>
        <?php if (isset($t['User']['username'])) { ?>
          <a href='<?php echo $this->Html->url('/projects/view/'.$t['User']['id']) ?>'>
            <?php echo $t['User']['username'] ?>
          </a>
        <?php  } ?>
      </td>
      
      <td>
        <?php if ($t['starred'])
        {
          $starred = 'glyphicon glyphicon-star';
        }
        else
        {
          $starred = 'glyphicon glyphicon-star-empty';
        }
        
        echo '<span class="starred '.$starred.'" task_id="'.$t['id'].'"></span>';
        ?>
      </td>

      <td>
        <a class='btn btn-xs btn-default' href='<?php echo $this->Html->url('edit/'.$t['id']) ?>' role='button'>Modifica</a>
      </td>
    </tr>

  <?php endforeach; ?>
</table>
<?php endforeach; ?>
