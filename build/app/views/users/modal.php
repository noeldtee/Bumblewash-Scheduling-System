<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
</head>

<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 500px; background-color: white; border-radius: 10px;">
        <div class="text-center mb-4">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="Logo" width="80" height="76">
            <h5 class="mt-3" style="color: #2e7d32;">Smart Document Request System</h5>
        </div>
        <button class="btn btn-primary adduser w-100">Add User</button>
    </div>
</div>

<!-- JavaScript for SweetAlert2 and AJAX -->
<script>
  $('.adduser').click(function () {
    (async () => {
        const { value: formValues } = await Swal.fire({
            title: 'Add New User',
            html:
                '<input id="student_firstname" class="swal2-input" placeholder="First Name">' +
                '<input id="student_lastname" class="swal2-input" placeholder="Last Name">' +
                '<input id="course" class="swal2-input" placeholder="Course">' +
                '<input id="year_level" class="swal2-input" placeholder="Year Level">',
            focusConfirm: false,
            showCancelButton: true,
            preConfirm: () => {
                return {
                    student_firstname: $('#student_firstname').val(),
                    student_lastname: $('#student_lastname').val(),
                    course: $('#course').val(),
                    year_level: $('#year_level').val()
                };
            }
        });

        if (formValues) {
            $.ajax({
                url: "<?= ROOT ?>/users/create",
                type: 'POST',
                data: formValues,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'User Created Successfully',
                            html: `
                                Name: ${response.data.name}<br>
                                Course: ${response.data.course}<br>
                                Year Level: ${response.data.year_level}
                            `
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Create User',
                            html: response.errors.join('<br>')
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred while processing your request.'
                    });
                }
            });
        }
    })();
  });
</script>

<!-- Include Bootstrap Bundle -->
<script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
