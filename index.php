<?php
include_once './db_connect.php';
include_once 'header.php';

$sql = "SELECT * FROM muscle_group";
$muscle = mysqli_query($conn, $sql);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sculpt</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="./Images/fav.png" type="image/x-icon">

    <link rel="stylesheet" href="./CSS/styles.css">

    <style>
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-overlay {
            z-index: 1;
        }
    </style>
</head>

<body class="light-mode">

    <!-- Hero Carousel -->
    <section id="home" class="hero-section">
        <video class="hero-video" autoplay loop muted>
            <source src="https://videos.pexels.com/video-files/3195943/3195943-uhd_2560_1440_25fps.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay">
            <h1>TRANSFORM YOUR BODY</h1>
            <p>Premium fitness experience at Sculpt Gym</p>
            <a href="#membership" class="btn btn-primary btn-lg">Join Now</a>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1593079831268-3381b0db4a77?q=80&w=1469&auto=format&fit=crop" class="img-fluid rounded shadow" alt="About Sculpt Gym">
                </div>
                <div class="col-lg-6">
                    <div class="section-header mb-4">
                        <h6 class="text-uppercase fw-bold accent-color">About Us</h6>
                        <h2 class="fw-bold">We Are More Than Just A Gym</h2>
                        <div class="accent-line"></div>
                    </div>
                    <p>At Sculpt, we believe fitness is not just about building a better body, but about building a better life. Our state-of-the-art facility offers everything you need to achieve your fitness goals, whether you're just starting out or looking to take your training to the next level.</p>
                    <p>Founded in 2010, Sculpt has grown to become the premier fitness destination with a community of dedicated members and expert trainers committed to helping you transform your body and mind.</p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill accent-color fs-4 me-2"></i>
                                <span>Expert Trainers</span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill accent-color fs-4 me-2"></i>
                                <span>24/7 Access</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Section -->
    <section id="membership" class="py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h6 class="text-uppercase fw-bold accent-color">Membership Plans</h6>
                <h2 class="fw-bold">Choose Your Perfect Plan</h2>
                <div class="accent-line mx-auto"></div>
            </div>
            <div class="row">
                <!-- Basic Plan -->
                <div class="col-md-4 mb-4">
                    <div class="card membership-card h-100">
                        <div class="card-body text-center p-4">
                            <h5 class="text-uppercase fw-bold mb-3">Quaterly</h5>
                            <div class="price-circle mx-auto mb-4">
                                <span class="price-currency">&#8377;</span>
                                <span class="price">399</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>3 Months membership</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                                <li class="mb-2"><i class="bi bi-x-circle-fill me-2 text-muted"></i>Nutrition Plan</li>
                            </ul>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <a href="./membership_purchase.php" class="btn btn-primary btn-lg w-100">Buy Now</a>
                            <?php
                            } else {
                            ?>
                                <a href="./login_form.php" class="btn btn-primary btn-lg w-100">Buy Now</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="col-md-4 mb-4">
                    <div class="card membership-card h-100 featured">
                        <div class="card-body text-center p-4">
                            <div class="popular-badge">Most Popular</div>
                            <h5 class="text-uppercase fw-bold mb-3">Half-yearly</h5>
                            <div class="price-circle mx-auto mb-4">
                                <span class="price-currency">&#8377;</span>
                                <span class="price">699</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>6 Months membership</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                                <li class="mb-2"><i class="bi bi-x-circle-fill me-2 text-muted"></i>Nutrition Plan</li>
                            </ul>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <a href="./membership_purchase.php" class="btn btn-primary btn-lg w-100">Buy Now</a>
                            <?php
                            } else {
                            ?>
                                <a href="./login_form.php" class="btn btn-primary btn-lg w-100">Buy Now</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Elite Plan -->
                <div class="col-md-4 mb-4">
                    <div class="card membership-card h-100">
                        <div class="card-body text-center p-4">
                            <h5 class="text-uppercase fw-bold mb-3">yearly</h5>
                            <div class="price-circle mx-auto mb-4">
                                <span class="price-currency">&#8377;</span>
                                <span class="price">999</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>3 Months membership</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Nutrition Plan</li>
                            </ul>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <a href="./membership_purchase.php" class="btn btn-primary btn-lg w-100">Buy Now</a>
                            <?php
                            } else {
                            ?>
                                <a href="./login_form.php" class="btn btn-primary btn-lg w-100">Buy Now</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Training Section -->
    <section id="training" class="py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h6 class="text-uppercase fw-bold accent-color">Training Programs</h6>
                <h2 class="fw-bold">Specialized Muscle Group Training</h2>
                <div class="accent-line mx-auto"></div>
            </div>
            <div class="row g-4">


                <?php
                if (mysqli_num_rows($muscle) > 0) {
                    while ($muscleGroup = mysqli_fetch_assoc($muscle)) { ?>


                        <!-- Back -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card muscle-card h-100">
                                <div class="card-img-overlay-wrapper">
                                    <img src="./Images/muscle_groups/<?= $muscleGroup['muscle_image']; ?>" class="card-img-top" alt="<?= $muscleGroup['muscle_name']; ?>">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title"><?= $muscleGroup['muscle_name']; ?></h5>
                                        <p class="card-text"><?= $muscleGroup['muscle_desc']; ?></p>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <a href="./videos.php?muscleId=<?= $muscleGroup['muscle_id']; ?>" class="btn btn-outline-primary">Explore Training</a>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>

    <?php include_once 'footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="./JS/script.js"></script>
</body>

</html>