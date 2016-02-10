<table class="table table-striped">
  <tr>
    <th>Utente</th>
    <th>Email</th>
    <th>Azioni</th>
  </tr>

  <?php foreach ($users as $u): ?>
    <tr>
      <td><?php echo $u['User']['username'] ?></td>
      <td>
        <a href="mailto:<?php echo $u['User']['email']; ?>">
          <i class="fa fa-envelope"></i> <?php echo $u['User']['email']; ?>
        </a>
      </td>
      <td>
        <?php echo $this->Html->link('[Modifica]', 'edit/'.$u['User']['id']); ?>
        <?php echo $this->Html->link(
          '[Elimina]',
          'delete/'.$u['User']['id'],
          array('confirm'=> 'Vuoi davvero cancellare questo utente?')
        ); ?>
        <?php echo $this->Html->link('[Tasks]', '/tasks/usertasks/'.$u['User']['id']); ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
