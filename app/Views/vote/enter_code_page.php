<?= view('layout/header1') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
            <h1 class="mb-3">Selamat Datang di E-Voting</h1>
            <p class="lead mb-4">Silakan masukkan kode unik yang telah diberikan kepada Anda untuk menggunakan hak pilih Anda.</p>
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('vote/process-code') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="kode_unik" class="form-label visually-hidden">Kode Unik</label>
                            <!-- PERBAIKAN: Menggunakan name 'kode_unik' -->
                            <input type="text" name="kode_unik" id="kode_unik" class="form-control form-control-lg text-center" placeholder="Masukkan Kode Unik Anda" required autofocus>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Lanjutkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= view('layout/footer') ?>