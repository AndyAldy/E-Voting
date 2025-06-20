<?= view('layout/header') ?>
<div class="container mt-4">
    <h3>Kode Pemilih Baru Berhasil Dibuat</h3>
    
    <?php if ($total_dibuat > 0): ?>
        <div class="alert alert-success mt-3">
            Berhasil membuat <strong><?= esc($total_dibuat) ?></strong> kode pemilih baru.
        </div>
        <p>Berikut adalah daftar kode yang dapat Anda bagikan kepada para pemilih:</p>
        <div class="card">
            <div class="card-header fw-bold">Daftar Kode Unik</div>
            <ul class="list-group list-group-flush">
                <?php foreach ($codes as $kode): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong style="font-family: 'Courier New', Courier, monospace; font-size: 1.2rem;"><?= esc($kode) ?></strong>
                        <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('<?= esc($kode) ?>').then(() => alert('Kode disalin!'))">
                            <i class="fas fa-copy"></i> Salin
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <div class="alert alert-warning mt-3">
            Tidak ada kode yang berhasil dibuat. Mungkin terjadi kesalahan.
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <a href="<?= base_url('admin/admin_dashboard') ?>" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
<?= view('layout/footer') ?>