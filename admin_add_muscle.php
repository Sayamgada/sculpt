<?php

include_once './db_connect.php';

    $sql = "SELECT * FROM muscle_group";
    $muscle = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($muscle);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sculpt | Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="./Images/fav.png" type="image/x-icon">

    <link rel="stylesheet" href="./CSS/admin_dashboard.css">
    <link rel="stylesheet" href="./CSS/admin_add_muscle.css">

</head>

<body class="light-mode">
    <button class="sidebar-toggle" id="sidebar-toggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="./admin_dashboard.php" class="sidebar-menu-link active">
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

                    <h2>Add New Muscle Group</h2>
                    <p class="text-muted">Create a new muscle group for training videos and programs</p>
                </div>
            </div>

            <!-- Add Muscle Group Form -->
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <form id="addMuscleGroupForm" action="./save_muscle_group.php" enctype="multipart/form-data" method="post">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="muscleGroupName" class="form-label">Muscle Group Name</label>
                                        <input type="text" class="form-control" id="muscleGroupName" name="muscleGroupName" required>
                                        <div class="form-text">Enter a unique name for the muscle group (e.g., Biceps, Chest, Abs)</div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="muscleGroupDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="muscleGroupDescription" name="muscleGroupDescription" rows="5" required></textarea>
                                        <div class="form-text">Provide a detailed description of the muscle group and its functions</div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="muscleGroupImage" class="form-label">Muscle Group Image</label>
                                        <input type="file" class="form-control d-none" id="muscleGroupImage" name="muscleGroupImage" accept="image/*">
                                        <div class="image-preview" id="imagePreview" onclick="document.getElementById('muscleGroupImage').click()">
                                            <div class="image-preview-placeholder" id="imagePlaceholder">
                                                <i class="bi bi-cloud-arrow-up"></i>
                                                <p>Click to upload an image<br><small>or drag and drop</small></p>
                                            </div>
                                        </div>
                                        <div class="form-text mt-2">Upload a clear image of the muscle group.</div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <hr>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="./admin_muscle.php" class="btn btn-outline-secondary">Cancel</a>
                                        <button type="button" onclick="save_muscle_group()" class="btn btn-primary">Save Muscle Group</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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




        // Image Preview
        const imageInput = document.getElementById('muscleGroupImage');
        const imagePreview = document.getElementById('imagePreview');
        const imagePlaceholder = document.getElementById('imagePlaceholder');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Remove placeholder
                    imagePlaceholder.style.display = 'none';
                    
                    // Create image element if it doesn't exist
                    let img = imagePreview.querySelector('img');
                    if (!img) {
                        img = document.createElement('img');
                        imagePreview.appendChild(img);
                    }
                    
                    // Set image source
                    img.src = e.target.result;
                }
                
                reader.readAsDataURL(file);
            }
        });


        function save_muscle_group()
        {
            let name = document.getElementById('muscleGroupName').value;
            let description = document.getElementById('muscleGroupDescription').value; 
            let image = document.getElementById('muscleGroupImage').files[0];

            if(!name || !description|| !image)
            {
                alert('Please fill out all details')   
            }
            else
            {
                document.getElementById('addMuscleGroupForm').submit();
            }
        }

    </script>


</body>

</html>