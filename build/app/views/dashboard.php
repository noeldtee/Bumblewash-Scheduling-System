<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>
<body>
    <input type="checkbox" id="menu-toggle">
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
                        <a href="" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-file-alt"></span>
                            <small>Request a Document</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-search"></span>
                            <small>Track Your Request</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-wallet"></span>
                            <small>Payment History</small>
                        </a>
                    <li>
                        <a href="">
                            <span class="las la-history"></span>
                            <small>Request History</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-cog"></span>
                            <small>Settings</small>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="">
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
                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>
                    <div class="user">
                        <h3>Hello, Noel</h3>
                        <a href="" class="bg-img" style="background-image: url(<?= ROOT ?>/assets/images/logo.png);"></a>
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
                            <h2>0</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Documents Requested</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                            <span class="las la-hourglass-half"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Documents Pending</small>
                        </div>
                    </div>
                    <div class="card2">
                        <div class="card-head2">
                            <a href="">Request a Document</a>
                        </div>
                    </div>
                </div>
                <!-- Records Table -->
                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <span>Recent Activity</span>
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
            </div>
        </main>
    </div>
</body>
</html>