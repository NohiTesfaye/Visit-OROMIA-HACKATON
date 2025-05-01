<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Tourism Management</title>
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
        .signup-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            animation: fadeIn 1s ease-in-out;
        }
        .signup-container h1 {
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
        .btn-signup {
            background-color: #28a745;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            width: 100%;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-signup:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .login-prompt {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #343a40;
        }
        .login-prompt a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .login-prompt a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="signupAction.php" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your full name here" id="fullname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email here" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter your phone no. here" id="phone" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter a username here" id="username" required>
                <p id="usernameExists" style="font-size: 1rem; color: red; font-weight: 400; margin-top: 5px; display: none;">This username already exists. Please choose a different one.</p>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter a password here" id="password" required>
            </div>
            <div class="mb-3">
                <label for="repeatPassword" class="form-label">Repeat Password:</label>
                <input type="password" class="form-control" name="repeatPassword" placeholder="Enter the same password again" id="repeatPassword" required>
            </div>
            <div class="mb-3">
                <label for="addressLine1" class="form-label">Address Line 1:</label>
                <input type="text" class="form-control" name="addressLine1" placeholder="Enter your House No./ Flat No. or Apartment No." required>
            </div>
            <div class="mb-3">
                <label for="addressLine2" class="form-label">Address Line 2:</label>
                <input type="text" class="form-control" name="addressLine2" placeholder="Enter the name of your Lane, Locality" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" name="city" placeholder="Enter the name of your city here" id="city" required>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State:</label>
                <input type="text" class="form-control" name="state" placeholder="Enter the name of your state here" id="state" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-signup" name="signup" id="signupButton">Sign Up</button>
            </div>
        </form>
        <div class="login-prompt">
            Already have an account? <a href="login.php">Login</a> instead.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>