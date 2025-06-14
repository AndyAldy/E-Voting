<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Voting - Masukkan Kode</title>
    </head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1>Selamat Datang di E-Voting</h1>
                <p>Silakan masukkan kode unik Anda untuk memulai pemilihan.</p>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="/vote/process_code" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="text" name="unique_code" class="form-control form-control-lg" placeholder="Masukkan Kode Unik Anda" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Mulai Memilih</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>