<?php include "partials/header.php" ?>
<!-- Main Content -->
<div class="main-content">
  <header>
    <div class="header-content">
      <label for="menu-toggle" class="toggle">
        <span class="las la-bars"></span>
      </label>
      <div class="header-menu">
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
                    <td><?= htmlspecialchars($activity->document_name); ?></td>
                    <td><?= htmlspecialchars($activity->price); ?></td>
                    <td><?= htmlspecialchars(date('Y-m-d', strtotime($activity->requested_date))); ?></td>
                    <td><?= htmlspecialchars(ucfirst($activity->status)); ?></td>
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

<?php include PATH . "/partials/footer.php" ?>