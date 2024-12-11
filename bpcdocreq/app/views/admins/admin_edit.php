<?php include "partials/header.php" ?>

<div class="userlist">

    <form action="" method="POST" class="mt-5 w-50 mx-auto">
        <h2>Edit User</h2>

        <div class="mb-2">
            <label for="">Role</label>
            <select name="admin_role" class="form-control">
                <option value="">Select a Role</option>
                <option <?= $admin->admin_role == 'Registrar' ? 'selected' : '' ?> value="Registrar">Registrar</option>
                <option <?= $admin->admin_role == 'Cashier' ? 'selected' : '' ?> value="Cashier">Cashier</option>
                <option <?= $admin->admin_role == 'Super Admin' ? 'selected' : '' ?> value="Super Admin">Super Admin</option>
            </select>
        </div>

        <div class="mb-2">
            <label for="">Username</label>
            <input name="admin_name" value="<?= $admin->admin_name ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">First Name</label>
            <input name="admin_fn" value="<?= $admin->admin_fn ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Last Name</label>
            <input name="admin_ln" value="<?= $admin->admin_ln ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Email</label>
            <input name="admin_email" value="<?= $admin->admin_email ?>" type="email" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Phone Number</label>
            <input name="admin_number" value="<?= $admin->admin_number ?>" type="text" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Password</label>
            <input name="admin_password" value="<?= $admin->admin_password ?>" type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

<?php include "partials/footer.php" ?>