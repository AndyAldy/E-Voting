<?= view('layout/header') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Hasil Detail Pemilihan</h3>
        
        <?php if (!empty($votes)): ?>
            <form action="<?= base_url('admin/results/clear') ?>" method="post" onsubmit="return confirm('Anda yakin ingin menghapus SEMUA data hasil suara? Tindakan ini tidak dapat dibatalkan dan akan mereset status semua pemilih.');">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Hapus Semua Hasil
                </button>
            </form>
        <?php endif; ?>
    </div>

    <hr>

    <?php if (!empty($votes)): ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Pemilih</th>
                    <th>Memilih Kandidat</th>
                    <th>Waktu Memilih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($votes as $vote): ?>
                <tr>
                    <td><?= esc($vote['kode_unik']) ?></td>
                    <td><?= esc($vote['nama_kandidat']) ?></td>
                    <td><?= esc(date('d F Y H:i', strtotime($vote['waktu_memilih']))) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada suara yang masuk.</div>
    <?php endif; ?>

    <a href="<?= base_url('admin/admin_dashboard') ?>" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
<?= view('layout/footer') ?>