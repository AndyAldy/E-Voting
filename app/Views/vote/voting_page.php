<?= view('layout/header') ?>

<div class="container mt-4">
    <h3>Pilih Kandidat Pilihan Anda</h3>
    <p>Silakan pilih satu kandidat di bawah ini, lalu klik tombol "Kirim Suara" di bagian bawah halaman.</p>

    <!-- Menampilkan pesan error jika user tidak memilih kandidat -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif ?>

    <!-- Satu form utama untuk semua kandidat -->
    <form action="<?= base_url('vote/submit') ?>" method="post">
        <?= csrf_field() ?>

        <div class="row">
            <?php if (!empty($candidates) && is_array($candidates)): ?>
                <?php foreach($candidates as $candidate): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            
                            <!-- Menampilkan foto kandidat -->
                            <img src="<?= base_url('uploads/photos/' . esc($candidate['photo'], 'attr')) ?>" class="card-img-top" alt="Foto <?= esc($candidate['full_name'], 'attr') ?>" style="height: 250px; object-fit: cover;">
                            
                            <div class="card-body d-flex flex-column">
                                <!-- Tampilkan full_name, bukan name -->
                                <h5 class="card-title"><?= esc($candidate['full_name']) ?></h5>
                                
                                <div class="mb-3">
                                    <strong>Visi:</strong>
                                    <!-- Tampilkan vision, bukan description -->
                                    <p class="card-text small"><?= esc($candidate['vision']) ?></p>
                                    <strong>Misi:</strong>
                                    <!-- Tampilkan mission -->
                                    <p class="card-text small"><?= esc($candidate['mission']) ?></p>
                                </div>
                                
                                <div class="mt-auto">
                                    <div class="form-check">
                                        <!-- Gunakan radio button untuk memilih -->
                                        <input class="form-check-input" type="radio" name="candidate_id" id="candidate_<?= $candidate['id'] ?>" value="<?= $candidate['id'] ?>" required>
                                        <label class="form-check-label" for="candidate_<?= $candidate['id'] ?>">
                                            <strong>Pilih <?= esc($candidate['full_name']) ?></strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">Saat ini tidak ada kandidat yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($candidates)): ?>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Kirim Suara</button>
        </div>
        <?php endif; ?>

    </form>
</div>

<?= view('layout/footer') ?>
