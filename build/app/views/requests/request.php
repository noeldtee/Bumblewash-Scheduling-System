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
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="student_firstname" value="<?= $_SESSION['USER']->student_firstname ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="student_lastname" value="<?= $_SESSION['USER']->student_lastname ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="student_email" value="<?= $_SESSION['USER']->student_email ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="student_number" value="<?= $_SESSION['USER']->student_number ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Student ID</label>
                            <input type="text" value="<?= $_SESSION['USER']->student_id ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year Level</label>
                            <input type="text" name="year_level" value="<?= $_SESSION['USER']->year_level ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Course</label>
                            <input type="text" name="course" value="<?= $_SESSION['USER']->course ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section</label>
                            <input type="text" name="section" value="<?= $_SESSION['USER']->section ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </main>
    </div>

<?php include PATH . "/partials/footer.php" ?>