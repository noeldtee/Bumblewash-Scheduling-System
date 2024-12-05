<?php include PATH . "/partials/sidenav.php" ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/track.css">
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
                        <a href="<?= ROOT ?>/student/dashboard">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/request">
                            <span class="las la-file-alt"></span>
                            <small>Request a Document</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/track" class="active">
                            <span class="las la-search"></span>
                            <small>Track Your Request</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/payment">
                            <span class="las la-wallet"></span>
                            <small>Payment History</small>
                        </a>
                    <li>
                        <a href="<?= ROOT ?>/student/history">
                            <span class="las la-history"></span>
                            <small>Request History</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/setting">
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
            <div class="page-header">
                <h1>Track Your Request</h1>
                <small>Check the status of your document request here.</small>
            </div>
            <div class="page-content">
                <!-- Analytics Cards -->
                <div class="analytics">
                    <div class="card">
                        <div class="card-head">
                            <h2>Certificate of Enrollment</h2>
                            <a href="">View Details</a>
                        </div>
                        <div class="card-progress">
                            <small>Request Date:</small>
                            <small>Status:</small>
                            <small>Pickup Date:</small>
                            <small>Payment Status:</small>
                        </div>
                    </div>
                    <div class="card2">
                        <div class="card-head2">
                            <a href="">Request Another Document</a>
                        </div>
                    </div>
                </div>
        </main>

<?php include PATH . "/partials/footer.php" ?>