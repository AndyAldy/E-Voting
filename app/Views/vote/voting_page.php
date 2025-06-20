    <?= view('layout/header') ?>
    <div class="container mt-4">
        <h3>Pilih Kandidat Pilihan Anda</h3>
        <p>Silakan pilih satu kandidat di bawah ini, lalu klik tombol "Kirim Suara".</p>
    <?php if(session()->getFlashdata('error')): ?><div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div><?php endif ?>
    <form action="<?= base_url('vote/submit') ?>" method="post">
        <?= csrf_field() ?>
        <div class="row">
            <?php if (!empty($candidates)): ?>
                <?php foreach($candidates as $candidate): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= base_url('uploads/photos/' . esc($candidate['foto'], 'attr')) ?>" class="card-img-top" alt="Foto <?= esc($candidate['nama_kandidat'], 'attr') ?>" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= esc($candidate['nama_kandidat']) ?></h5>
                                <div class="mb-3"><p class="card-text small"><strong>Visi:</strong> <?= nl2br(esc($candidate['visi'])) ?></p><p class="card-text small"><strong>Misi:</strong> <?= nl2br(esc($candidate['misi'])) ?></p></div>
                                <div class="mt-auto form-check"><input class="form-check-input" type="radio" name="kandidat_id" id="candidate_<?= $candidate['id'] ?>" value="<?= $candidate['id'] ?>" required><label class="form-check-label" for="candidate_<?= $candidate['id'] ?>"><strong>Pilih <?= esc($candidate['nama_kandidat']) ?></strong></label></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12"><p class="text-center">Saat ini tidak ada kandidat.</p></div>
            <?php endif; ?>
        </div>
        <?php if (!empty($candidates)): ?>
        <div class="text-center mt-4"><button type="submit" class="btn btn-success btn-lg">Kirim Suara</button></div>
        <?php endif; ?>
    </form>
</div>
<?= view('layout/footer') ?>