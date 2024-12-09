<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login | <?= APP_NAME ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px; background-color: white; border-radius: 10px;">
        <div class="text-center mb-4">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="Logo" width="80" height="76">
            <h5 class="mt-3" style="color: #2e7d32;">Admin Portal</h5>
        </div>
        <form method="POST" action="<?= ROOT ?>/admins/login">
            <!-- Display Error Messages -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Username -->
            <div class="form-floating mb-3">
            <input type="text" id="admin_name" name="admin_name" class="form-control" value="<?= get_var('admin_name') ?>" placeholder="Enter your username">
                <label for="admin_name">Username</label>
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
                <input type="password" id="admin_password" name="admin_password" 
                       class="form-control" placeholder="Password" required>
                <label for="admin_password">Password</label>
            </div>
                        
            <!-- Remember Me and Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
                </div>
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="btn btn-success w-100" style="background-color: #2e7d32; border: none;">Sign In</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>