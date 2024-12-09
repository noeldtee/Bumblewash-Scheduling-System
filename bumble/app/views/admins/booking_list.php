<?php include "partials/header.php" ?>

<div class="userlist">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2>Request List</h2>
    <form class="d-flex" role="search" method="GET" action="<?= ROOT ?>/admins/booking_list">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-dark" type="submit">Search</button>
    </form>
    <a href="<?= ROOT ?>/admins/create" class="btn btn-primary">Add New</a>
  </div>

  <table class="table table-striped mt-3">
    <tr>
      <th>Document</th>
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Price</th>
      <th>Requested Date</th>
      <th></th>
    </tr>
    <?php if ($books != null) { ?>
      <?php foreach ($books as $item) { ?>
        <tr>
          <td><?= $item->book_document ?></td>
          <td><?= $item->student_id ?></td>
          <td><?= $item->book_lname?>, <?= $item->book_fname?></td>
          <td><?= $item->price ?></td>
          <td><?= $item->book_date ?></td>
          <td>
            <a href="<?= ROOT ?>/admins/booking_edit/<?= $item->id ?>" class="btn btn-success btn-sm">Edit</a>
            <a href="<?= ROOT ?>/admins/booking_delete/<?= $item->id ?>" class="btn btn-danger btn-sm">Delete</a>
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