<?php include PATH . "/partials/sidenav.php" ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/track.css">
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
                    <a href="<?= ROOT ?>/books/request">
                        <span class="las la-file-alt"></span>
                        <small>Request a Document</small>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/track" class="active">
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
            <h1>Track Your Request</h1>
            <small>Check the status of your document request here.</small>
        </div>
        <div class="m-3 d-flex justify-content-between align-requests-center">
            <h3>Request List</h3>
            <div class="float-end d-flex">
                <form class="d-flex position-relative" role="search" method="GET" action="<?= ROOT ?>/track" id="searchForm">
                    <div class="position-relative">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                            name="search"
                            value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                            id="searchInput">
                        <!-- Clear Button -->
                        <button
                            type="button"
                            class="btn position-absolute top-50 translate-middle-y end-0"
                            aria-label="Clear search"
                            onclick="clearSearchAndSubmit()"
                            style="background: none; border: none; font-size: 1.5rem; color: #6c757d; cursor: pointer; margin-right: .6rem; margin-top: 2px;">
                            &times;
                        </button>
                    </div>
                    <button class="btn btn-outline-dark ms-2" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- Modal -->


        <div class="page-content">
            <!-- Document Requests Table -->
            <div class="records table-responsive">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Document Requested</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>Pickup Date</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['documentRequests'])): ?>
                            <?php foreach ($data['documentRequests'] as $request): ?>
                                <tr>
                                    <td><?php echo str_replace(',', ', ', htmlspecialchars($request->book_document)); ?></td>
                                    <td><?= htmlspecialchars(date('Y-m-d', strtotime($request->created_at))); ?></td>
                                    <td><?= htmlspecialchars(ucfirst($request->book_status)); ?></td>
                                    <td>
                                    <?= htmlspecialchars(ucfirst($request->pickup_date)); ?>
                                    </td>
                                    <td><?= htmlspecialchars(ucfirst($request->payment_status)); ?></td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            data-id="<?= $request->id ?>"
                                            data-created_at="<?= htmlspecialchars($request->created_at) ?>"
                                            data-book_fname="<?= htmlspecialchars($request->book_fname) ?>"
                                            data-book_lname="<?= htmlspecialchars($request->book_lname) ?>"
                                            data-book_email="<?= htmlspecialchars($request->book_email) ?>"
                                            data-book_number="<?= htmlspecialchars($request->book_number) ?>"
                                            data-student_birthdate="<?= htmlspecialchars($request->student_birthdate) ?>"
                                            data-student_id="<?= htmlspecialchars($request->student_id) ?>"
                                            data-year_level="<?= htmlspecialchars($request->year_level) ?>"
                                            data-course="<?= htmlspecialchars($request->course) ?>"
                                            data-section="<?= htmlspecialchars($request->section) ?>"
                                            data-book_document="<?= htmlspecialchars($request->book_document) ?>"
                                            data-book_status="<?= htmlspecialchars($request->book_status) ?>"
                                            data-price="<?= htmlspecialchars($request->price) ?>"
                                            data-payment_status="<?= htmlspecialchars($request->payment_status) ?>"
                                            data-purpose="<?= htmlspecialchars($request->purpose) ?>"
                                            data-pickup_date="<?= htmlspecialchars($request->pickup_date) ?>">
                                            View Information
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No document requests found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="card2">
                    <div class="card-head2">
                        <a href="">Request Another Document</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Information Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input name="book_fname" value="" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input name="book_lname" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input name="book_email" value="" type="email" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input name="book_number" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Student ID</label>
                            <input name="student_id" value="" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year Level</label>
                            <input name="year_level" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Course</label>
                            <input name="course" value="" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section</label>
                            <input name="section" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Created At</label>
                            <input name="created_at" value="" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Birthdate</label>
                            <input name="student_birthdate" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Document</label>
                            <input name="book_document" value="" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <input name="book_status" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input name="price" value="" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Status</label>
                            <input name="payment_status" value="" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md">
                        <label class="form-label">Pickup Date</label>
                        <input name="pickup_date" value="" type="text" class="form-control" readonly>
                    </div>
                    <label class="form-label">Purpose</label>
                    <input name="purpose" value="" type="textarea" class="form-control" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearSearchAndSubmit() {
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');

            // Clear the search input value
            searchInput.value = '';

            // Submit the form to refresh the table with no search filter
            searchForm.submit();
        }
    </script>

    <script>
        const exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const fields = [
                "book_fname", "book_lname", "book_email", "book_number",
                "student_id", "year_level", "course", "section", "created_at",
                "student_birthdate", "book_document", "book_status", "price",
                "payment_status", "purpose", "pickup_date"
            ];

            fields.forEach(field => {
                const input = exampleModal.querySelector(`input[name="${field}"]`);
                if (input) {
                    input.value = button.getAttribute(`data-${field}`) || "N/A"; // Default to "N/A" if value is missing
                }
            });
        });
    </script>

    <?php include PATH . "/partials/footer.php" ?>