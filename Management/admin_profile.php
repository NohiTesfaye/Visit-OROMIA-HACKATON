<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: adminLogin.php');
    exit();
}

// Database connection
$servername = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbname = "projectmeteor1";

$conn = mysqli_connect($servername, $usernameConn, $passwordConn, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get admin data
$admin_username = $_SESSION['username'];
$sql = "SELECT * FROM admin WHERE username='$admin_username'";
$result = mysqli_query($conn, $sql);
$admin_data = mysqli_fetch_assoc($result);

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    
    $update_sql = "UPDATE admin SET email='$email', full_name='$full_name' WHERE username='$admin_username'";
    if(mysqli_query($conn, $update_sql)) {
        $success = "Profile updated successfully!";
        // Refresh data
        $result = mysqli_query($conn, $sql);
        $admin_data = mysqli_fetch_assoc($result);
    } else {
        $error = "Error updating profile: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 15px;
        }
    </style>
</head>
<body>
    <?php  // If you have a navigation file ?>
    <div class="container">
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-img">
                    <?php echo strtoupper(substr($admin_data['UserName'], 0, 1)); ?>
                </div>
                <h2>Admin Profile</h2>
            </div>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($admin_data['Username']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo htmlspecialchars($admin_data['full_name'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($admin_data['email'] ?? ''); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="Home.php" class="btn btn-secondary">Back to Dashboard</a>
            </form>
        </div>
    </div>
</body>
</html>