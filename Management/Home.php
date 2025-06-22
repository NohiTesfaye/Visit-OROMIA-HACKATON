<?php 
session_start();
if(!isset($_SESSION['username'])){
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

// Get dashboard statistics
$stats = [
    'users' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users"))['count'] ?? 0,
    'hotels' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM hotels"))['count'] ?? 0,
    'hotelbookings' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM hotelbookings"))['count'] ?? 0,
    'flights' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM flights"))['count'] ?? 0,
    'trains' => mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM trains"))['count'] ?? 0
];

// Handle profile page inclusions
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case 'profile':
            include('admin_profile.php');
            exit();
        case 'change_password':
            include('change_password.php');
            exit();
    }
}

// Get admin profile data
$admin_username = $_SESSION['username'];
$sql = "SELECT * FROM admin WHERE username='$admin_username'";
$result = mysqli_query($conn, $sql);
$admin_data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .dashboard-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }
    .dashboard-container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
    }
    .dashboard-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin: 15px;
      text-align: center;
      transition: transform 0.3s ease;
      height: 200px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
    }
    .dashboard-card a {
      text-decoration: none;
      color: #333;
    }
    .dashboard-card i {
      font-size: 4rem;
      margin-bottom: 20px;
      color: #007bff;
    }
    .dashboard-card h3 {
      font-size: 1.5rem;
      margin: 0;
      font-weight: bold;
    }
    .btn-logout {
      background-color: #dc3545;
      color: #fff;
      border: none;
      padding: 15px 30px;
      border-radius: 10px;
      transition: background-color 0.3s ease;
      font-size: 1.2rem;
    }
    .btn-logout:hover {
      background-color: #c82333;
    }
    .profile-info {
      position: absolute;
      top: 10px;
      right: 20px;
      display: flex;
      align-items: center;
    }
    .profile-dropdown {
      position: relative;
      display: inline-block;
    }
    .profile-btn {
      background: none;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
    }
    .profile-img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
      background-color: #007bff;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
    .profile-name {
      margin-right: 10px;
      font-weight: bold;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 200px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 5px;
      overflow: hidden;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      transition: background-color 0.3s;
    }
    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }
    .profile-dropdown:hover .dropdown-content {
      display: block;
    }
    .profile-section {
      padding: 15px;
      border-bottom: 1px solid #eee;
    }
    .stat-card {
      transition: all 0.3s ease;
      margin-bottom: 15px;
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      color: white;
    }
    .stat-card h2 {
      font-size: 2rem;
      margin-top: 10px;
    }
    @media (max-width: 768px) {
      .dashboard-card {
          height: auto;
          padding: 20px;
      }
      .profile-info {
          position: static;
          justify-content: center;
          margin-top: 20px;
      }
      .stat-card {
          margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
<div class="dashboard-header">
    <h1>VISIT OROMIA</h1>
    <h2>VISIT OROMIA ADMIN PANEL</h2>
    
    <!-- Admin Profile Section -->
    <div class="profile-info">
      <div class="profile-dropdown">
        <button class="profile-btn">
          <div class="profile-img">
            <?php echo strtoupper(substr($admin_data['username'], 0, 1)); ?>
          </div>
          <span class="profile-name"><?php echo htmlspecialchars($admin_data['UserName']); ?></span>
          <i class="fas fa-caret-down"></i>
        </button>
       <div class="dropdown-content">
    <div class="profile-section">
        <div class="profile-img" style="width: 60px; height: 60px; margin: 0 auto 10px;">
            <?php echo strtoupper(substr($admin_data['username'], 0, 1)); ?>
        </div>
        <h5 style="text-align: center; margin-bottom: 5px;"><?php echo htmlspecialchars($admin_data['UserName']); ?></h5>
        <p style="text-align: center; color: #666; font-size: 0.9rem;">Administrator</p>
    </div>
    <a href="admin_profile.php"><i class="fas fa-user-cog"></i> Profile Settings</a>
    <a href="change_password.php"><i class="fas fa-key"></i> Change Password</a>
    <a href="adminLogout.php" style="color: #dc3545;"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
      </div>
    </div>
  </div>
  
  <div class="dashboard-container">
    <!-- Statistics Cards Row -->
    <div class="row mb-4">
      <div class="col-md-3">
        <div class="stat-card bg-primary">
          <h5>Total Users</h5>
          <h2><?= $stats['users'] ?></h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card bg-success">
          <h5>Hotels Listed</h5>
          <h2><?= $stats['hotels'] ?></h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card bg-info">
          <h5>Total Bookings</h5>
          <h2><?= $stats['hotelbookings'] ?></h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card bg-warning">
          <h5>Flights Listed</h5>
          <h2><?= $stats['flights'] ?></h2>
        </div>
      </div>
    </div>
    
    <!-- Main Dashboard Cards -->
    <div class="row">
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="users_add.php">
            <i class="fas fa-users"></i>
            <h3>USERS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="hotels_add.php">
            <i class="fas fa-hotel"></i>
            <h3>ADD HOTELS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="hotelbookings_view.php">
            <i class="fas fa-book"></i>
            <h3>HOTEL BOOKINGS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="flights_add.php">
            <i class="fas fa-plane"></i>
            <h3>ADD FLIGHTS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="flightbookings_view.php">
            <i class="fas fa-ticket-alt"></i>
            <h3>FLIGHT BOOKINGS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="trains_add.php">
            <i class="fas fa-train"></i>
            <h3>ADD BUS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="trainbookings_view.php">
            <i class="fas fa-subway"></i>
            <h3>BUS BOOKINGS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="adminLogout.php" class="btn btn-logout">
            <i class="fas fa-sign-out-alt"></i>
            <h3>LOG OUT</h3>
          </a>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>