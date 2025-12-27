<?php session_start(); ?>

<?php if (isset($_SESSION['login_error'])): ?>
    <div id="errorMessage" style="display:block;">
        <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
    </div>
<?php endif; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
            color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            background-color: #1e1e1e;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .login-header {
            margin-bottom: 30px;
        }
        
        .login-header h2 {
            color: #ff5722;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .login-header p {
            color: #adb5bd;
            font-size: 14px;
            text-align: center;
            margin: 0 auto;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 25px;
            text-align: left;
        }
        
        .form-control {
            height: 50px;
            background-color: #2d2d2d !important;
            border: none;
            border-radius: 8px;
            color: #f8f9fa !important;
            padding-left: 45px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(255, 87, 34, 0.25);
            background-color: #333333 !important;
        }
        
        .input-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            color: #ff5722;
            z-index: 10;
        }
        
        .login-btn {
            background-color: #ff5722;
            border: none;
            height: 50px;
            font-weight: 500;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(255, 87, 34, 0.3);
            color: white;
            width: 100%;
            cursor: pointer;
        }
        
        .login-btn:hover, .login-btn:focus {
            background-color: #e64a19;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 87, 34, 0.4);
        }
        
        .error-shake {
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        #errorMessage {
            background-color: rgba(255, 87, 34, 0.1);
            border-left: 4px solid #ff5722;
            padding: 12px;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
            display: none;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 15px;
            color: #adb5bd;
            cursor: pointer;
            z-index: 10;
        }
        
        .password-toggle:hover {
            color: #ff5722;
        }
        
        /* Additional responsiveness */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
            
            .login-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Admin Login</h2>
            <p>Enter your credentials to access the admin panel</p>
        </div>
        <form id="adminLoginForm" action="admin_validate_login.php" method="POST">
            <div class="input-group">
                <span class="input-icon">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <span class="input-icon">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" class="form-control" id="password" placeholder="Password" required>
                <span class="password-toggle" onclick="togglePassword()">
                    <i id="passwordToggleIcon" class="fas fa-eye-slash"></i>
                </span>
            </div>
            <button type="submit" class="login-btn">
                <span id="loginText">Login</span>
                <span id="loadingIcon" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </span>
            </button>
            <div id="errorMessage"></div>
        </form>
    </div>
    
    <!-- JavaScript -->
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordToggleIcon = document.getElementById('passwordToggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordToggleIcon.classList.remove('fa-eye-slash');
                passwordToggleIcon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                passwordToggleIcon.classList.remove('fa-eye');
                passwordToggleIcon.classList.add('fa-eye-slash');
            }
        }
        
        // Form submission
        document.getElementById('adminLoginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const errorMessage = document.getElementById('errorMessage');
            const loginText = document.getElementById('loginText');
            const loadingIcon = document.getElementById('loadingIcon');
            const loginContainer = document.querySelector('.login-container');
            
            // Basic validation
            if (username === '' || password === '') {
                showError('Please enter both username and password');
                return;
            }
            else if(username == 'admin' && password == 'admin')
            {
                document.getElementById('adminLoginForm').submit();
            }
            else {
                // Show loading icon and hide login text
                loginText.style.display = 'none';
                loadingIcon.style.display = 'inline-block';
                
                
                    // Hide loading icon and show login text
                    loadingIcon.style.display = 'none';
                    loginText.style.display = 'inline-block';
                    
                    // Show error message for invalid credentials
                    showError('Invalid username or password');
               
            }
        });
        
        function showError(message) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
            
            // Add shake animation
            const loginContainer = document.querySelector('.login-container');
            loginContainer.classList.add('error-shake');
            
            // Remove animation class after it completes
            setTimeout(function() {
                loginContainer.classList.remove('error-shake');
            }, 500);
        }
        
        // Add focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.input-icon').style.color = '#ff5722';
            });
            
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.querySelector('.input-icon').style.color = '#ff5722';
                }
            });
        });
    </script>
</body>
</html>