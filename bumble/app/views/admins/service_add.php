<?php include "partials/header.php" ?>

<div class="container">

    <form action="" method="POST" enctype="multipart/form-data" class="mt-5 w-50 mx-auto">
        <h2>Add Service</h2>

        <?php if (!empty($errors)): ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">

                <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                <?php endforeach; ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>

        <input type="hidden" name="service_token">
        
        <div class="mb-2">
            <label for="">Status</label>
            <select name="status" class="form-control">
                <option selected disabled>Service Status</option>
                <option <?= get_select('status', 'Available') ?> value="Available">Available</option>
                <option <?= get_select('status', 'Not Available') ?> value="Not Available">Not Available</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">Service</label>
            <input name="document" value="<?= get_var('document') ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="Price">Price</label>
            <input name="price" value="<?= get_var('price') ?>" type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>

<?php "partials/footer.php" ?>