<!DOCTYPE html>
<html>
<?= view('layout/header') ?>
<body>

<h1>Selamat Datang di Sistem E-Voting</h1>

<!-- Autentikasi -->
<h2>Autentikasi</h2>
<ul>
    <li><a href="<?= base_url('/login') ?>">Login</a></li>
    <li><a href="<?= base_url('/register') ?>">Register</a></li>
    <li><a href="<?= base_url('/logout') ?>">Logout</a></li>
</ul>

<?php if (session()->get('isLoggedIn')): ?>
    <!-- Jika login sebagai user biasa -->
    <?php if (session()->get('role') === 'user'): ?>
        <h2>Voting</h2>
        <?php if ($sudahMemilih): ?>
            <p>Anda sudah memilih. Terima kasih!</p>
        <?php else: ?>
            <form action="<?= base_url('/vote/submit') ?>" method="post">
                <p>Pilih Kandidat:</p>
                <?php foreach ($kandidat as $k): ?>
                    <input type="radio" name="candidate_id" value="<?= $k['id'] ?>" required> <?= esc($k['nama']) ?><br>
                <?php endforeach; ?>
                <button type="submit">Kirim Suara</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Jika login sebagai admin -->
    <?php if (session()->get('role') === 'admin'): ?>
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="<?= base_url('/admin') ?>">Dashboard Admin</a></li>
            <li><a href="<?= base_url('/admin/candidates/add') ?>">Tambah Kandidat</a></li>
            <li>
                <form action="<?= base_url('/admin/candidates/save') ?>" method="post">
                    <input type="text" name="name" placeholder="Nama Kandidat" required>
                    <input type="text" name="visi_misi" placeholder="Visi & Misi" required>
                    <button type="submit">Simpan Kandidat</button>
                </form>
            </li>
            <li><a href="<?= base_url('/admin/results') ?>">Lihat Hasil Voting</a></li>
        </ul>
    <?php endif; ?>
<?php else: ?>
    <p>Silakan login untuk menggunakan fitur sistem.</p>
<?php endif; ?>

</body>
<?= view('layout/footer') ?>
</html>
