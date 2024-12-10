<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
</head>

<body style="background-image: url(<?= ROOT ?>/assets/images/bpc.png);">
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px; background-color: white; border-radius: 10px;">
        <div class="text-center mb-4">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="Logo" width="80" height="76">
            <h5 class="mt-3" style="color: #2e7d32;">BPC Document Request System</h5>
        </div>
        <form method="POST" action="<?= ROOT ?>/login">
            <!-- Display Error Messages -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Email Address -->
            <div class="form-floating mb-3">
                <input type="email" id="student_email" name="student_email" 
                       value="<?= htmlspecialchars($_POST['student_email'] ?? '') ?>" 
                       class="form-control" placeholder="name@example.com" required>
                <label for="student_email">Email Address</label>
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
                <input type="password" id="student_password" name="student_password" 
                       class="form-control" placeholder="Password" required>
                <label for="student_password">Password</label>
            </div>

            <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" id="gridCheck" name="remember_me">
    <label class="form-check-label" for="gridCheck">Remember Me</label>
</div>
            <!-- Sign In Button -->
            <button type="submit" class="btn btn-success w-100" style="background-color: #2e7d32; border: none;">Sign In</button>

            <!-- Sign Up Link -->
            <div class="text-center mt-3">
                <span>Don't have an account? </span>
                <a href="<?= ROOT ?>/users/create" class="text-decoration-none" style="color: #2e7d32;">Sign Up</a>
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Login Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Welcome back! You have successfully logged in.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="modalOkButton" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
  // Trigger the modal if the success flag is set
  <?php if (!empty($showSuccessModal)): ?>
    document.addEventListener('DOMContentLoaded', function () {
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Redirect to dashboard after modal is closed
        document.getElementById('modalOkButton').addEventListener('click', function () {
            window.location.href = "<?= ROOT ?>/dashboard";
        });
    });
  <?php endif; ?>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>