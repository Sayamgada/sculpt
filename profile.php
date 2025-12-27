<?php include_once 'header.php'; ?>


<?php
include_once './db_connect.php';
$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE user_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Sculpt Premium Fitness Gym</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./CSS/styles.css">
    <link rel="stylesheet" href="./CSS/profile.css">
</head>

<body class="light-mode">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="py-4 px-3 text-center">
            <img src="./Images/user-icon.jpg" alt="User" class="rounded-circle" width="80" height="80">
            <h6 class="mt-2 mb-3" style="font-weight: bold;"><?php echo $_SESSION['name']; ?></h6>
            <?php
            if ($row['membership_plan'] == null) { ?>
                <p class="small text-muted plan-type">Free Member</p>
            <?php } else {
            ?>
                <p class="small text-muted plan-type">Premium Member</p>
            <?php } ?>
        </div>
        <a href="#dashboard" class="sidebar-link active">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <a href="logout.php" class="sidebar-link">
            <i class="bi-box-arrow-left"></i>
            <span>Logout</span>
        </a>
    </div>


    <div class="main-content">
        <div class="container-fluid">

            <div class="row mb-4">
                <div class="col-12">
                    <h2>Welcome back, <?php echo $_SESSION['name']; ?></h2>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="stat-value">
                            <?php
                            if ($row['video_count'] == -1) {
                            ?>
                                <span style="font-size: 50px;">∞</span>
                            <?php
                            } else {
                                echo $row['video_count'];
                            }
                            ?>
                        </div>

                        <div class="stat-label">Free Videos Left</div>
                    </div>
                </div>
            </div>


            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <div class="dashboard-card h-100">
                        <div class="dashboard-card-header">
                            <i class="bi bi-person me-2"></i> Profile Information
                        </div>
                        <div class="dashboard-card-body text-center">
                            <div class="profile-info">
                                <img src="./Images/user-icon.jpg" alt="Profile" class="profile-image mb-3">
                                <h4><?= $_SESSION['name']; ?></h4>
                                <?php
                                if ($row['membership_plan'] == null) { ?>
                                    <p>Free Member</p>
                                <?php } else {
                                ?>
                                    <p>Premium Member</p>
                                <?php } ?>
                            
                                <div class="row mt-4">

                                    <div class="col-6 text-start">
                                        <p class="mb-1 text-muted plan-type">Contact</p>
                                        <p class="fw-bold"><?= $_SESSION['phone']; ?></p>
                                    </div>

                                    <div class="col-6 text-start">
                                        <p class="mb-1 text-muted plan-type">Email</p>
                                        <p class="fw-bold"><?= $_SESSION['email']; ?></p>
                                    </div>

                                    <div class="col-6 text-start">
                                        <p class="mb-1 text-muted plan-type">Age</p>
                                        <p class="fw-bold">-</p>
                                    </div>

                                    <div class="col-6 text-start">
                                        <p class="mb-1 text-muted plan-type">Weight (kg)</p>
                                        <p class="fw-bold">-</p>
                                    </div>

                                    <div class="col-6 text-start">
                                        <p class="mb-1 text-muted plan-type">Height (m)</p>
                                        <p class="fw-bold">-</p>
                                    </div>

                                    <div class="col-6 text-start">
                                        <p class="mb-1 text-muted plan-type">BMI</p>
                                        <p class="fw-bold">-</p>
                                    </div>

                                </div>
                                <a href="#" class="btn btn-outline-primary mt-3">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="dashboard-card h-100">
                        <div class="dashboard-card-header">
                            <i class="bi bi-credit-card me-2"></i> Membership Information
                        </div>
                        <div class="dashboard-card-body">
                            <?php
                            if ($row['membership_plan'] == null) { ?>

                                <div class="row align-items-center mb-4">
                                    <div class="col-md-6">
                                        <h5>Current Plan: <span class="membership-badge">FREE</span></h5>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h6>Plan Benefits:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>5 FREE VIDEOS</li>
                                            <li class="mb-2"><i class="bi bi-x-circle-fill me-2 text-muted badge-color"></i>Unlimited access to all videos</li>
                                            <li class="mb-2"><i class="bi bi-x-circle-fill me-2 text-muted badge-color"></i>Nutrition Plan</li>
                                        </ul>
                                    </div>
                                </div>

                            <?php
                            } else if ($row['membership_plan'] == 'quaterly') {
                            ?>

                                <div class="row align-items-center mb-4">
                                    <div class="col-md-6">
                                        <h5>Current Plan: <span class="membership-badge">Quaterly</span></h5>
                                        <?php $renew_date = $row['membership_end_date'];
                                        $date = new DateTime($renew_date);
                                        $date->modify('+1 day');
                                        $renew_date = $date->format('Y-m-d');
                                        ?>
                                        <p class="text-muted mb-0">Renewal Date: <?= $renew_date; ?></p>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h6>Plan Benefits:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>3 Months membership</li>
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                                            <li class="mb-2"><i class="bi bi-x-circle-fill me-2 text-muted badge-color"></i>Nutrition Plan</li>
                                        </ul>
                                    </div>
                                </div>

                            <?php
                            } else if ($row['membership_plan'] == 'yearly') {
                            ?>
                                <div class="row align-items-center mb-4">
                                    <div class="col-md-6">
                                        <h5>Current Plan: <span class="membership-badge">Yearly</span></h5>
                                        <?php $renew_date = $row['membership_end_date'];
                                        $date = new DateTime($renew_date);
                                        $date->modify('+1 day');
                                        $renew_date = $date->format('Y-m-d');
                                        ?>
                                        <p class="text-muted mb-0">Renewal Date: <?= $renew_date; ?></p>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h6>Plan Benefits:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>3 Months membership</li>
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Nutrition Plan</li>

                                        </ul>
                                    </div>
                                </div>

                            <?php
                            } else if ($row['membership_plan'] == 'half-yearly') {
                            ?>
                                <div class="row align-items-center mb-4">
                                    <div class="col-md-6">
                                        <h5>Current Plan: <span class="membership-badge">Half-Yearly</span></h5>
                                        <?php $renew_date = $row['membership_end_date'];
                                        $date = new DateTime($renew_date);
                                        $date->modify('+1 day');
                                        $renew_date = $date->format('Y-m-d');
                                        ?>
                                        <p class="text-muted mb-0">Renewal Date: <?= $renew_date; ?></p>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h6>Plan Benefits:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>6 Months membership</li>
                                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                                            <li class="mb-2"><i class="bi bi-x-circle-fill me-2 badge-color  "></i>Nutrition Plan</li>
                                        </ul>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                            <!-- <div class="row align-items-center mb-4">
                                <div class="col-md-6">
                                    <h5>Current Plan: <span class="membership-badge">Premium</span></h5>
                                    <p class="text-muted mb-0">Renewal Date: November 15, 2025</p>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6>Plan Benefits:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>24/7 Gym Access</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>All Equipment</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Locker Room Access</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>2 PT Sessions/Month</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Group Classes</li>
                                        <li class="mb-2"><i class="bi bi-x-circle-fill me-2 text-muted"></i>Nutrition Plan</li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include_once 'footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="./JS/script.js"></script>
</body>

</html>