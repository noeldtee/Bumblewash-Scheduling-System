<?php include PATH . "partials/header.php" ?>

<div class="container" id="contact">
<form action="" method="POST" >
            <h1 class="text-center">CONTACT US</h1>
            <?php if (!empty($errors)): ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">

                <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                <?php endforeach; ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php endif; ?>


            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 py-3 py-md-0">
                    <label for="">Username</label>
                    <input name="username" value="<?= $_SESSION['USER']->username ?>"type="text" class="form-control" readonly>
                    <input type="hidden" name="username" value="<?= $_SESSION['USER']->username ?>">
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <label for="">Email</label>
                    <input name="email" value="<?= $_SESSION['USER']->email ?>" type="email" class="form-control" readonly>
                    <input type="hidden" name="email" value="<?= $_SESSION['USER']->email ?>">
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <label for="">Phone Number</label>
                    <input name="number" value="<?= $_SESSION['USER']->number ?>" type="text" class="form-control" readonly>
                    <input type="hidden" name="number" value="<?= $_SESSION['USER']->number ?>">
                </div>
               <div class="form-group" style="margin-top: 30px;">
                <textarea name="message" value="<?= get_var('message') ?>" class="form-control" id=""rows="5" placeholder="Message"></textarea>
                </div>
            <div id="messagebtn" class="text-center"><button type="submit">Message</button></div>
            </div>
            </form>
        </div>

        
<?php include PATH . "partials/footer.php" ?>