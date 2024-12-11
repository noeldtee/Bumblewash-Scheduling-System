<?php include "partials/header.php" ?>

<div class="userlist">
  <form action="" method="POST" class="w-50 mx-auto">
    <h2>Edit Booking</h2>
    <div class="mb-2">
            <select name="book_status" class="form-control">
                <option value="">Status</option>
                <option <?= $book->book_status == 'Accept' ? 'selected' : '' ?> value="Accept">Accept</option>
                <option <?= $book->book_status == 'Reject' ? 'selected' : '' ?> value="Reject">Reject</option>
            </select>
        </div>

        <div class="mb-2">
            <label for="">Book Name</label>
            <input name="book_name" value="<?= $book->book_name ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Email</label>
            <input name="book_email" value="<?= $book->book_email ?>" type="email" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Phone Number</label>
            <input name="book_number" value="<?= $book->book_number ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Service</label>
            <input name="book_services" value="<?= $book->book_services ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Vehicle Type</label>
            <input name="book_vehicle" value="<?= $book->book_vehicle ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Price</label>
            <input name="book_price" value="<?= $book->book_price ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Date</label>
            <input name="book_date" value="<?= $book->book_date ?>" type="date" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Time</label>
            <input name="book_time" value="<?= $book->book_time ?>" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

  <?php include "partials/footer.php" ?>