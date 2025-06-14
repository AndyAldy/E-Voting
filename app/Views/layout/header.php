<!DOCTYPE html>
<html>
<head>
  <title>E-Voting</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">E-Voting</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (session()->get('logged_in')): ?>
          <?php if (session()->get('role') === 'user'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/vote') ?>">Vote</a>
            </li>
          <?php elseif (session()->get('role') === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/admin') ?>">Admin Panel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/admin/candidates/add') ?>">Tambah Kandidat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/admin/results') ?>">Hasil Voting</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link text-danger" href="<?= base_url('/logout') ?>">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">
