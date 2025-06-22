<?php
session_start();

$servername = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbname = "projectmeteor1";

// Create connection
$conn = mysqli_connect($servername, $usernameConn, $passwordConn, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize message variables
$message = '';
$success = false;

// Login functionality
if(isset($_POST['but_submit'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if ($username != "" && $password != ""){
        $sql_query = "SELECT count(*) as cntUser FROM `admin` WHERE username='".$username."' AND password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: Home.php');
            exit();
        }else{
            $message = "Invalid username and password";
            $success = false;
        }
    }
}

// Password reset functionality
if(isset($_POST['but_reset'])){
    $email = mysqli_real_escape_string($conn, $_POST['reset_email']);
    
    // Check if email exists in admin table
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        // Generate a random temporary password
        $temp_password = substr(md5(rand()), 0, 8);
        $hashed_temp_password = md5($temp_password);
        
        // Update the admin's password with the temporary one
        $update_sql = "UPDATE admin SET password='$hashed_temp_password' WHERE email='$email'";
        if(mysqli_query($conn, $update_sql)){
            $message = "Your password has been reset. Your temporary password is: " . $temp_password;
            $success = true;
        } else {
            $message = "Error updating password. Please try again.";
            $success = false;
        }
    } else {
        $message = "No admin account found with that email address.";
        $success = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISIT OROMIA | Admin Panel</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .login-container h1 {
            font-family: 'Courgette', cursive;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .login-container h3 {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 10px;
            text-align: left;
        }

        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus,
        .login-container input[type="email"]:focus {
            border-color: #667eea;
            outline: none;
        }

        .login-container .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 15px;
        }

        .login-container .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 15px;
        }

        .login-container .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .login-container .btn-primary:active {
            transform: translateY(0);
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .reset-container {
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Panel</h1>
        
        <?php if(!empty($message)): ?>
            <div class="message <?php echo $success ? 'success' : 'error'; ?>"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <div id="login-form">
            <form method="post" action="">
                <div>
                    <h3>Username:</h3>
                    <input type="text" id="txt_uname" name="username" placeholder="Enter Username" required>
                </div>
                <div>
                    <h3>Password:</h3>
                    <input type="password" id="txt_pwd" name="password" placeholder="Enter Password" required>
                </div>
                <a href="#" class="forgot-password" id="forgot-password-link">Forgot Password?</a>
                <div>
                    <button type="submit" class="btn btn-primary" name="but_submit">Login</button>
                </div>
            </form>
        </div>
        
        <div id="reset-form" class="reset-container">
            <form method="post" action="">
                <div>
                    <h3>Email:</h3>
                    <input type="email" id="reset_email" name="reset_email" placeholder="Enter your registered email" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="but_reset">Reset Password</button>
                    <button type="button" class="btn btn-secondary" id="back-to-login">Back to Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('forgot-password-link').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('reset-form').style.display = 'block';
        });
        
        document.getElementById('back-to-login').addEventListener('click', function() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('reset-form').style.display = 'none';
        });
    </script>
</body>
</html>