<?php include "partials/header.php" ?>

<!-- Main Content -->
<div class="main-content">
  <header>
    <div class="header-content">
      <label for="menu-toggle" class="toggle">
        <span class="las la-bars"></span>
      </label>
      <div class="header-menu">
        <form class="d-flex position-relative" role="search" method="GET" action="<?= ROOT ?>/admins/user_list" id="searchForm">
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
      <span>User Management</span><br>
      <small>Here you can manage the user!</small>
    </div>
    <div class="page-content">

      <div class="mt-1 d-flex justify-content-between align-items-center">
        <h3>User List</h3>
      </div>
      <table class="table table-striped mt-3">
        <tr>
          <th>Student ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Course</th>
          <th>Year</th>
          <th>Section</th>
          <th>Action</th>
        </tr>
        <?php if ($users != null) { ?>
          <?php foreach ($users as $item) { ?>
            <tr>
              <td><?= $item->student_id ?></td>
              <td><?= $item->student_firstname ?></td>
              <td><?= $item->student_lastname ?></td>
              <td><?= $item->student_email ?></td>
              <td><?= $item->student_number ?></td>
              <td><?= $item->course ?></td>
              <td><?= $item->year_level ?></td>
              <td><?= $item->section ?></td>
              <td>
                <a href="<?= ROOT ?>/admins/user_delete/<?= $item->id ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <tr>
            <td colspan="9">
              <h3>No record found.</h3>
            </td>
          </tr>
        <?php } ?>
      </table>

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

    <?php include "partials/footer.php" ?>