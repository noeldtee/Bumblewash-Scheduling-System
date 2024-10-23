<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin.css">
</head>

<body>

<?php if (!empty($_SESSION['ADMIN'])): ?>
<div class="header">
        <div class="side-nav">
            <div class="user">
            </div>
            <ul>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/admins">Dashboard</a></li>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/admins/user_list">User List</a></li>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/admins/admin_list">Admin List</a></li>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/admins/booking_list">Booking List</a></li>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/admins/message_list">Message List</a></li>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/admins/service">Services</a></li>
            <li><a class="nav-link active" aria-current="page" href="<?= ROOT ?>/alogout">Logout</a></li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
  </div>

      </div>
    </div>
  </nav>