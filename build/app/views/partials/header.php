<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
        }

        .sidebar {
            height: 100vh;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar img {
            width: 80px;
            margin: 10px auto;
            display: block;
            border-radius: 50%;
        }

        .sidebar h5 {
            text-align: center;
            color: #4caf50;
            margin-top: 10px;
        }

        .nav-link {
            color: #4caf50;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .nav-link:hover {
            background-color: #f1f8e9;
        }

        .nav-link i {
            margin-right: 10px;
        }

        .nav-link.active {
            background-color: #4caf50;
            color: #ffffff !important;
        }

        .logout {
            margin-top: auto;
        }

        .logout .nav-link {
            color: black !important;
        }

        .new-badge {
            margin-left: auto;
            font-size: 12px;
            color: white;
            background-color: #ff5722;
            border-radius: 12px;
            padding: 2px 8px;
        }

        .main-content {
            margin-left: 250px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <div>
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="Logo">
            <h5>Document Request System</h5>
            <p class="text-center text-muted">Bulacan Polytechnic College</p>
            <nav class="nav flex-column">
                <a href="#" class="nav-link active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="#" class="nav-link"><i class="fas fa-file-alt"></i> Request Documents</a>
                <a href="#" class="nav-link"><i class="fas fa-tasks"></i> Track Requests</a>
                <a href="#" class="nav-link"><i class="fas fa-history"></i> Request History</a>
                <a href="#" class="nav-link"><i class="fas fa-bell"></i> Notifications</a>
                <a href="#" class="nav-link"><i class="fas fa-cogs"></i> Settings</a>
            </nav>
        </div>

        <div class="logout">
            <a href="<?= ROOT ?>/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <?php include "../app/views/partials/footer.php" ?>