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
                      <a href="<?= ROOT ?>/documents/view/<?= $activity->id; ?>">View</a>
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