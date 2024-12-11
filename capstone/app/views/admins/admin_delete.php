<?php include "partials/header.php" ?>

<div class="container">

  <form action="" method="POST" class="mt-5 w-50 mx-auto">
    <h2>Delete User</h2>

    <div class="mb-2">
      <label for="">Username</label>
      <input name="admin_name" disabled value="<?= $admin->admin_name ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">First Name</label>
      <input name="admin_fn" disabled value="<?= $admin->admin_fn ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Last Name</label>
      <input name="admin_ln" disabled value="<?= $admin->admin_ln ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Email</label>
      <input name="admin_email" disabled value="<?= $admin->admin_email ?>" type="email" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Phone Number</label>
      <input name="admin_number" disabled value="<?= $admin->admin_number ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Password</label>
      <input name="admin_password" disabled value="<?= $admin->admin_password ?>" type="password" class="form-control">
    </div>
    <input type="hidden" name="id" value="<?= $admin->id ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>

</div>

<?php include "partials/footer.php" ?>