<?= view('layout/header') ?>
<h3>Pilih Kandidat</h3>
<div class="row">
<?php foreach($candidates as $c): ?>
  <div class="col-md-4">
    <div class="card mb-3">
      <div class="card-body">
        <h5><?= $c['name'] ?></h5>
        <p><?= $c['description'] ?></p>
        <form method="post" action="<?= base_url('vote/submit') ?>">
          <input type="hidden" name="candidate_id" value="<?= $c['id'] ?>">
          <button type="submit" class="btn btn-success">Vote</button>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?= view('layout/footer') ?>
