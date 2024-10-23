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
            <header>Login</header>
            <form id="loginForm" action="<?= ROOT ?>/login" method="POST">

                <?php if (!empty($errors)): ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">

                    <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                    <?php endforeach; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php endif; ?>

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" value="<?= get_var('username') ?>" name="username" id="username" class="">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="<?= ROOT ?>/users/create">Sign Up Now</a>
                </div>
                <div class="links">
                    <a href="<?= ROOT ?>/admins">Admin Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
