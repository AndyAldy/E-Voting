<?= view('layout/header') ?>
<h3>Register</h3>
<form method="post" action="<?= base_url('register') ?>">
  <input type="text" name="username" class="form-control" placeholder="Username" required><br>
  <input type="password" name="password" class="form-control" placeholder="Password" required><br>
  <button type="submit" class="btn btn-success">Register</button>
</form>
<?= view('layout/footer') ?>