<?php include PATH . "/partials/sidenav.php" ?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/request.css">
<!-- Sidebar -->
<div class="sidebar">
    <div class="side-content">
        <div class="profile">
            <!-- Logo -->
            <div class="profile-img bg-img" style="background-image: url(<?= ROOT ?>/assets/images/logo.png);"></div>
            <h5>Smart Document Request System</h>

        </div>
        <div class="side-menu">
            <ul class="container">
                <li>
                    <a href="<?= ROOT ?>/dashboard">
                        <span class="las la-home"></span>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/request" class="active">
                        <span class="las la-file-alt"></span>
                        <small>Request a Document</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/track">
                        <span class="las la-search"></span>
                        <small>Track Your Request</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/payments/payment">
                        <span class="las la-wallet"></span>
                        <small>Payment History</small>
                    </a>
                <li>
                    <a href="<?= ROOT ?>/history">
                        <span class="las la-history"></span>
                        <small>Request History</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/setting">
                        <span class="las la-cog"></span>
                        <small>Settings</small>
                    </a>
                </li>
                <li class="logout">
                    <a href="<?= ROOT ?>/logout">
                        <span class="las la-sign-out-alt"></span>
                        <small>Logout</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="main-content">
    <header>
        <div class="header-content">
            <label for="menu-toggle" class="toggle">
                <span class="las la-bars"></span>
            </label>
            <div class="header-menu">
                <div class="notify-icon">
                    <span class="las la-bell"></span>
                    <span class="notify">3</span>
                </div>
                <div class="user">
                    <h3>Hello, <?= $_SESSION['USER']->student_firstname ?>!</h3>
                    <a href="" class="bg-img" style="background-image: url(<?= $_SESSION['USER']->student_profile ?>);"></a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="page-header">
            <h1>Request Document</h1>
            <small>Fill out the form below to request your document</small>
        </div>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php foreach ($errors as $error): ?>
                    <?= $error . "<br>" ?>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="page-content">
            <!-- Request Form -->
            <form action="<?= ROOT ?>/books/request" method="POST" class="form-container">
                <h3>Personal Information</h3>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input name="book_fname" value="<?= $_SESSION['USER']->student_firstname ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="book_fname" value="<?= $_SESSION['USER']->student_firstname ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="book_lname" value="<?= $_SESSION['USER']->student_lastname ?>" class="form-control" readonly>
                        <input type="hidden" name="book_lname" value="<?= $_SESSION['USER']->student_lastname ?>">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="book_email" value="<?= $_SESSION['USER']->student_email ?>" type="email" class="form-control" readonly>
                        <input type="hidden" name="book_email" value="<?= $_SESSION['USER']->student_email ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input name="book_number" value="<?= $_SESSION['USER']->student_number ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="book_number" value="<?= $_SESSION['USER']->student_number ?>">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Student ID</label>
                        <input name="student_id" value="<?= $_SESSION['USER']->student_id ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="student_id" value="<?= $_SESSION['USER']->student_id ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Year Level</label>
                        <input name="year_level" value="<?= $_SESSION['USER']->year_level ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="year_level" value="<?= $_SESSION['USER']->year_level ?>">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <input name="course" value="<?= $_SESSION['USER']->course ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="course" value="<?= $_SESSION['USER']->course ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <input name="section" value="<?= $_SESSION['USER']->section ?>" type="text" class="form-control" readonly>
                        <input type="hidden" name="section" value="<?= $_SESSION['USER']->section ?>">
                    </div>
                </div>
                <h3>Document Information</h3>
                <div class="row g-3 mb-3" id="document-container">
                    <label for="">Select Document</label>
                    <div id="document-container">
                        <div class="input-group mb-3">
                            <select id="book_document" name="book_document[]" class="form-select">
                                <option selected disabled>Select a Document</option>
                                <?php
                                $db = new Database();
                                $connection = $db->connect();

                                $query = "SELECT DISTINCT document FROM services WHERE status = 'Available'";
                                $result = $connection->query($query);

                                if ($result) {
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        $document = $row['document'];
                                        echo '<option value="' . $document . '">' . $document . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <input type="text" id="price" name="price[]" class="form-control" placeholder="Price will be displayed here" readonly>
                            <button class="btn btn-outline-secondary add-more" type="button">Add More</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Purpose for Requesting</label>
                        <textarea class="form-control" name="purpose" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('document-container');

    // Event delegation for "Add More" button
    container.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('add-more')) {
            addMoreDocumentDropdown(e.target.closest('.input-group'));
        }
    });

    // Dynamically add a new input group
    function addMoreDocumentDropdown(currentGroup) {
        const newInputGroup = document.createElement('div');
        newInputGroup.classList.add('input-group', 'mb-3');

        // Dropdown for document selection
        const newDropdown = document.createElement('select');
        newDropdown.classList.add('form-select');
        newDropdown.name = 'book_document[]';
        newDropdown.innerHTML = `
            <option selected disabled>Select a Document</option>
            <?php
            $db = new Database();
            $connection = $db->connect();

            $query = "SELECT DISTINCT document FROM services WHERE status = 'Available'";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $document = $row['document'];
                    echo '<option value="' . $document . '">' . $document . '</option>';
                }
            }
            ?>
        `;

        // Input for price
        const newPriceInput = document.createElement('input');
        newPriceInput.type = 'text';
        newPriceInput.name = 'price[]';
        newPriceInput.classList.add('form-control');
        newPriceInput.placeholder = 'Price will be displayed here';
        newPriceInput.readOnly = true;

        // "Add More" button
        const newButton = document.createElement('button');
        newButton.type = 'button';
        newButton.classList.add('btn', 'btn-outline-secondary', 'add-more');
        newButton.textContent = 'Add More';

        // Append elements to the new input group
        newInputGroup.appendChild(newDropdown);
        newInputGroup.appendChild(newPriceInput);
        newInputGroup.appendChild(newButton);

        // Insert new group after the current group
        currentGroup.parentNode.insertBefore(newInputGroup, currentGroup.nextSibling);

        // Attach event listener to fetch price for the new dropdown
        newDropdown.addEventListener('change', fetchPrice);
    }

    // Fetch price dynamically when a document is selected
    function fetchPrice(event) {
        const dropdown = event.target; // The dropdown that triggered the change
        const documentName = dropdown.value;
        const priceInput = dropdown.nextElementSibling; // The corresponding price input

        if (documentName) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    priceInput.value = xhr.responseText;
                }
            };
            xhr.open('GET', '<?= ROOT ?>/Books/getPrice?service=' + encodeURIComponent(documentName), true);
            xhr.send();
        }
    }

    // Attach fetchPrice to the initial dropdown
    const initialDropdown = document.querySelector('#book_document');
    if (initialDropdown) {
        initialDropdown.addEventListener('change', fetchPrice);
    }
});
</script>

<?php include PATH . "partials/footer.php" ?>