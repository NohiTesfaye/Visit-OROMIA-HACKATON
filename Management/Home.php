<?php session_start();
if(!isset($_SESSION['username'])){
    header('Location: adminLogin.php');
}
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
      height: 200px; /* Fixed height for uniformity */
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
      font-size: 4rem; /* Larger icons */
      margin-bottom: 20px;
      color: #007bff;
    }
    .dashboard-card h3 {
      font-size: 1.5rem; /* Larger text */
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
  </style>
</head>
<body>
<div class="dashboard-header">
    <h1>VISIT OROMIA</h1>
    <h2>VISIT OROMIA ADMIN PANEL</h2>
  </div>
  <div class="dashboard-container">
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
            <h3>ADD TRAINS</h3>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="dashboard-card">
          <a href="trainbookings_view.php">
            <i class="fas fa-subway"></i>
            <h3>TRAIN BOOKINGS</h3>
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