<?= view('layout/header') ?>

<div class="container mt-4">
    <h3 class="mb-4">Pilih Kandidat</h3>
    <div class="row">
        <?php foreach($candidates as $c): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($c['name']) ?></h5>
                        <p class="card-text"><?= esc($c['description']) ?></p>
                        <form method="post" action="<?= base_url('vote/submit') ?>">
                            <?= csrf_field() ?>
                            <input type="hidden" name="candidate_id" value="<?= $c['id'] ?>">
                            <button type="submit" class="btn btn-success btn-block w-100">Vote</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= view('layout/footer') ?>
