<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME ?></title>

  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">

  <link rel="stylesheet" href="<?= ROOT ?>/assets/js/main.js">

  <!-- Font Awesome Cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Font Awesome Cdn -->

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- Google Fonts -->
</head>

<body>
  <!-- HEADER -->
  <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="<?= ROOT ?>/home" id="logo"><span>B</span>umble<span>W</span>ash</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">

          <?php if (!empty($_SESSION['USER'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/services">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/books">Book Appointment</a>
              </li>
          <?php endif; ?>
        </ul>
        <form class="d-flex">
        <?php if (empty($_SESSION['USER'])): ?>
          
          <a href="<?= ROOT ?>/login" class="btn btn-secondary">Login</a>

        <?php else: ?>

          <a href="<?= ROOT ?>/logout" class="btn btn-secondary">Logout</a>
          
        <?php endif; ?>
        </form>
      </div>
    </div>
  </nav>
  <!-- END OF HEADER -->