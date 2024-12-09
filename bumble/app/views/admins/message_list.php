<?php include "partials/header.php" ?>

<div class="userlist">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2>Messages</h2>
    <form class="d-flex" role="search" method="GET" action="<?= ROOT ?>/admins/message_list">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-dark" type="submit">Search</button>
    </form>
  </div>

  <table class="table table-striped mt-3">
    <tr>
      <th>Username</th>
      <th>Phone Number</th>
      <th>Email</th>
      <th>Messages</th>
      <th></th>
    </tr>
    <?php if ($messages != null) { ?>
      <?php foreach ($messages as $item) { ?>
        <tr>
          <td><?= $item->username ?></td>
          <td><?= $item->number ?></td>
          <td><?= $item->email ?></td>
          <td><?= $item->message ?></td>
          <td>
            <a href="<?= ROOT ?>/admins/message_delete/<?= $item->id ?>" class="btn btn-danger btn-sm">Delete</a>
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