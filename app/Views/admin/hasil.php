<?= view('layout/header') ?>

<div class="container mt-4">
    <h3>Hasil Detail Pemilihan (Siapa Memilih Siapa)</h3>

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
                <!-- Loop melalui variabel $votes yang dikirim dari controller -->
                <?php foreach($votes as $vote): ?>
                <tr>
                    <!-- Tampilkan 'voter_code' dan 'candidate_name' sesuai query -->
                    <td><?= esc($vote['voter_code']) ?></td>
                    <td><?= esc($vote['candidate_name']) ?></td>
                    <td><?= esc($vote['voted_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            Belum ada suara yang masuk.
        </div>
    <?php endif; ?>

    <a href="<?= base_url('/admin') ?>" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>

<?= view('layout/footer') ?>
