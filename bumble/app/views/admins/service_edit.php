<?php include "partials/header.php" ?>

<div class="userlist">

    <form action="" method="POST" class="mt-5 w-50 mx-auto">
        <h2>Edit Service</h2>

        <div class="mb-2">
            <label for="">Service Status</label>
            <select name="status" class="form-control">
                <option value="">Select a status</option>
                <option <?= $service->status == 'Available' ? 'selected' : '' ?> value="Available">Available</option>
                <option <?= $service->status == 'Not Available' ? 'selected' : '' ?> value="Not Available">Not Available</option>
            </select>
        </div>

        <div class="mb-2">
            <label for="">Service</label>
            <input name="service" value="<?= $service->service ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Vehicle</label>
            <input name="vehicle" value="<?= $service->vehicle ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Price</label>
            <input name="price" value="<?= $service->price ?>" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

<?php include "partials/footer.php" ?>