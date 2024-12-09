<?php include "partials/header.php" ?>

<div class="userlist">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2>List of Users</h2>
    <form class="d-flex" role="search" method="GET" action="<?= ROOT ?>/admins/user_list">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-dark" type="submit">Search</button>
    </form>

    <a href="<?= ROOT ?>/admins/create" class="btn btn-primary">Add New</a>
  </div>

  <table class="table table-striped mt-3">
    <tr>
      <th>Student ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Course</th>
      <th>Year</th>
      <th>Section</th>
      <th>Action</th>
    </tr>
    <?php if ($users != null) { ?>
      <?php foreach ($users as $item) { ?>
        <tr>
          <td><?= $item->student_id ?></td>
          <td><?= $item->student_firstname ?></td>
          <td><?= $item->student_lastname ?></td>
          <td><?= $item->student_email ?></td>
          <td><?= $item->student_number ?></td>
          <td><?= $item->course ?></td>
          <td><?= $item->year_level ?></td>
          <td><?= $item->section ?></td>
          <td>
            <a href="<?= ROOT ?>/admins/user_delete/<?= $item->id ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="9">
          <h3>No record found.</h3>
        </td>
      </tr>
    <?php } ?>
  </table>

</div>

<?php include "partials/footer.php" ?>