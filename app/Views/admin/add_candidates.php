<?= view('layout/header') ?>

<div class="container mt-4">
    <h3>Tambah Kandidat Baru</h3>
    <p>Akun login akan dibuat secara otomatis untuk kandidat ini agar mereka bisa mengisi visi, misi, dan foto.</p>

    <!-- Bagian untuk menampilkan pesan error validasi -->
    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <strong>Gagal menyimpan data:</strong>
            <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <!-- Pastikan action mengarah ke rute yang benar -->
    <form method="post" action="<?= base_url('admin/candidates/save') ?>">
        
        <!-- Jangan lupa CSRF field untuk keamanan -->
        <?= csrf_field() ?>
        
        <div class="form-group mb-3">
            <label for="full_name" class="form-label">Nama Lengkap Kandidat</label>
            <!-- Ganti 'name' menjadi 'full_name' -->
            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Masukkan nama lengkap kandidat" value="<?= old('full_name') ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email (untuk login kandidat)</label>
            <!-- Tambahkan input untuk email -->
            <input type="email" name="email" id="email" class="form-control" placeholder="cth: kandidat1@email.com" value="<?= old('email') ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">Password (untuk login kandidat)</label>
            <!-- Tambahkan input untuk password -->
            <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 6 karakter" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Kandidat</button>
        <a href="<?= base_url('/admin') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= view('layout/footer') ?>
