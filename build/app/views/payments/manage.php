<?php include PATH . "/partials/sidenav.php" ?>
    <!-- Sidebar -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin_dashboard.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>
<body>
    <input type="checkbox" id="menu-toggle">

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
                        <a href="<?= ROOT ?>/admins/dashboard">
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#request" aria-expanded="false" aria-controls="auth">
                        <small>Request Management</small>
                        </a>
                        <ul id="request" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/requests/list" class="sidebar-link">All</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/requests/pending" class="sidebar-link">Pending</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/requests/inprocess" class="sidebar-link">In process</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/requests/completed" class="sidebar-link">Completed</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/requests/rejected" class="sidebar-link">Rejected</a>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/documents/doc">
                            <small>Document Management</small>
                        </a>
                    </li>
                    <li>
                        <a href="" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#payment" aria-expanded="false" aria-controls="auth">
                        <small>Payment Management</small>
                        </a>
                        <ul id="payment" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/payments/manage"  class="active">Payment Logs</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/payments/setting" class="sidebar-link">Payment Settings</a>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#user" aria-expanded="false" aria-controls="auth">
                        <small>User Management</small>
                        </a>
                        <ul id="user" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/users/student" class="sidebar-link">Student</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/users/admin" class="sidebar-link">Admin</a>
                        </li>
                    </ul>
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

    <!-- Main Content -->
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
                        <h3>Hello!</h3>
                        <a href="" class="bg-img" style="background-image: url();"></a>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="page-header">
                <span>Payment Management</span><br>
                <small>Provide a comprehensive record of all payments</small>
            </div>
            <div class="page-content">
               
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Reference ID</th>
                                    <th>Name</th>
                                    <th>Payment Method</th>
                                    <th>Payment Date</th>
                                    <th>Amount Paid</th>
                                    <th>Actions</th>
                                    <th>Export</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php include PATH . "/partials/footer.php" ?>