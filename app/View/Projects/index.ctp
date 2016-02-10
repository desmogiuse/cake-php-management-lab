<h1>Elenco dei progetti</h1>
<a class="btn btn-default" href="<?php echo $this->Html->url('/projects/add'); ?>" role="button">Aggiungi Progetto</a>

<ul class="list-group">
  <?php foreach ($projects as $p): ?>
    <li class="list-group-item">
      <span class="badge">
        <?php if(isset($numtasks[$p['Project']['id']]))
          {
            echo $numtasks[$p['Project']['id']];
          } else {echo 0;}
        ?>
      </span>
      <a href='<?php echo $this->Html->url('view/'.$p['Project']['id']) ?>'>
        <?php echo $p['Project']['name']; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
