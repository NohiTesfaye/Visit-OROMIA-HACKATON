<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | User Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | User Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
            --accent-color: #fd79a8;
            --dark-color: #2d3436;
            --light-color: #f5f6fa;
            --success-color: #00b894;
            --warning-color: #fdcb6e;
            --danger-color: #d63031;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-color);
            padding-top: 70px; /* For fixed navbar */
        }
        
        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 0.8rem 1rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .nav-link {
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255,255,255,0.2);
        }
        
        .navbar-nav .nav-link i {
            min-width: 20px;
            margin-right: 5px;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            background: white;
        }
        
        .card-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.2rem 1.5rem;
            border-bottom: none;
        }
        
        .card-title {
            font-weight: 600;
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }
        
        .card-title i {
            margin-right: 10px;
        }
        
        /* Form Styles */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.25);
        }
        
        /* Status Messages */
        .status-message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
            display: none;
        }
        
        .success-message {
            background-color: rgba(0, 184, 148, 0.2);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }
        
        .error-message {
            background-color: rgba(214, 48, 49, 0.2);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar-collapse {
                padding: 1rem 0;
            }
            .nav-link {
                margin: 0.2rem 0;
                padding: 0.8rem 1rem;
            }
        }
    </style>
</head>
<body>
   <!-- Top Navigation Bar -->
   <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-globe-americas"></i> Tourism Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="users_add.php">
                            <i class="fas fa-users"></i> User Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotels_add.php">
                            <i class="fas fa-hotel"></i> Hotels
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotelbookings_view.php">
                            <i class="fas fa-calendar-check"></i> Hotel Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flights_add.php">
                            <i class="fas fa-plane"></i> Flights
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flightbookings_view.php">
                            <i class="fas fa-ticket-alt"></i> Flight Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trains_add.php">
                            <i class="fas fa-train"></i> Trains
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trainbookings_view.php">
                            <i class="fas fa-ticket-alt"></i> Train Bookings
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="adminLogout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     <!-- Main Content -->
     <div class="container my-5">
        <!-- Add New User Card (Centered in Middle) -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-plus"></i> Add New User</h3>
                    </div>
                    <div class="card-body">
                        <!-- Your PHP form code here -->
                        
                    </div>
                </div>
            </div>
        </div>
  
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "projectmeteor1";
                            $UserID = "";
                            $FullName = "";
                            $EMail = "";
                            $Phone = "";
                            $Username = "";
                            $Password = "";
                            $AddressLine1 = "";
                            $AddressLine2 = "";
                            $City = "";
                            $State = "";
                            $Date = "";

                            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                            // Connect to MySQL database
                            try {
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                            } catch (MySQLi_Sql_Exception $ex) {
                                echo '<div class="error-message status-message">Connection Error: ' . $ex->getMessage() . '</div>';
                            }

                            // Get data from the form
                            function getData() {
                                $data = array();
                                $data[0] = isset($_POST['UserID']) ? $_POST['UserID'] : '';
                                $data[1] = isset($_POST['FullName']) ? $_POST['FullName'] : '';
                                $data[2] = isset($_POST['EMail']) ? $_POST['EMail'] : '';
                                $data[3] = isset($_POST['Phone']) ? $_POST['Phone'] : '';
                                $data[4] = isset($_POST['Username']) ? $_POST['Username'] : '';
                                $data[5] = isset($_POST['Password']) ? $_POST['Password'] : '';
                                $data[6] = isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : '';
                                $data[7] = isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : '';
                                $data[8] = isset($_POST['City']) ? $_POST['City'] : '';
                                $data[9] = isset($_POST['State']) ? $_POST['State'] : '';
                                $data[10] = isset($_POST['Date']) ? $_POST['Date'] : '';
                                return $data;
                            }

                            // Insert new user
                            if (isset($_POST['insert'])) {
                                $info = getData();
                                
                                // Validate required fields
                                if (empty($info[1]) || empty($info[2]) || empty($info[4]) || empty($info[5])) {
                                    echo '<div class="error-message status-message">Please fill in all required fields</div>';
                                } else {
                                    $insert_query = "INSERT INTO `users` (`FullName`, `EMail`, `Phone`, `Username`, `Password`, `AddressLine1`, `AddressLine2`, `City`, `State`, `Date`) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                    
                                    try {
                                        $stmt = $conn->prepare($insert_query);
                                        $stmt->bind_param("ssssssssss", $info[1], $info[2], $info[3], $info[4], $info[5], $info[6], $info[7], $info[8], $info[9], $info[10]);
                                        $stmt->execute();
                                        
                                        if ($stmt->affected_rows > 0) {
                                            echo '<div class="success-message status-message">User added successfully!</div>';
                                            // Clear form fields
                                            $FullName = $EMail = $Phone = $Username = $Password = $AddressLine1 = $AddressLine2 = $City = $State = $Date = '';
                                        } else {
                                            echo '<div class="error-message status-message">Failed to add user</div>';
                                        }
                                    } catch (Exception $ex) {
                                        echo '<div class="error-message status-message">Error: ' . $ex->getMessage() . '</div>';
                                    }
                                }
                            }
                            ?>
                            
                            <form method="post" action="">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="FullName" class="form-label">Full Name *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="FullName" class="form-control" placeholder="John Doe" value="<?php echo htmlspecialchars($FullName); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="Username" class="form-label">Username *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            <input type="text" name="Username" class="form-control" placeholder="johndoe" value="<?php echo htmlspecialchars($Username); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="EMail" class="form-label">Email *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="EMail" class="form-control" placeholder="john@example.com" value="<?php echo htmlspecialchars($EMail); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="Phone" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="tel" pattern="^\d{10}$" class="form-control" name="Phone" placeholder="1234567890" value="<?php echo htmlspecialchars($Phone); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="Password" class="form-label">Password *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" name="Password" class="form-control" placeholder="••••••••" value="<?php echo htmlspecialchars($Password); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="Date" class="form-label">Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input type="date" name="Date" class="form-control" value="<?php echo htmlspecialchars($Date); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="AddressLine1" class="form-label">Address Line 1</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input type="text" name="AddressLine1" class="form-control" placeholder="123 Main St" value="<?php echo htmlspecialchars($AddressLine1); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="AddressLine2" class="form-label">Address Line 2</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input type="text" name="AddressLine2" class="form-control" placeholder="Apt 4B" value="<?php echo htmlspecialchars($AddressLine2); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="City" class="form-label">City</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                            <input type="text" name="City" class="form-control" placeholder="New York" value="<?php echo htmlspecialchars($City); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="State" class="form-label">State</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                            <input type="text" name="State" class="form-control" placeholder="NY" value="<?php echo htmlspecialchars($State); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-4">
                                        <button type="submit" name="insert" class="btn btn-success btn-lg w-100">
                                            <i class="fas fa-user-plus me-2"></i> Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-10">
                    <div class="card animated-card" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Current Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                // Fetch data from the `users` table
                                $sql = "SELECT UserID, FullName, EMail, Phone, Username, City, Date FROM users ORDER BY UserID DESC LIMIT 10";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<table class="table table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th><i class="fas fa-id-card"></i> ID</th>
                                                    <th><i class="fas fa-user"></i> Name</th>
                                                    <th><i class="fas fa-envelope"></i> Email</th>
                                                    <th><i class="fas fa-phone"></i> Phone</th>
                                                    <th><i class="fas fa-user"></i> Username</th>
                                                    <th><i class="fas fa-calendar"></i> Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                                <td>' . htmlspecialchars($row['UserID']) . '</td>
                                                <td>' . htmlspecialchars($row['FullName']) . '</td>
                                                <td>' . htmlspecialchars($row['EMail']) . '</td>
                                                <td>' . htmlspecialchars($row['Phone']) . '</td>
                                                <td>' . htmlspecialchars($row['Username']) . '</td>
                                                <td>' . htmlspecialchars($row['Date']) . '</td>
                                              </tr>';
                                    }
                                    
                                    echo '</tbody></table>';
                                } else {
                                    echo '<div class="alert alert-info">No users found in the database</div>';
                                }
                                ?>
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <a href="users_update.php" class="btn btn-primary">
                                    <i class="fas fa-edit me-2"></i> Manage Users (Edit/Delete)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Show status messages if they exist
        document.addEventListener('DOMContentLoaded', function()) {
            const statusMessages = document.querySelectorAll('.status-message');
            statusMessages.forEach(message => {
                if(message.textContent.trim() !== '') {
                    message.style.display = 'block';
                    setTimeout(() => {
                        message.style.opacity = '0';
                        message.style.transition = 'opacity 1s ease';
                        setTimeout(() => message.remove(), 1000);
                    }, 5000);
                }
            });
            
          };
            
            // Close sidebar when clicking outside on mobile
          
    </script>
</body>
</html>