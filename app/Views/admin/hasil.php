<?= view('layout/header') ?>
<div class="container mt-4">
    <h3>Hasil Detail Pemilihan (Siapa Memilih Siapa)</h3>
    <hr>
    <?php if (!empty($votes) && is_array($votes)): ?>
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
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
<?= view('layout/footer') ?>