<?= view('layout/header') ?>

<div class="container mt-4">
    <h3>Dashboard Kandidat</h3>
    <p>Selamat datang, <?= esc($candidate['full_name'] ?? 'Kandidat') ?>. Di halaman ini Anda dapat memperbarui profil Anda.</p>

    <!-- Menampilkan pesan sukses jika ada -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Profil</h5>
            
            <!-- Form harus memiliki enctype untuk upload file -->
            <form action="<?= base_url('candidate/profile/update') ?>" method="post" enctype="multipart/form-data">
                
                <?= csrf_field() ?>

                <div class="form-group mb-3">
                    <label for="vision" class="form-label">Visi</label>
                    <!-- Tampilkan data visi yang sudah ada -->
                    <textarea name="vision" id="vision" class="form-control" rows="4" placeholder="Tuliskan visi Anda di sini"><?= esc($candidate['vision'] ?? '') ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="mission" class="form-label">Misi</label>
                    <!-- Tampilkan data misi yang sudah ada -->
                    <textarea name="mission" id="mission" class="form-control" rows="4" placeholder="Tuliskan misi Anda di sini"><?= esc($candidate['mission'] ?? '') ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="photo" class="form-label">Ganti Foto Profil</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    
                    <!-- Tampilkan foto yang sekarang -->
                    <?php if (!empty($candidate['photo']) && $candidate['photo'] !== 'default.png'): ?>
                        <div class="mt-2">
                            <p>Foto saat ini:</p>
                            <img src="<?= base_url('uploads/photos/' . $candidate['photo']) ?>" alt="Foto Kandidat" style="width: 150px; height: auto;">
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Update Profil</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<?= view('layout/footer') ?>
