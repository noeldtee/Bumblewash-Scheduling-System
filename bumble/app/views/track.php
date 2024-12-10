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
        <div class="m-3 d-flex justify-content-between align-items-center">
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
                            style="background: none; border: none; font-size: 1.2rem; color: #6c757d; cursor: pointer;">
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
                                        <?= $request->pickup_date ? htmlspecialchars(date('Y-m-d', strtotime($request->pickup_date))) : 'N/A'; ?>
                                    </td>
                                    <td><?= htmlspecialchars(ucfirst($request->payment_status)); ?></td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertdata">View</button></td>
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

    <div class="modal fade" id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
        <form method="POST" action="" enctype="application/x-www-form-urlencoded">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertdataLabel">View Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Section</label>
                                <input name="section" value="<?= $_SESSION['USER']->section ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </div>
        </form>
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

    <?php include PATH . "/partials/footer.php" ?>