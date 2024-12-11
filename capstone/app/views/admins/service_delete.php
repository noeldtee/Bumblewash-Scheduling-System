<?php include "partials/header.php" ?>

<div class="userlist">

  <form action="" method="POST" class="mt-5 w-50 mx-auto">
    <h2>Delete Service</h2>

    <div class="mb-2">
      <label for="">Document</label>
      <input name="document" disabled value="<?= $service->document ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Price</label>
      <input name="price" disabled value="<?= $service->price ?>" type="text" class="form-control">
    </div>
    <input type="hidden" name="id" value="<?= $service->id ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>

</div>

<?php include "partials/footer.php" ?>