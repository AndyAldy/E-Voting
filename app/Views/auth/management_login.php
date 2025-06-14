<?= view('layout/header') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4">Management Login</h3>
                    <p class="text-center text-muted">Hanya untuk Admin & Kandidat</p>

                    <!-- Menampilkan pesan error jika login gagal -->
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif ?>

                    <!-- Form action harus menunjuk ke rute yang benar: /manage/process -->
                    <form action="<?= base_url('manage/process') ?>" method="post">
                        
                        <!-- CSRF Field untuk keamanan -->
                        <?= csrf_field() ?>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <!-- Input name harus 'email', bukan 'username' -->
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan alamat email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        
                        <div class="d-grid">
                           <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
