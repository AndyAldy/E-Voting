<?= view('layout/header') ?>

<div class="container mt-4">
    <h3>Tambah Kandidat Baru</h3>
    <p>Akun login akan dibuat secara otomatis untuk kandidat ini agar mereka bisa mengisi visi, misi, dan foto.</p>


<form method="post" action="<?= base_url('admin/candidates/save') ?>">
    <?= csrf_field() ?>

    <div class="form-group mb-3">
        <label for="name" class="form-label">Nama Lengkap Kandidat</label>
        <input type="text" name="name" id="name" class="form-control"
               placeholder="Masukkan nama lengkap kandidat" value="<?= old('name') ?>" required>
    </div>

    <div class="form-group mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" id="username" class="form-control"
        value="<?= old('username') ?>" required>
    </div>

    <div class="form-group mb-3">
        <label for="password" class="form-label">Password (untuk login kandidat)</label>
        <input type="password" name="password" id="password" class="form-control"
               placeholder="Minimal 6 karakter" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Kandidat</button>
    <a href="<?= base_url('/admin') ?>" class="btn btn-secondary">Batal</a>
</form>

</div>

<?= view('layout/footer') ?>
