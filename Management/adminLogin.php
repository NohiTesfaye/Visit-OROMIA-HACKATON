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
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
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
        }

        .login-container .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .login-container .btn-primary:active {
            transform: translateY(0);
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
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Panel</h1>
        <form method="post" action="">
            <div>
                <h3>Username:</h3>
                <input type="text" id="txt_uname" name="username" placeholder="Enter Username" required>
            </div>
            <div>
                <h3>Password:</h3>
                <input type="password" id="txt_pwd" name="password" placeholder="Enter Password" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="but_submit">Login</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();

        $servername = "localhost";
		$usernameConn = "root";
		$passwordConn = "";
		$dbname = "projectmeteor";
		
		// Creating a connection to projectmeteor MySQL database
		$conn = mysqli_connect($servername, $usernameConn, $passwordConn, $dbname);
		
		// Checking if we've successfully connected to the database
		if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

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
        }else{
            echo "<h4 class='text-center bg-danger' style='font-weight:bold';>Invalid username and password</h4>";
        }

    }

}
?>



</body>
</html>