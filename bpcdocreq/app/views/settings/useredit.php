<?php include PATH . "/partials/sidenav.php" ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/request.css">
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
                    <a href="<?= ROOT ?>/setting" class="active">
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
    <div class="page-content">
            <!-- Request Form -->
            <form action="<?= ROOT ?>/settings/useredit" method="POST" class="form-container">
    <h3>Personal Information</h3>
    <input type="hidden" name="id" value="<?= $_SESSION['USER']->id ?>">
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input name="student_firstname" value="<?= $_SESSION['USER']->student_firstname ?>" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" name="student_lastname" value="<?= $_SESSION['USER']->student_lastname ?>" class="form-control">
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label class="form-label">Birthdate</label>
            <input name="student_birthdate" value="<?= $_SESSION['USER']->student_birthdate ?>" type="date" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Student ID</label>
            <input name="student_id" value="<?= $_SESSION['USER']->student_id ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input name="student_email" value="<?= $_SESSION['USER']->student_email ?>" type="email" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Contact Number</label>
            <input name="student_number" value="<?= $_SESSION['USER']->student_number ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label class="form-label">Section</label>
            <input name="section" value="<?= $_SESSION['USER']->section ?>" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Year Level</label>
            <input name="year_level" value="<?= $_SESSION['USER']->year_level ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label class="form-label">Course</label>
            <input name="course" value="<?= $_SESSION['USER']->course ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="submit">
        <input type="submit" value="Edit" id="button">
    </div>
</form>

</div>