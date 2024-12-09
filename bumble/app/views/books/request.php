<?php include PATH . "/partials/sidenav.php" ?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/request.css">
<!-- Sidebar -->
<div class="sidebar">
    <div class="side-content">
        <div class="profile">
            <!-- Logo -->
            <div class="profile-img bg-img" style="background-image: url(<?= ROOT ?>/assets/images/logo.png);"></div>
            <h5>Smart Document Request System</h>

        </div>
        <div class="side-menu">
            <ul class="container">
                <li>
                    <a href="<?= ROOT ?>/dashboard">
                        <span class="las la-home"></span>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/request" class="active">
                        <span class="las la-file-alt"></span>
                        <small>Request a Document</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/track">
                        <span class="las la-search"></span>
                        <small>Track Your Request</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/payments/payment">
                        <span class="las la-wallet"></span>
                        <small>Payment History</small>
                    </a>
                <li>
                    <a href="<?= ROOT ?>/history">
                        <span class="las la-history"></span>
                        <small>Request History</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/setting">
                        <span class="las la-cog"></span>
                        <small>Settings</small>
                    </a>
                </li>
                <li class="logout">
                    <a href="<?= ROOT ?>/logout">
                        <span class="las la-sign-out-alt"></span>
                        <small>Logout</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="main-content">
    <header>
        <div class="header-content">
            <label for="menu-toggle" class="toggle">
                <span class="las la-bars"></span>
            </label>
            <div class="header-menu">
                <div class="notify-icon">
                    <span class="las la-bell"></span>
                    <span class="notify">3</span>
                </div>
                <div class="user">
                    <h3>Hello, <?= $_SESSION['USER']->student_firstname ?>!</h3>
                    <a href="" class="bg-img" style="background-image: url(<?= $_SESSION['USER']->student_profile ?>);"></a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="page-header">
            <h1>Request Document</h1>
            <small>Fill out the form below to request your document</small>
        </div>
        <div class="page-content">
            <!-- Request Form -->
            <form action="<?= ROOT ?>/requests/request" method="POST" class="form-container">
                <h3>Personal Information</h3>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input name="book_fname" value="<?= $_SESSION['USER']->student_firstname ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="book_fname" value="<?= $_SESSION['USER']->student_firstname ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="book_lname" value="<?= $_SESSION['USER']->student_lastname ?>" class="form-control" readonly>
                        <input type="hidden" name="book_lname" value="<?= $_SESSION['USER']->student_firstname ?>">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="book_email" value="<?= $_SESSION['USER']->student_email ?>" type="email" class="form-control" readonly>
                        <input type="hidden" name="book_email" value="<?= $_SESSION['USER']->student_email ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input name="book_number" value="<?= $_SESSION['USER']->student_number ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="book_number" value="<?= $_SESSION['USER']->student_number ?>">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Student ID</label>
                        <input name="student_id" value="<?= $_SESSION['USER']->student_id ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="student_id" value="<?= $_SESSION['USER']->student_id ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Year Level</label>
                        <input name="year_level" value="<?= $_SESSION['USER']->year_level ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="year_level" value="<?= $_SESSION['USER']->year_level ?>">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <input name="course" value="<?= $_SESSION['USER']->course ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="course" value="<?= $_SESSION['USER']->course ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <input name="section" value="<?= $_SESSION['USER']->section ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="section" value="<?= $_SESSION['USER']->section ?>">
                    </div>
                </div>
                <h3>Document Information</h3>
                <div class="row g-3 mb-3">
                <label for="">Select Document</label>
                    <div class="input-group">
                    <select id="book_document" name="book_document" class="form-select">
                    <option selected disabled>Select a Document</option>
                    <?php
                    $db = new Database();
                    $connection = $db->connect();

                    $query = "SELECT DISTINCT document FROM services WHERE status = 'Available'"; // Include status condition
                    $result = $connection->query($query);

                    if ($result) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $document = $row['document'];
                            echo '<option value="' . $document . '">' . $document . '</option>';
                        }
                    } else {
                        echo "Error fetching services: " . $connection->errorInfo()[2];
                    }
                    ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Price will be displayed here" readonly>
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Proceed to payment</button>
            </form>
        </div>
    </main>

<script>
    document.getElementById('book_document').addEventListener('change', fetchPrice);

    function fetchPrice() {
        var documentName = document.getElementById('book_document').value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('price').value = xhr.responseText;
            }
        };
        xhr.open('GET', '<?= ROOT ?>/Books/getPrice?service=' + encodeURIComponent(documentName), true);
        xhr.send();
    }
</script>

<?php include PATH . "partials/footer.php" ?>