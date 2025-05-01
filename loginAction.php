<?php
ob_start();
session_start();
?>

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
        .message-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        .message-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 20px;
        }
        .message-container p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }
        .btn-action {
            background-color: #28a745;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 8px;
            color: #fff;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-action:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <?php
    require("php/PasswordHash.php");
    $hasher = new PasswordHash(8, false);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $servername = "localhost";
    $usernameConn = "root";
    $passwordConn = "";
    $dbname = "projectmeteor";

    // Creating a connection to MySQL database
    $conn = new mysqli($servername, $usernameConn, $passwordConn, $dbname);

    // Checking if we've successfully connected to the database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Checking user details query
    $getUserDataSQL = "SELECT * FROM `users` WHERE Username='$username'";
    $getUserDataQuery = $conn->query($getUserDataSQL);
    $getResult = $getUserDataQuery->fetch_assoc();

    $passwordFromDB = $getResult["Password"];

    $check = $hasher->CheckPassword($password, $passwordFromDB);

    if ($check) {
        $_SESSION["valid"] = true;
        $_SESSION["timeout"] = time();
        $_SESSION["username"] = $username;
        ?>
        <div class="message-container">
            <h1>Login Successful</h1>
            <p>You've logged in successfully. You can now access your dashboard.</p>
            <a href="userDashboardProfile.php" class="btn-action">Take me to my Dashboard</a>
        </div>
    <?php } else { ?>
        <div class="message-container">
            <h1>Login Unsuccessful</h1>
            <p>Error logging in. Please try again with the correct username and password.</p>
            <a href="login.php" class="btn-action">Try Again</a>
        </div>
    <?php } ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>