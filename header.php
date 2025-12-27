<?php session_start(); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="./Images/1-removebg-preview.png" alt="Logo" style="max-height: 8vh;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#membership">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#training">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <?php

                            if(isset($_SESSION['id']))
                            { ?>
                                <a class="nav-link" href="profile.php">Profile</a>
                            <?php }
                            else
                            { ?>
                                <a class="nav-link" href="./login_form.php">Login/Signup</a>
                            <?php }
                        ?>

                    </li>
                    <li class="nav-item ms-2">
                        <button id="theme-toggle" class="btn btn-sm rounded-circle">
                            <i class="bi bi-moon-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>