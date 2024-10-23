<?php include "partials/header.php" ?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">

<div class="container">
  <div class="box">
    <form action="" method="POST" class="form-box">
      <header>Admin Login</header>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php foreach ($errors as $error): ?>
            <?= $error . "<br>" ?>
          <?php endforeach; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="field">
        <label for="admin_name">Username</label>
        <input type="text" id="admin_name" name="admin_name" value="<?= get_var('admin_name') ?>" placeholder="Enter your username">
      </div>
      <div class="field">
        <label for="admin_password">Password</label>
        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="links">
        <a href="<?= ROOT ?>/login">Login as User</a>
      </div>
    </form>
  </div>
</div>

<?php include "partials/footer.php" ?>
