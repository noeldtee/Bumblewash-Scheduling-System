<?php include PATH . "/partials/sidenav.php" ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/history.css">
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
                        <a href="<?= ROOT ?>/track">
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
                        <a href="<?= ROOT ?>/history" class="active">
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
                <h1>Request History</h1>
                <small>Review all your past document requests, check their status, and access related details.</small>
            </div>
            <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <span>History Table</span>
                        </div>
                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                            <select name="" id="">
                                <option value="">Status</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <table width="100%">
                        <thead>
                                <tr>
                                    <th>REQUEST ID</th>
                                    <th>NAME</th>
                                    <th>DOCUMENT REQUESTED</th>
                                    <th>PRICE</th>
                                    <th>REQUESTED DATE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Noel Christopher Tee</td>
                                    <td>Certificate of Enrollment</td>
                                    <td>₱200</td>
                                    <td>Nov 28, 2024</td>
                                    <td>Waiting for Approval</td>
                                    <td>
                                        <div class="actions">
                                            <span class="lab la-telegram-plane"></span>
                                            <span class="las la-eye"></span>
                                            <span class="las la-ellipsis-v"></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </main>

<?php include PATH . "/partials/footer.php" ?>