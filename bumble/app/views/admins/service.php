<?php include "partials/header.php" ?>

<div class="userlist">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2>Services</h2>
    <form class="d-flex" role="search" method="GET" action="<?= ROOT ?>/admins/service">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-dark" type="submit">Search</button>
    </form>

    <a href="<?= ROOT ?>/admins/service_add" class="btn btn-primary">Add New</a>
  </div>

  <table class="table table-striped mt-3">
    <tr>
      <th>Service</th>
      <th>Vehicle</th>
      <th>Price</th>
      <th>Status</th>
      <th></th>
    </tr>
    <?php if ($services != null) { ?>
      <?php foreach ($services as $item) { ?>
        <tr>
          <td><?= $item->service ?></td>
          <td><?= $item->vehicle ?></td>
          <td><?= $item->price ?></td>
          <td><?= $item->status ?></td>
          <td>
            <a href="<?= ROOT ?>/admins/service_edit/<?= $item->id ?>" class="btn btn-success btn-sm">Edit</a>
            <a href="<?= ROOT ?>/admins/service_delete/<?= $item->id ?>" class="btn btn-danger btn-sm">Delete</a>
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