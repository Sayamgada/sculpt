
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sculpt Gym</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./CSS/styles.css">
    <style>
        .registration-section {
            padding-top: 120px;
            padding-bottom: 80px;
            min-height: 100vh;
        }
        
        .registration-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .registration-image {
            height: 100%;
            background: url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
        }
        
        .form-label {
            font-weight: 500;
        }
        
        .form-control, .form-select {
            padding: 12px;
            border-radius: 8px;
        }
        
        .btn-register {
            padding: 12px 30px;
            font-weight: 600;
        }

        .form-check-input:checked {
            background-color: #ff5722;
            border-color: #ff5722;
        }

        .error
        {
            color: #ff5722 !important;
            display: flex;
            justify-content: end;
        }

        .login-link
        {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body class="light-mode">

    <?php include_once 'header.php'; ?>

    <!-- Registration Section -->
    <section class="registration-section">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h6 class="text-uppercase fw-bold accent-color">Join Sculpt</h6>
                <h2 class="fw-bold">Member Login</h2>
                <div class="accent-line mx-auto"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card registration-card">
                        <div class="row g-0">

                            <div class="col-md-5 d-none d-md-block">
                                <div class="registration-image"></div>
                            </div>

                            <div class="col-md-7">
                                <div class="card-body p-4 p-lg-5">
                                    <form action="login_verify.php" method="post" enctype="multipart/form-data" id="registrationForm">

                                        <div class="mb-4">
                                            <p class="error text-muted" id="error">* Fill in your details to complete your registration.</p>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" required>
                                        </div>

                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary btn-register" onclick="verify()">Login</button>
                                        </div>

                                        <div class="mt-3 mb-3 login-link">
                                            <p class="text-muted">Don't have an account? <b><a href="register_form.php">Register here</a></b></p>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./JS/script.js"></script>
    <script>

        function verify()
        {

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            if(email == "" || password == "")
            {
                document.getElementById('error').innerHTML = "* Please fill in all the fields.";
            }
            else
            {
                document.getElementById('registrationForm').submit();
            }

        }
        

        
    </script>
</body>
</html>

