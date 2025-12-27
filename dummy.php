<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2>Admin Login</h2>
            </div>
            <form id="adminLoginForm">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div id="errorMessage" class="mt-3 text-danger" style="display: none;"></div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('adminLoginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const errorMessage = document.getElementById('errorMessage');
            
            // Basic validation
            if (username === '' || password === '') {
                errorMessage.textContent = 'Please enter both username and password';
                errorMessage.style.display = 'block';
                return;
            }
            
            // Here you would typically send the data to a server for authentication
            // For demonstration, we'll just log the values
            console.log('Login attempt:', { username, password });
            
            // Simulate form submission
            errorMessage.style.display = 'none';
            alert('Login form submitted. In a real application, this would be sent to the server.');
            
            // You can redirect to another page after successful login
            // window.location.href = 'dashboard.html';
        });
    </script>
</body>
</html>