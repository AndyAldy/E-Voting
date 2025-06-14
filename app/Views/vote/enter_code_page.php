<?= view('layout/header') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
            
            <h1 class="mb-3">Selamat Datang di E-Voting</h1>
            <p class="lead mb-4">Silakan masukkan kode unik yang telah diberikan kepada Anda untuk menggunakan hak pilih Anda.</p>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    
                    <!-- Menampilkan pesan error jika kode salah atau sudah digunakan -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form untuk memasukkan kode unik -->
                    <form action="<?= base_url('vote/process-code') ?>" method="post">
                        
                        <?= csrf_field() ?>
                        
                        <div class="form-group">
                            <label for="unique_code" class="form-label sr-only">Kode Unik</label>
                            <input type="text" name="unique_code" id="unique_code" class="form-control form-control-lg text-center" placeholder="Masukkan Kode Unik Anda" required autofocus>
                        </div>
                        
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Lanjutkan</button>
                        </div>
                    </form>

                </div>
            </div>

            <p class="mt-4 text-muted">
                <small>Pastikan Anda memasukkan kode dengan benar. Setiap kode hanya dapat digunakan satu kali.</small>
            </p>

        </div>
    </div>
</div>

<?= view('layout/footer') ?>
