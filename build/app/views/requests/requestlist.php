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
                        <a href="" class="active">
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#request" aria-expanded="false" aria-controls="auth">
                        <small>Request Management</small>
                        </a>
                        <ul id="request" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">All</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">Pending</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">In process</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Completed</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Rejected</a>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="">
                            <small>Document Management</small>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#payment" aria-expanded="false" aria-controls="auth">
                        <small>Payment Management</small>
                        </a>
                        <ul id="payment" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?= ROOT ?>/track" class="sidebar-link">Payment Logs</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Payment Settings</a>
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
                            <a href="<?= ROOT ?>/track" class="sidebar-link">Student</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Admin</a>
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
                <span>Dashboard</span><br>
                <small>Welcome back! Here's an overview of your activity.</small>
            </div>
            <div class="page-content">
                <!-- Analytics Cards -->
                <div class="analytics">
                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                        </div>
                        <div class="card-progress">
                            <small>Total Student</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                        </div>
                        <div class="card-progress">
                            <small>Total Request</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                        </div>
                        <div class="card-progress">
                            <small>Total Pending</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                        </div>
                        <div class="card-progress">
                            <small>Total Completed</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                        </div>
                        <div class="card-progress">
                            <small>Ready to Pickup</small>
                        </div>
                    </div>
                </div>
                <!-- Records Table -->
                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <span>Most Recent Actions</span>
                        </div>
                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>
                    </div>
                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Student Name</th>
                                    <th>Document Type</th>
                                    <th>Requested Date</th>
                                    <th>Action</th>
                                </tr>       
                            </thead>
                            <tbody>
                                <?php if (!empty($requests)) { ?>
                                    <?php foreach ($requests as $item) { ?>
                                        <tr>
                                            <td><?= $item->request_id ?></td> <!-- Request ID -->
                                            <td><?= $item->lastname ?>, <?= $item->firstname ?></td> <!-- Student Name -->
                                            <td><?= $item->document_type ?></td> <!-- Document Type -->
                                            <td><?= $item->status ?></td> <!-- Request Status -->
                                            <td>
                                                <a href="<?= ROOT ?>/requests/edit/<?= $item->request_id ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="<?= ROOT ?>/requests/delete/<?= $item->request_id ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5">
                                            <h3>No records found.</h3>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php include PATH . "/partials/footer.php" ?>