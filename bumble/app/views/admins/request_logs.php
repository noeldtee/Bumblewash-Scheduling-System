<?php include "partials/header.php" ?>

<!-- Main Content -->
<div class="main-content">
  <header>
    <div class="header-content">
      <label for="menu-toggle" class="toggle">
        <span class="las la-bars"></span>
      </label>
      <div class="header-menu">
        <form class="d-flex position-relative" role="search" method="GET" action="<?= ROOT ?>/admins/booking_list" id="searchForm">
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
      <span>Request Management</span><br>
      <small>Here's an overview of request activity.</small>
    </div>
    <div class="page-content">
      <form action="" method="GET">
        <div class="row float-end" style="margin-bottom: 1rem; width: 35rem;">
          <!-- Date Filter -->
          <div class="col-md-4">
            <input type="date" name="filter_date" class="form-control" value="<?= htmlspecialchars($_GET['filter_date'] ?? '') ?>">
          </div>
          <!-- Status Filter -->
          <div class="col-md-4">
            <select name="filter_status" class="form-control">
              <option value="">All</option>
              <option value="Pending" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
              <option value="In Process" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'In Process') ? 'selected' : '' ?>>In Process</option>
              <option value="In Process" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'To Pickup') ? 'selected' : '' ?>>In Process</option>
              <option value="Completed" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'Completed') ? 'selected' : '' ?>>Completed</option>
              <option value="Rejected" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'Rejected') ? 'selected' : '' ?>>Rejected</option>
            </select>
          </div>
          <!-- Filter Buttons -->
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="<?= ROOT ?>/admins/booking_list" class="btn btn-danger">Reset</a>
          </div>
        </div>
      </form>

      <table class="table table-striped mt-3">
        <tr>
          <th>Document</th>
          <th>Student ID</th>
          <th>Student Name</th>
          <th>Price</th>
          <th>Requested Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <?php if (!empty($books)): ?>
          <?php foreach ($books as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item->book_document); ?></td>
              <td><?= htmlspecialchars($item->student_id); ?></td>
              <td><?= htmlspecialchars($item->book_lname) . ', ' . htmlspecialchars($item->book_fname); ?></td>
              <td><?= htmlspecialchars($item->price); ?></td>
              <td><?= htmlspecialchars(date('F d, Y', strtotime($item->created_at))); ?></td>
              <td><?= htmlspecialchars(ucfirst($item->book_status)); ?></td>
              <td>
                <button 
        type="button" 
        class="btn btn-primary btn-sm" 
        data-bs-toggle="modal" 
        data-bs-target="#exampleModal"
        data-id="<?= $item->id ?>"
        data-created_at="<?= htmlspecialchars(date('F d, Y', strtotime($item->created_at))); ?>"
        data-book_fname="<?= htmlspecialchars($item->book_fname) ?>" 
        data-book_lname="<?= htmlspecialchars($item->book_lname) ?>" 
        data-book_email="<?= htmlspecialchars($item->book_email) ?>" 
        data-book_number="<?= htmlspecialchars($item->book_number) ?>"
        data-student_birthdate="<?= htmlspecialchars($item->student_birthdate) ?>"
        data-student_id="<?= htmlspecialchars($item->student_id) ?>" 
        data-year_level="<?= htmlspecialchars($item->year_level) ?>" 
        data-course="<?= htmlspecialchars($item->course) ?>" 
        data-section="<?= htmlspecialchars($item->section) ?>"
        data-book_document="<?= htmlspecialchars($item->book_document) ?>"
        data-book_status="<?= htmlspecialchars($item->book_status) ?>"
        data-price="<?= htmlspecialchars($item->price) ?>"
        data-payment_status="<?= htmlspecialchars($item->payment_status) ?>"
        data-purpose="<?= htmlspecialchars($item->purpose) ?>"
        data-pickup_date="<?= htmlspecialchars($item->pickup_date) ?>"
        >
        View Information
    </button>

                <button
                  class="btn btn-danger btn-sm delete-button"
                  data-id="<?= $item->id ?>">
                  Delete
                </button>
              </td>

            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">
              <h3>No record found.</h3>
            </td>
          </tr>
        <?php endif; ?>
      </table>

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
      document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
          button.addEventListener('click', function() {
            const requestId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to reject/delete this request?')) {
              // Redirect to the delete endpoint or send an AJAX request
              window.location.href = `<?= ROOT ?>/admins/deleteRequest/${requestId}`;
            }
          });
        });
      });
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

    <?php include "partials/footer.php" ?>