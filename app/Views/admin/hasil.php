<?= view('layout/header') ?>
<h3>Hasil Voting</h3>
<table class="table">
  <thead>
    <tr>
      <th>Kandidat</th>
      <th>Jumlah Suara</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($results as $r): ?>
    <tr>
      <td><?= $r['name'] ?></td>
      <td><?= $r['votes'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= view('layout/footer') ?>
