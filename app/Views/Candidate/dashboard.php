<?= view('layout/header') ?>
<div class="container mt-4">
    <h3>Dashboard Kandidat</h3>
    <!-- PERBAIKAN: Gunakan 'nama_kandidat' dari hasil JOIN -->
    <p>Selamat datang, <?= esc($kandidat['nama_kandidat'] ?? 'Kandidat') ?>. Di halaman ini Anda dapat memperbarui profil Anda.</p>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Profil</h5>
            <form action="<?= base_url('candidate/profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="visi" class="form-label">Visi</label>
                    <!-- PERBAIKAN: Gunakan name 'visi' dan field 'visi' -->
                    <textarea name="visi" id="visi" class="form-control" rows="4"><?= esc($kandidat['visi'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="misi" class="form-label">Misi</label>
                    <!-- PERBAIKAN: Gunakan name 'misi' dan field 'misi' -->
                    <textarea name="misi" id="misi" class="form-control" rows="4"><?= esc($kandidat['misi'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Ganti Foto Profil</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    
                    <?php if (!empty($kandidat['foto'])): ?>
                        <div class="mt-2">
                            <p>Foto saat ini:</p>
                            <img src="<?= base_url('uploads/photos/' . $kandidat['foto']) ?>" alt="Foto Kandidat" style="width: 150px; height: auto; border-radius: 8px;">
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Update Profil</button>
            </form>
        </div>
    </div>
    <div class="mt-4">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>
<?= view('layout/footer') ?>