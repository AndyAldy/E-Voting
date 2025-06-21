<?= view('layout/header1') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">

            <div class="card shadow-sm">
                <div class="card-body p-5">
                    
                    <!-- Anda bisa menggunakan ikon centang dari Font Awesome atau SVG -->
                    <div style="font-size: 4rem; color: #28a745;" class="mb-3">
                        ✔
                    </div>
                    
                    <h1 class="card-title">Terima Kasih!</h1>
                    <p class="lead">Suara Anda telah berhasil direkam.</p>
                    <p>Partisipasi Anda sangat berarti untuk proses demokrasi ini. Sesi Anda telah berakhir dan kode unik Anda tidak dapat digunakan kembali.</p>

                    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">Kembali ke Halaman Awal</a>

                </div>
            </div>

        </div>
    </div>
</div>

<?= view('layout/footer') ?>
