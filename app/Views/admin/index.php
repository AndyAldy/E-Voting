<?= view('layout/header') ?>
<h3>Admin Panel</h3>
<a href="<?= base_url('admin/candidates/add') ?>" class="btn btn-success mb-3">Tambah Kandidat</a>
<ul>
<?php foreach($candidates as $c): ?>
  <li><?= $c['name'] ?></li>
<?php endforeach; ?>
</ul>
<a href="<?= base_url('admin/results') ?>" class="btn btn-info">Lihat Hasil Voting</a>
<?= view('layout/footer') ?>