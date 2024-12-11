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
          <a class="navbar-brand" href="<?= ROOT ?>/users" id="logo"><span>Admin</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">

          <?php if (!empty($_SESSION['USER'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/books">Dashboard</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/users">User List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/about">Appointment List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/contact">Messages</a>
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

<div class="container">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2>List of Users</h2>

    <a href="<?= ROOT ?>/users/create" class="btn btn-primary">Add New</a>
  </div>

  <table class="table table-striped mt-3">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Image</th>
      <th></th>
    </tr>
    <?php if ($users != null) { ?>
      <?php foreach ($users as $item) { ?>
        <tr>
          <td><?= $item->firstname ?></td>
          <td><?= $item->lastname ?></td>
          <td><?= $item->email ?></td>
          <td>
            <img width="50px" height="50px" src="<?= ROOT ?>/<?= $item->image ?>" alt="">
          </td>
          <td>
            <a href="<?= ROOT ?>/users/edit/<?= $item->id ?>" class="btn btn-success btn-sm">Edit</a>
            <a href="<?= ROOT ?>/users/delete/<?= $item->id ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="3">
          <h3>No record found.</h3>
        </td>
      </tr>
    <?php } ?>
  </table>

</div>

<script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>