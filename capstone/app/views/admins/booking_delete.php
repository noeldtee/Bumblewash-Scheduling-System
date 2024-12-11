<?php include "partials/header.php" ?>

<div class="userlist">
  <form action="" method="POST" class="w-50 mx-auto">
    <h2>Delete book</h2>
    <div class="mb-2">
      <label for="">Book Name</label>
      <input type="text" name="book_name" disabled value="<?= $book->book_name ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Email</label>
      <input type="text" name="book_email" disabled value="<?= $book->book_email ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Phone Number</label>
      <input type="text" name="book_number" disabled value="<?= $book->book_number ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Services</label>
      <input type="text" name="book_services" disabled value="<?= $book->book_services ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Vehicle</label>
      <input type="text" name="book_vehicle" disabled value="<?= $book->book_vehicle ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Date</label>
      <input type="text" name="book_date" disabled value="<?= $book->book_date ?>" class="form-control">
    </div>
    <div class="mb-2">
      <label for="">Time</label>
      <input type="text" name="book_time" disabled value="<?= $book->book_time ?>" class="form-control">
    </div>


    <input type="hidden" name="id" value="<?= $book->id ?>">
    <button class="btn btn-danger" type="submit">Delete</button>
  </form>
</div>

<?php include "partials/footer.php" ?>