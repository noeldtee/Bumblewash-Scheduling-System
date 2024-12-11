<?php include "partials/header.php" ?>

<div class="container">

    <form action="" method="POST" enctype="multipart/form-data" class="mt-5 w-50 mx-auto">
        <h2>Create User</h2>

        <?php if (!empty($errors)): ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">

                <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                <?php endforeach; ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>

        <input type="hidden" name="admin_token">

        <div class="mb-2">
            <label for="">Role</label>
            <select name="admin_role" class="form-control">
                <option selected disabled="">Select a Role</option>
                <option <?= get_select('admin_role', 'Registrar') ?> value="Registrar">Registrar</option>
                <option <?= get_select('admin_role', 'Cashier') ?> value="Cashier">Cashier</option>
                <option <?= get_select('admin_role', 'Admin') ?> value="Admin">Admin</option>
            </select>
        </div>

        <div class="mb-2">
            <label for="">Username</label>
            <input name="admin_name" value="<?= get_var('admin_name') ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">First Name</label>
            <input name="admin_fn" value="<?= get_var('admin_fn') ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Last Name</label>
            <input name="admin_ln" value="<?= get_var('admin_ln') ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Email</label>
            <input name="admin_email" value="<?= get_var('admin_email') ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Phone Number</label>
            <input name="admin_number" value="<?= get_var('admin_number') ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Password</label>
            <input name="admin_password" value="<?= get_var('admin_password') ?>" type="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>

<?php "partials/footer.php" ?>