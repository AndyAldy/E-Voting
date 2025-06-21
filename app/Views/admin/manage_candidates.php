<?= view('layout/header') ?>
<div class="container mt-4">
    <h3>Manajemen Kandidat</h3>
    <p>Di halaman ini Anda dapat melihat dan menghapus data kandidat yang terdaftar.</p>

    <div class="card shadow-sm">
        <div class="card-header">
            Daftar Seluruh Kandidat
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($candidates)): ?>
                            <?php foreach($candidates as $candidate): ?>
                                <tr>
                                    <td><?= esc($candidate['name']) ?></td>
                                    <td><?= esc($candidate['username']) ?></td>
                                    <td class="text-center">
                                        <!-- Form kecil untuk setiap tombol hapus agar aman (menggunakan POST) -->
                                        <form action="<?= base_url('admin/candidates/delete/' . $candidate['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda YAKIN ingin menghapus kandidat ini? Tindakan ini tidak dapat dibatalkan.')">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data kandidat.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="<?= base_url('admin/admin_dashboard') ?>" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
</div>
    <?= view('layout/footer') ?>
