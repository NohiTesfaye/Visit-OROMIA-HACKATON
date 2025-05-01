<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Tourism Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Poppins', sans-serif;
            color: #333;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }
        .login-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 500;
            color: #343a40;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.5);
        }
        .btn-login {
            background-color: #28a745;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            width: 100%;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
            font-size: 1rem;
            color: #343a40;
        }
        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .signup-prompt {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #343a40;
        }
        .signup-prompt a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .signup-prompt a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="loginAction.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username here" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password here" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-login" name="login">Login</button>
            </div>
            <div class="forgot-password">
                <a href="forgotPassword.php">Forgot Password?</a>
            </div>
        </form>
        <div class="signup-prompt">
            New user? <a href="signup.php">Sign Up</a> instead.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>