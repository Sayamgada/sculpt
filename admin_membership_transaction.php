<?php

include_once './db_connect.php';

$sql = "SELECT * FROM users WHERE membership_plan != ''";
$users = mysqli_query($conn, $sql);
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

    <link rel="shortcut icon" href="./Images/fav.png" type="image/x-icon">

    <link rel="stylesheet" href="./CSS/admin_dashboard.css">

    <style>
        .muscle-thumbnail {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>

</head>

<body class="light-mode">
    <button class="sidebar-toggle" id="sidebar-toggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="./admin_dashboard.php" class="sidebar-menu-link">
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
                <a href="#" class="sidebar-menu-link active">
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

    <div class="main-content" id="main-content">
        <div class="container-fluid" style="margin-top: 2rem;">
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Membership Transactions</h2>
                        <p class="text-muted">Manage all transaction and keep a track on them</p>
                    </div>
                </div>
            </div>

            <!-- Muscle Groups Table -->
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <div class="table-responsive">
                            <table id="usersTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Plan</th>
                                        <th>Start-date</th>
                                        <th>End-date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($users) > 0) {
                                        while ($user = mysqli_fetch_assoc($users)) { ?>
                                            <tr>
                                                <td><?= $user['user_id']; ?></td>
                                                <td><?= $user['user_name']; ?></td>
                                                <td><?= $user['membership_plan']; ?></td>
                                                <td><?= $user['membership_start_date'] ?></td>
                                                <td><?= $user['membership_end_date']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="./JS/admin_dashboard.js"></script>

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users...",
                },
                columnDefs: [{
                    orderable: false,
                    targets: [0]
                }]
            });
        });

    </script>

</body>

</html>