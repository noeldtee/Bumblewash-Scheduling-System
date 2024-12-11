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

<div class="d-flex justify-content-center align-items-center vh-150">
    <div class="card shadow-sm p-3" style=" width: 100%; max-width: 600px; background-color: white; border-radius: 10px; overflow-y: auto;">
        <div class="text-center mb-3">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="Logo" width="80" height="76">
            <h5 class="mt-3" style="color: #2e7d32;">BPC Document Request System</h5>
        </div>

        <!-- Form starts here -->
        <form method="POST" action="<?= ROOT ?>/users/create" enctype="application/x-www-form-urlencoded"> 
            <!-- Display Errors -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Default Profile -->
            <div>
                <input type="hidden" name="student_profile" value="<?=ROOT ?>/assets/images/default_profile.png">
            </div>

            <!-- Name Row -->
            <div class="row g-3 mb-3">
                <div class="col-md-6 form-floating">
                    <input name="student_firstname" value="<?= get_var('student_firstname') ?>" type="text" class="form-control" placeholder="First Name">
                    <label for="FirstName">First Name</label>
                </div>
                <div class="col-md-6 form-floating">
                    <input name="student_lastname" value="<?= get_var('student_lastname') ?>" type="text" class="form-control" placeholder="Last Name">
                    <label for="LastName">Last Name</label>
                </div>
            </div>

            <!-- Course and Year Level -->
            <div class="row g-3 mb-3">
                <div class="col-md-6 form-floating">
                    <input name="course" value="<?= get_var('course') ?>" type="text" class="form-control" placeholder="Course">
                    <label for="Course">Course</label>
                </div>
                <div class="col-md-6 form-floating">
                    <select name="year_level" class="form-select">
                        <option <?= get_var('year_level') == '1st Year' ? 'selected' : '' ?>>1st Year</option>
                        <option <?= get_var('year_level') == '2nd Year' ? 'selected' : '' ?>>2nd Year</option>
                        <option <?= get_var('year_level') == '3rd Year' ? 'selected' : '' ?>>3rd Year</option>
                        <option <?= get_var('year_level') == '4th Year' ? 'selected' : '' ?>>4th Year</option>
                    </select>
                    <label for="YearLevel">Year Level</label>
                </div>
            </div>

            <!-- Section and Student ID Level -->
            <div class="row g-3 mb-3">
                <div class="col-md-6 form-floating">
                    <input name="section" value="<?= get_var('section') ?>" type="text" class="form-control" placeholder="Course">
                    <label for="Section">Section</label>
                </div>
                <div class="col-md-6 form-floating">
                    <input name="student_id" value="<?= get_var('student_id') ?>" type="text" class="form-control" placeholder="Course">
                    <label for="Student_ID">Student ID</label>
                </div>
            </div>          

            <!-- Gender and Birthdate -->
            <div class="row g-3 mb-3">
                <div class="col-md-6 form-floating">
                    <select name="student_gender" class="form-select">
                        <option <?= get_var('student_gender') == 'Prefer not to say' ? 'selected' : '' ?>>Prefer not to say</option>
                        <option <?= get_var('student_gender') == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option <?= get_var('student_gender') == 'Female' ? 'selected' : '' ?>>Female</option>
                    </select>
                    <label for="Gender">Gender</label>
                </div>
                <div class="col-md-6 form-floating">
                    <input name="student_birthdate" value="<?= get_var('student_birthdate') ?>" type="date" class="form-control">
                    <label for="Birthdate">Birthdate</label>
                </div>
            </div>

            <!-- Phone Number -->
            <div class="form-floating mb-3">
                <input name="student_number" value="<?= get_var('student_number') ?>" type="number" class="form-control" placeholder="Phone Number">
                <label for="PhoneNumber">Phone Number</label>
            </div>

            <!-- Email Address -->
            <div class="form-floating mb-3">
                <input name="student_email" value="<?= get_var('student_email') ?>" type="email" class="form-control" placeholder="Email Address">
                <label for="EmailAddress">Email Address</label>
            </div>

            <!-- Password and Confirm Password -->
            <div class="form-floating mb-3">
                <input name="student_password" type="password" class="form-control" placeholder="Password">
                <label for="Password">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input name="student_password_confirm" type="password" class="form-control" placeholder="Confirm Password">
                <label for="ConfirmPassword">Confirm Password</label>
            </div>

            <!-- Terms and Register Button -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input name="terms" class="form-check-input" type="checkbox" id="Terms" required>
                    <label class="form-check-label" for="Terms">
                        I agree to the terms and conditions
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100" style="background-color: #2e7d32; border: none;">Register</button>

            <!-- Sign In Link -->
            <div class="text-center mt-3">
                <span>Already have an account? </span>
                <a href="<?= ROOT ?>/login" class="text-decoration-none" style="color: #2e7d32;">Sign In</a>
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                User has been successfully registered.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="modalOkButton" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Registration Failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= htmlspecialchars($errorMessage ?? '') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show success modal
        <?php if (!empty($showSuccessModal)) : ?>
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            // Redirect after modal confirmation
            document.getElementById('modalOkButton').addEventListener('click', function () {
                window.location.href = "<?= ROOT ?>/login"; // Redirect after successful registration
            });
        <?php endif; ?>

        // Show error modal
        <?php if (!empty($showErrorModal)) : ?>
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        <?php endif; ?>
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>