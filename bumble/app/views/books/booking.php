<?php include PATH . "partials/header.php" ?>

<section class="book" id="book">
    <div class="container">
        <form id="bookForm" action="<?= ROOT ?>/books/book" method="POST" enctype="multipart/form-data">
            <div class="main-text">
                <h1>Book Appointment</h1>
            </div>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <?= $error . "<br>" ?>
                    <?php endforeach; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="row"> 
                <div class="col-md-6 py-3 py-md-0">
                    <div class="card">
                        <img src="<?= ROOT ?>/assets/images/b3.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 py-3 py-md-0">
                  <div class="mb-2">
                    <label for="">Username</label>
                    <input name="book_name" value="<?= get_var('book_name') ?>"type="text" class="form-control">
                  </div>
                  <div class="mb-2">
                    <label for="">Email</label>
                    <input name="book_email" value="<?= $_SESSION['USER']->email ?>" type="email" class="form-control" readonly>
                    <input type="hidden" name="book_email" value="<?= $_SESSION['USER']->email ?>">
                  <div class="mb-2">
                    <label for="">Phone Number</label>
                    <input name="book_number" value="<?= $_SESSION['USER']->number ?>" type="text" class="form-control" readonly>
                    <input type="hidden" name="book_number" value="<?= $_SESSION['USER']->number ?>">
                  </div>
                  <div class="mb-2">
                    <label for="">Select Services</label>
                    <select id="book_services" name="book_services" class="form-select">
                    <option value="">Select a Service</option>
                    <?php
                    $db = new Database();
                    $connection = $db->connect();

                    $query = "SELECT DISTINCT service FROM services WHERE status = 'Available'"; // Include status condition
                    $result = $connection->query($query);

                    if ($result) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $service = $row['service'];
                            echo '<option value="' . $service . '">' . $service . '</option>';
                        }
                    } else {
                        echo "Error fetching services: " . $connection->errorInfo()[2];
                    }
                    ?>
                    </select>
                    </div>
                    <div class="mb-2">
                        <label for="">Type of Vehicle:</label>
                        <select id="book_vehicle" name="book_vehicle" class="form-select">
                            <option value="">Type of Vehicle</option>
                            <?php
                            $db = new Database();
                            $connection = $db->connect();

                            $query = "SELECT DISTINCT vehicle FROM services WHERE status = 'Available'"; // Include status condition
                            $result = $connection->query($query);

                            if ($result) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $vehicle = $row['vehicle'];
                                    echo '<option value="' . $vehicle . '">' . $vehicle . '</option>';
                                }
                            } else {
                                echo "Error fetching vehicles: " . $connection->errorInfo()[2];
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                    <label for="">Price</label>
                    <input id="price" name="book_price" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-floating">
                    <input type="date" class="form-control" name="book_date" placeholder="Select Date" required><br>
                    <label for="floatingInput">Choose a Date</label>
                  </div>
                    <div class="form-floating">
                        <select class="form-select" name="book_time" id="floating_Select" aria-label="Floating label select example">
                            <option <?= get_select('book_time', '10:00am - 11:00am') ?> selected value="10:00am - 11:00am">10:00am - 11:00am</option>
                            <option <?= get_select('book_time', '11:00am - 12:00pm') ?> value="11:00am - 12:00pm">11:00am - 12:00pmm</option>
                            <option <?= get_select('book_time', '12:00pm - 1:00pm') ?> value="12:00pm - 1:00pm">12:00pm - 1:00pm</option>
                            <option <?= get_select('book_time', '1:00pm - 2:00pm') ?> value="1:00pm - 2:00pm">1:00pm - 2:00pm</option>
                            <option <?= get_select('book_time', '2:00pm - 3:00pm') ?> value="2:00pm - 3:00pm">2:00pm - 3:00pm</option>
                            <option <?= get_select('book_time', '3:00pm - 4:00pm') ?> value="3:00pm - 4:00pm">3:00pm - 4:00pm</option>
                        </select>
                        <label for="floatingSelect">Select Time</label>
                    </div><br>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input \" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" href="terms_and_conditions.html" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                        <input type="submit" value="Book Now" class="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    document.getElementById('book_services').addEventListener('change', fetchPrice);
    document.getElementById('book_vehicle').addEventListener('change', fetchPrice);

    function fetchPrice() {
        var service = document.getElementById('book_services').value;
        var vehicle = document.getElementById('book_vehicle').value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('price').value = xhr.responseText;
            }
        };
        xhr.open('GET', '<?= ROOT ?>/Books/getPrice?service=' + encodeURIComponent(service) + '&vehicle=' + encodeURIComponent(vehicle), true);
        xhr.send();
    }
</script>

<?php include PATH . "partials/footer.php" ?>