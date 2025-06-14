<?= view('layout/header') ?>

<div class="container mt-4">
    <h3>Admin Dashboard</h3>
    <p>Selamat datang di panel kontrol E-Voting. Gunakan tombol di bawah ini untuk mengelola sistem.</p>

    <!-- Menampilkan pesan sukses jika ada (misal: setelah membuat kode) -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Manajemen Sistem</h5>
            <div class="list-group">
                <!-- Tombol untuk menambah kandidat baru -->
                <a href="<?= base_url('admin/candidates/add') ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-plus"></i> Tambah Kandidat Baru
                </a>
                
                <!-- Tombol untuk melihat hasil pemilihan -->
                <a href="<?= base_url('admin/results') ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-bar"></i> Lihat Hasil Detail Voting
                </a>
                
                <!-- Tombol untuk membuat kode pemilih -->
                <a href="<?= base_url('admin/codes/generate') ?>" class="list-group-item list-group-item-action" onclick="return confirm('Apakah Anda yakin ingin membuat 10 kode pemilih baru?')">
                    <i class="fas fa-key"></i> Generate 10 Kode Pemilih Baru
                </a>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

</div>

<?= view('layout/footer') ?>
