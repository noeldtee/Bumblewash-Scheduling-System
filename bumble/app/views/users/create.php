<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME ?></title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">
</head>

<body>

<div class="container">
    <div class="box form-box">
        <header>Sign Up</header>
        <form id="" method="POST">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
    <!-- Your form fields -->
        <div class="field input">
            <label for="username">Username</label>
            <input name="username" value="<?= get_var('username') ?>" type="text" class="form-control">
        </div>
        <div class="field input">
            <label for="firstname">First Name</label>
            <input name="firstname"  value="<?= get_var('firstname') ?>" type="text" class="form-control">
        </div>
        <div class="field input">
            <label for="lastname">Last Name</label>
            <input name="lastname"  value="<?= get_var('lastname') ?>" type="text" class="form-control">
        </div>
        <div class="field input">
            <label for="email">Email</label>
            <input name="email"  value="<?= get_var('email') ?>" type="text" class="form-control">
        </div>
        <div class="field input">
            <label for="number">Phone Number</label>
            <input name="number"  value="<?= get_var('number') ?>" type="text" class="form-control">
        </div>
        <div class="field input">
            <label for="password">Password</label>
            <input name="password"  value="<?= get_var('password') ?>" type="password" class="form-control">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" href="terms_and_conditions.html" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="links">
            Already a member? <a href="<?= ROOT ?>/login">Sign In</a>
        </div>
        <div class="field">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

<script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>