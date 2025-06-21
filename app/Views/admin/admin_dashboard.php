<?= view('layout/header') ?>
<div class="container mt-4">
    <h3>Admin Dashboard</h3>
    <p>Selamat datang di panel kontrol E-Voting.</p>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Manajemen Sistem</h5>
            <div class="list-group">
                <a href="<?= base_url('admin/candidates/add') ?>" class="list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Tambah Kandidat Baru</a>
                <a href="<?= base_url('admin/candidates') ?>" class="list-group-item list-group-item-action"><i class="fas fa-users-cog"></i> Manajemen Kandidat</a>
                <a href="<?= base_url('admin/results') ?>" class="list-group-item list-group-item-action"><i class="fas fa-chart-bar"></i> Lihat Hasil Detail Voting</a>
                <a href="<?= base_url('admin/codes/generate') ?>" class="list-group-item list-group-item-action" onclick="return confirm('Buat 10 kode pemilih baru?')"><i class="fas fa-key"></i> Generate 10 Kode Pemilih Baru</a>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>
    <?= view('layout/footer') ?>

