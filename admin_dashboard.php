<?php

include_once './db_connect.php';

$sql = "SELECT * FROM users";
$users = mysqli_query($conn, $sql);

$muscle = mysqli_query($conn, "SELECT * FROM muscle_group");

$videos = mysqli_query($conn, "SELECT * FROM muscle_videos");

$membership = mysqli_query($conn, "SELECT * FROM users WHERE membership_plan != ''");


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sculpt Premium Fitness Gym</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./CSS/admin_dashboard.css">
    <link rel="shortcut icon" href="./Images/favicon.png" type="image/x-icon">

</head>

<body class="light-mode">
    <button class="sidebar-toggle" id="sidebar-toggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link active">
                    <i class="bi bi-speedometer2 sidebar-menu-icon"></i>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="./admin_users.php" class="sidebar-menu-link">
                    <i class="bi bi-people sidebar-menu-icon"></i>
                    <span class="sidebar-menu-text">Users</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="./admin_membership_transaction.php" class="sidebar-menu-link">
                    <i class="bi bi-credit-card sidebar-menu-icon"></i>
                    <span class="sidebar-menu-text">Membership Transactions</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="./admin_muscle.php" class="sidebar-menu-link">
                    <i class="bi bi-diagram-3 sidebar-menu-icon"></i>
                    <span class="sidebar-menu-text">Muscle Groups</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="./admin_videos.php" class="sidebar-menu-link">
                    <i class="bi bi-camera-video sidebar-menu-icon"></i>
                    <span class="sidebar-menu-text">Videos</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 ps-4" href="#"><img src="./Images/loho.png" alt="logo" style="max-height: 10vh;"></a>
            <div style="display: flex; justify-content: space-between; align-self: center; min-width: 15vw; padding-right: 5rem;">
                <p class="text-muted" style="padding-top: 10px;">Admin Dashboard</p>
                <button id="theme-toggle" class="btn rounded-circle ms-2">
                    <i class="bi bi-moon-fill"></i>
                </button>
            </div>

        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card h-100">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value"><?= $users->num_rows ?></div>
                                <div class="stat-label">Total Users</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card h-100">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-credit-card-fill"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value"><?= $membership->num_rows ?></div>
                                <div class="stat-label">Active Memberships</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card h-100">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-diagram-3-fill"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value"><?= $muscle->num_rows ?></div>
                                <div class="stat-label">Muscle Groups</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card h-100">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-camera-video-fill"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value"><?= $videos->num_rows ?></div>
                                <div class="stat-label">Live Videos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./JS/admin_dashboard.js"></script>

</body>

</html>