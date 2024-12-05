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
                        <a href="<?= ROOT ?>/student/dashboard">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/request" class="active">
                            <span class="las la-file-alt"></span>
                            <small>Request a Document</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/track">
                            <span class="las la-search"></span>
                            <small>Track Your Request</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/payment">
                            <span class="las la-wallet"></span>
                            <small>Payment History</small>
                        </a>
                    <li>
                        <a href="<?= ROOT ?>/student/history">
                            <span class="las la-history"></span>
                            <small>Request History</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/student/setting">
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
                        <h3>Hello, Noel</h3>
                        <a href="" class="bg-img" style="background-image: url(<?= ROOT ?>/assets/images/logo.png);"></a>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="page-header">
                <h1>Request Document</h1>
                <small>Fill out the form below to request your document</small>
            </div>
            <div class="page-content">
                <!-- Request Form -->
                <form action="submit-request.php" method="POST" class="form-container">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="student-name" class="form-label">First Name</label>
                            <input type="text" id="student-name" name="student_name" class="form-control" placeholder="Enter your first name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="student-number" class="form-label">Last Name</label>
                            <input type="text" id="student-number" name="student_number" class="form-control" placeholder="Enter your last name" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="student-name" class="form-label">Email</label>
                            <input type="text" id="student-name" name="student_name" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="student-number" class="form-label">Contact Number</label>
                            <input type="text" id="student-number" name="student_number" class="form-control" placeholder="Enter your contact number" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="student-name" class="form-label">Student ID</label>
                            <input type="text" id="student-name" name="student_name" class="form-control" placeholder="Enter your student id" required>
                        </div>
                        <div class="col-md-6">
                            <label for="student-number" class="form-label">Year Level</label>
                            <input type="text" id="student-number" name="student_number" class="form-control" placeholder="Enter your year level" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="student-name" class="form-label">Course</label>
                            <input type="text" id="student-name" name="student_name" class="form-control" placeholder="Enter your course" required>
                        </div>
                        <div class="col-md-6">
                            <label for="student-number" class="form-label">Section</label>
                            <input type="text" id="student-number" name="student_number" class="form-control" placeholder="Enter your section" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="document-type" class="form-label">Select Document</label>   
                            <select id="document-type" name="document_type" class="form-select" required onchange="updatePrice()">
                                <option value="">Choose a document</option>
                                <option value="coe">Certificate of Enrollment</option>
                                <option value="cor">Certificate of Registration</option>
                                <option value="gm">Good Moral Certificate</option>
                                <option value="tor">Transcript of Records</option>
                            </select>
                        </div>
                        <div id="price-display" class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" class="form-control" placeholder="Price will be displayed here" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </main>
    </div>

    <script>
        // JavaScript to update price based on selected document type
        function updatePrice() {
            const documentType = document.getElementById("document-type").value;
            const priceField = document.getElementById("price");

            let price = 0;

            switch (documentType) {
                case 'coe':
                    price = 100; // Example price for Certificate of Enrollment
                    break;
                case 'cor':
                    price = 150; // Example price for Certificate of Registration
                    break;
                case 'gm':
                    price = 120; // Example price for Good Moral Certificate
                    break;
                case 'tor':
                    price = 200; // Example price for Transcript of Records
                    break;
                default:
                    price = 0;
            }

            // Display the price in the input field
            priceField.value = price > 0 ? `₱${price}` : "Select a document to see price";
        }
    </script>

<?php include PATH . "/partials/footer.php" ?>