<?= view('layout/header') ?>
<h3>Dashboard</h3>
<p>Selamat datang, <?= session()->get('username') ?>!</p>
<?php if($voted): ?>
  <div class="alert alert-info">Kamu sudah memilih.</div>
<?php else: ?>
  <a href="<?= base_url('vote') ?>" class="btn btn-primary">Pilih Kandidat</a>
<?php endif; ?>
<?= view('layout/footer') ?>