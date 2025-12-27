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

        .form-control,
        .form-select {
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

        .error {
            color: #ff5722 !important;
            display: flex;
            justify-content: end;
        }

        .login-link {
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
                <h2 class="fw-bold">Member Registration</h2>
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
                                    <form action="save_registration.php" method="post" enctype="multipart/form-data" id="registrationForm">

                                        <div class="mb-4">
                                            <p class="error text-muted" id="error">* Fill in your details to complete your registration.</p>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" name="firstName" id="firstName" required onkeypress="return /^[a-zA-Z]$/.test(event.key)">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" name="lastName" id="lastName" required onkeypress="return /^[a-zA-Z]$/.test(event.key)">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" name="phone" id="phone" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        </div>

                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" id="dob" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>

                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="termsCheck" checked required style="pointer-events: none;">
                                                <label class="form-check-label" for="termsCheck">
                                                    I agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary btn-register" onclick="verify()">Complete Registration</button>
                                        </div>

                                        <div class="mt-3 mb-3 login-link">
                                            <p class="text-muted">Already have an account? <b><a href="login_form.php">Login here</a></b></p>
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
        function verify() {
            let fname = document.getElementById('firstName').value;
            let lname = document.getElementById('lastName').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let dob = document.getElementById('dob').value;
            let password = document.getElementById('password').value;

            let email_regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (fname === "" || lname === "" || email === "" || phone === "" || dob === "" || password === "") {
                document.getElementById('error').innerHTML = "* Please fill in all the fields.";
            } 
            else if (!email_regex.test(email)) {
                document.getElementById('error').innerHTML = "* Please enter a valid email address.";
            }
            else if(phone.length < 10)
            {
                document.getElementById('error').innerHTML = "* Phone number must be at least 10 digits.";
            }
            else if(dob > new Date().toISOString().split('T')[0])
            {
                document.getElementById('error').innerHTML = "* Date of Birth cannot be in the future.";
            }
            
            else {
                document.getElementById('registrationForm').submit();
            }
        }
    </script>
</body>

</html>