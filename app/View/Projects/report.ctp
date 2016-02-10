<h1>Report Progetti</h1>

<?php foreach ($projects as $p) { ?>
  <div class="row">
    <div class="well col-md-12">
      <h2>
        <a href="<?php echo $this->Html->url('/projects/view/'.$p['Project']['name']) ?>">
          <?php echo $p['Project']['name']; ?>
        </a>
      </h2>

  <?php
    $oggi = new DateTime("now");
    $datetime1 = new DateTime($p['Project']['startdate']);
    $datetime2 = new DateTime($p['Project']['enddate']);
    $interval = $datetime1->diff($datetime2);
    $durata = (int) $interval->format('%a');
    $oggi = new DateTime("now");
    $ggusati = (int) $oggi->diff($datetime1)->format('%a');

    $percentuale = ($ggusati / $durata) * 100;
  ?>

      <div class="progress">
        <div class="progress-bar"
             role="progressbar"
             aria-valuenow="<?php echo $percentuale ?>"
             aria-valuemin="0"
             aria-valuemax="100"
             style="width: <?php echo floor($percentuale) ?>%; min-width: 2em;">
        <?php echo floor($percentuale) ?>%
        </div>
      </div>

      <br>

      <div class="col-md-3">
        Task completati: <?php echo $numtask[$p['Project']['id']]['completati'] ?>
      </div>

      <div class="col-md-3">
        Task aperti: <?php echo $numtask[$p['Project']['id']]['aperti'] ?>
      </div>

      <div class="col-md-3">
        Task scaduti: <?php echo $numtask[$p['Project']['id']]['scaduti'] ?>
      </div>

    </div>
  </div>
<?php } ?>
