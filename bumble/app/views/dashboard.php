<?php include PATH . "/partials/sidenav.php" ?>
<!-- Sidebar -->
<div class="sidebar">
    <div class="side-content">
        <div class="profile">
            <!-- Logo -->
            <div class="profile-img bg-img" style="background-image: url(<?= ROOT ?>/assets/images/logo.png);"></div>
            <h5>BPC Document Request System</h>

        </div>
        <div class="side-menu">
            <ul class="container">
                <li>
                    <a href="<?= ROOT ?>/dashboard" class="active">
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
                    <a href="<?= ROOT ?>/track">
                        <span class="las la-search"></span>
                        <small>Track Your Request</small>
                    </a>
                </li>
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

<!-- Main Content -->
<div class="main-content">
    <header>
        <div class="header-content">
            <label for="menu-toggle" class="toggle">
                <span class="las la-bars"></span>
            </label>
            <div class="header-menu">
            <form class="d-flex position-relative" role="search" method="GET" action="<?= ROOT ?>/dashboard" id="searchForm">
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
        <div class="notify-icon">
            <span class="las la-bell"></span>
            <span class="notify" id="notificationCount">3</span>
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
            <h1>Dashboard</h1>
            <small>Welcome back! Here's an overview of your activity.</small>
        </div>
        <div class="page-content">
            <!-- Analytics Cards -->
            <div class="analytics">
                <div class="card">
                    <div class="card-head">
                        <h2><?= $data['totalRequested'] ?? 0; ?></h2>
                        <span class="las la-user-friends"></span>
                    </div>
                    <div class="card-progress">
                        <small>Total Documents Requested</small>
                        <h6>This is the total number of documents you've requested so far.</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <h2><?= $data['totalPending'] ?? 0; ?></h2>
                        <span class="las la-hourglass-half"></span>
                    </div>
                    <div class="card-progress">
                        <small>Total Documents Pending</small>
                        <h6>Documents that are still being processed or reviewed.</h6>
                    </div>
                </div>
                <div class="card2">
                    <small>Click Below to Get Started on Your Document Request!</small>
                    <div class="card-head2">
                        <a href="">Request a Document</a>
                    </div>
                </div>
            </div>
            <div class="records table-responsive">
                <div class="record-header">
                    <div class="add">
                        <span>Recent Activity</span>
                    </div>
                </div>
                <div>
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>Document Requested</th>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch the number of unread notifications
    fetch('/notifications/count') // Assuming '/notifications/count' returns the count of unread notifications
        .then(response => response.json())
        .then(data => {
            document.getElementById('notificationCount').innerText = data.count;
        });
});
</script>

<?php include PATH . "/partials/footer.php" ?>