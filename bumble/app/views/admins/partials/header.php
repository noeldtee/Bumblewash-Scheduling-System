<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Portal</title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin_dashboard.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="side-content">
            <div class="profile">
                <!-- Logo -->
                <div class="profile-img bg-img" style="background-image: url(<?= ROOT ?>/assets/images/logo.png);"></div>
                <h5>Smart Document Request System</h5>

            </div>
            <div class="side-menu">
                <ul class="container">
                    <li>
                        <a href="<?= ROOT ?>/admins/dashboard" class="">
                        <i class="fa-solid fa-chart-line"></i>
                        <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/admins/booking_list" class="">
                        <i class="fa-solid fa-chart-line"></i>
                        <small>Request Management</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/admins/service">
                        <i class="fa-solid fa-folder-open"></i>
                            <small>Document Management</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/admins/dashboard" class="">
                        <i class="fa-solid fa-chart-line"></i>
                        <small>Payment Management</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/admins/user_list" class="">
                        <i class="fa-solid fa-chart-line"></i>
                        <small>Student Management</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/admins/admin_list" class="">
                        <i class="fa-solid fa-chart-line"></i>
                        <small>Admin Management</small>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="<?= ROOT ?>/logout">
                        <i class="fa-solid fa-right-from-bracket" ></i>
                            <small>Logout</small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
