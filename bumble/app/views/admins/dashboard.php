<?php include "partials/header.php" ?>
<!-- Main Content -->
<!-- Main Content -->
<div class="main-content">
  <header>
    <div class="header-content">
      <label for="menu-toggle" class="toggle">
        <span class="las la-bars"></span>
      </label>
      <div class="header-menu">
        <form class="d-flex position-relative" role="search" method="GET" action="<?= ROOT ?>/admins/dashboard" id="searchForm">
          <div class="position-relative">
            <input
              class="form-control me-2" style="width: 30rem;"
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
          <button class="btn btn-outline-dark ms-2" style="margin-right: 2rem;" type="submit">Search</button>
        </form>
        <div class="user">
          <h3>Hello! Admin</h3>
          <a href="" class="bg-img" style="background-image: url();"></a>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="page-header">
      <span>Dashboard</span><br>
      <small>Welcome back! Here's an overview of today's system activity.</small>
    </div>
    <div class="page-content">
      <!-- Analytics Cards -->
      <div class="analytics">
        <div class="card">
          <div class="card-head">
            <h2><?= $data['totalStudents'] ?? 0 ?></h2>
            <i class="fa-solid fa-user" style="font-size: 30px;"></i>
          </div>
          <div class="card-progress">
            <small>Total Students</small>
          </div>
        </div>
        <div class="card">
          <div class="card-head">
            <h2><?= $data['totalRequests'] ?? 0 ?></h2>
            <i class="fa-solid fa-folder-open" style="font-size: 30px;"></i>
          </div>
          <div class="card-progress">
            <small>Total Requests</small>
          </div>
        </div>
        <div class="card">
          <div class="card-head">
            <h2><?= $data['totalPending'] ?? 0 ?></h2>
            <i class="fa-solid fa-hourglass-half" style="font-size: 30px;"></i>
          </div>
          <div class="card-progress">
            <small>Total Pending</small>
          </div>
        </div>
        <div class="card">
          <div class="card-head">
            <h2><?= $data['totalInProcess'] ?? 0 ?></h2>
            <i class="fa-solid fa-print" style="font-size: 30px;"></i>
          </div>
          <div class="card-progress">
            <small>Total In Process</small>
          </div>
        </div>
        <div class="card">
          <div class="card-head">
            <h2><?= $data['readyToPickup'] ?? 0 ?></h2>
            <i class="fa-solid fa-file-circle-check" style="font-size: 30px;"></i>
          </div>
          <div class="card-progress">
            <small>Ready to Pickup</small>
          </div>
        </div>
      </div>
      <!-- Records Table -->
      <div class="records table-responsive">
        <div class="record-header">
          <div class="add">
            <span>Most Recent Requested</span>
          </div>
        </div>
        <div>
          <table width="100%">
            <thead>
              <tr>
                <th>Document Requested</th>
                <th>Student Name</th>
                <th>Price</th>
                <th>Requested Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($data['recentActivities'])): ?>
                <?php foreach ($data['recentActivities'] as $activity): ?>
                  <tr>
                    <td><?php echo str_replace(',', ', ', htmlspecialchars($activity->book_document)); ?></td>
                    <td><?= htmlspecialchars($activity->book_lname) . ', ' . htmlspecialchars($activity->book_fname); ?></td>
                    <td><?= htmlspecialchars($activity->price); ?></td>
                    <td><?= htmlspecialchars(date('Y-m-d', strtotime($activity->created_at))); ?></td>
                    <td><?= htmlspecialchars(ucfirst($activity->book_status)); ?></td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        data-id="<?= $activity->id ?>"
                        data-created_at="<?= htmlspecialchars(date('F d, Y', strtotime($activity->created_at))); ?>"
                        data-book_fname="<?= htmlspecialchars($activity->book_fname) ?>"
                        data-book_lname="<?= htmlspecialchars($activity->book_lname) ?>"
                        data-book_email="<?= htmlspecialchars($activity->book_email) ?>"
                        data-book_number="<?= htmlspecialchars($activity->book_number) ?>"
                        data-student_birthdate="<?= htmlspecialchars($activity->student_birthdate) ?>"
                        data-student_id="<?= htmlspecialchars($activity->student_id) ?>"
                        data-year_level="<?= htmlspecialchars($activity->year_level) ?>"
                        data-course="<?= htmlspecialchars($activity->course) ?>"
                        data-section="<?= htmlspecialchars($activity->section) ?>"
                        data-book_document="<?= htmlspecialchars($activity->book_document) ?>"
                        data-book_status="<?= htmlspecialchars($activity->book_status) ?>"
                        data-price="<?= htmlspecialchars($activity->price) ?>"
                        data-payment_status="<?= htmlspecialchars($activity->payment_status) ?>"
                        data-purpose="<?= htmlspecialchars($activity->purpose) ?>"
                        data-pickup_date="<?= htmlspecialchars($activity->pickup_date) ?>">
                        View Information
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5">No recent activity found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>
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
exampleModal.addEventListener('show.bs.modal', function (event) {
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