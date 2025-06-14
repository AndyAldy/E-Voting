<?= view('layout/header') ?>
<h3>Tambah Kandidat</h3>
<form method="post" action="<?= base_url('admin/candidates/save') ?>">
  <input type="text" name="name" class="form-control" placeholder="Nama" required><br>
  <textarea name="description" class="form-control" placeholder="Visi dan Misi" required></textarea><br>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= view('layout/footer') ?>