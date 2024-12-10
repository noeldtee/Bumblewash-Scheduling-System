<?php include PATH . "/partials/sidenav.php" ?>


<link rel="stylesheet" href="<?= ROOT ?>/assets/css/settings.css">
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
    
    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle" class="toggle">
                    <span class="las la-bars"></span>
                </label>
                <div class="header-menu">
                <form class="d-flex position-relative" role="search" method="GET" action="<?= ROOT ?>/setting" id="searchForm">
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
                <h1>Settings</h1>
                <small>Manage your Account</small>
            </div>
            <div class="page-content">
                <!-- Analytics Cards -->
                <div class="analytics">
                    <div class="card">
                        <div class="card-head">
                            <h2>Personal Information</h2>
                        </div>
                        <div class="card-progress">
                            <small>Name: Noel Christopher Tee</small>
                            <small>Email: noeldtee@gmail.com</small>
                            <small>Contact Number: 09876532892</small>
                          <div></div>
                            <a href="">Edit Details</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>Payment Settings</h2>
                        
                        </div>
                        <div class="card-progress">
                            <small>Saved Method: Gcash (*******2892)</small>
                           
                         
                            <a href="">Add Method</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>Account Security</h2>
                        
                        </div>
                        <div class="card-progress">
                            <small>Change Password?</small>
                           
                         
                            <a href="">View Details</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>Privacy and Terms</h2>
                        </div>
                        <div class="card-progress">
                           
                            <a href="">View Privacy and Policy</a>
                            <div></div>
                            <a href="">View Terms and Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php include PATH . "/partials/footer.php" ?>