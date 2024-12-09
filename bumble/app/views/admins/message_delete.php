<?php include "partials/header.php" ?>

<div class="userlist">

  <form action="" method="POST" class="mt-5 w-50 mx-auto">
    <h2>Delete Message</h2>

    <div class="mb-2">
      <label for="">Username</label>
      <input name="username" disabled value="<?= $message->username ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Phone Number</label>
      <input name="number" disabled value="<?= $message->number ?>" type="text" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Email</label>
      <input name="email" disabled value="<?= $message->email ?>" type="email" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Message</label>
      <input name="message" disabled value="<?= $message->message ?>" type="textarea" class="form-control">
    </div>
    <input type="hidden" name="id" value="<?= $message->id ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>

</div>

<?php include "partials/footer.php" ?>