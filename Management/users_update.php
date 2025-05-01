<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel | Users Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
        }
        
        .navbar-brand {
            font-family: 'Courgette', cursive;
            font-size: 1.8rem;
            color: var(--light-color) !important;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .navbar {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color)) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .nav-link {
            color: var(--light-color) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
            border-radius: 4px;
        }
        
        .nav-link:hover {
            background-color: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255,255,255,0.9);
            margin-bottom: 30px;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.25);
        }
        
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: var(--dark-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            border: none;
            padding: 15px;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(108, 92, 231, 0.05);
            transform: scale(1.005);
        }
        
        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid #f0f0f0;
        }
        
        h1, h2, h3, h4 {
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
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
        
        .logout-btn {
            background-color: var(--danger-color);
            color: white !important;
            border-radius: 6px;
            padding: 8px 15px !important;
            margin-left: 10px;
        }
        
        .logout-btn:hover {
            background-color: #c0392b !important;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark-color);
        }
        
        .input-group-text {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
    </style>
</head>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="projectmeteor";
$UserID="";
$FullName="";
$EMail="";
$Phone="";
$Username="";
$Password="";
$AddressLine1="";
$AddressLine2="";
$City="";
$State="";
$Date="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
    $conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
    echo("Connection Error");
}
//get data from the form
function getData()
{
    $data = array();

$data[0]=$_POST['UserID'];
$data[1]=$_POST['FullName'];
$data[2]=$_POST['EMail'];
$data[3]=$_POST['Phone'];
$data[4]=$_POST['Username'];
$data[5]=$_POST['Password'];
$data[6]=$_POST['AddressLine1'];
$data[7]=$_POST['AddressLine2'];
$data[8]=$_POST['City'];
$data[9]=$_POST['State'];
$data[10]=$_POST['Date'];
    return $data;
}
//search
if(isset($_POST['search']))
{
    $info = getData();
    $search_query="SELECT * FROM users WHERE UserID ='$info[0]'";
    $search_result=mysqli_query($conn, $search_query);
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
                while($rows = mysqli_fetch_array($search_result))
                {
                    $UserID = $rows['UserID'];
                    $FullName = $rows['FullName'];
                    $EMail = $rows['EMail'];
                    $Phone = $rows['Phone'];
                    $Username = $rows['Username'];
                    $Password = $rows['Password'];
                    $AddressLine1 = $rows['AddressLine1'];
                    $AddressLine2 = $rows['AddressLine2'];
                    $City = $rows['City'];
                    $State = $rows['State'];
                    $Date = $rows['Date'];

                }
            }else{
                echo '<div class="error-message status-message">No data available for the specified UserID</div>';
            }
        } else{
            echo '<div class="error-message status-message">Error in search operation</div>';
        }

}
//insert
if(isset($_POST['insert'])){
    $info = getData();
    $insert_query="INSERT INTO `users`(`FullName`, `EMail`, `Phone`, `Username`,`Password`,`AddressLine1`,`AddressLine2`,`City`,`State`,`Date`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]')";
    try{
        $insert_result=mysqli_query($conn, $insert_query);
        if($insert_result)
        {
            if(mysqli_affected_rows($conn)>0){
                echo '<div class="success-message status-message">User data inserted successfully</div>';

            }else{
                echo '<div class="error-message status-message">Failed to insert user data</div>';
            }
        }
    }catch(Exception $ex){
        echo '<div class="error-message status-message">Error: '.$ex->getMessage().'</div>';
    }
}
//delete
if(isset($_POST['delete'])){
    $info = getData();
    $delete_query = "DELETE FROM `users` WHERE UserID = '$info[0]'";
    try{
        $delete_result = mysqli_query($conn, $delete_query);
        if($delete_result){
            if(mysqli_affected_rows($conn)>0)
            {
                echo '<div class="success-message status-message">User data deleted successfully</div>';
            }else{
                echo '<div class="error-message status-message">No user found with the specified ID</div>';
            }
        }
    }catch(Exception $ex){
        echo '<div class="error-message status-message">Error: '.$ex->getMessage().'</div>';
    }
}
//edit
if(isset($_POST['update'])){
    $info = getData();
    $update_query="UPDATE `users` SET FullName='$info[1]',EMail='$info[2]',Phone='$info[3]',Username='$info[4]',Password='$info[5]',AddressLine1='$info[6]',AddressLine2='$info[7]',City='$info[8]',State='$info[9]',Date='$info[10]' WHERE UserID = '$info[0]'";
    try{
        $update_result=mysqli_query($conn, $update_query);
        if($update_result){
            if(mysqli_affected_rows($conn)>0){
                echo '<div class="success-message status-message">User data updated successfully</div>';
            }else{
                echo '<div class="error-message status-message">No changes made or user not found</div>';
            }
        }
    }catch(Exception $ex){
        echo '<div class="error-message status-message">Error: '.$ex->getMessage().'</div>';
    }
}

?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Tourism Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="users_add.php"><i class="fas fa-users me-1"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotels_add.php"><i class="fas fa-hotel me-1"></i> Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotelbookings_view.php"><i class="fas fa-calendar-check me-1"></i> Hotel Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flights_add.php"><i class="fas fa-plane me-1"></i> Flights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flightbookings_view.php"><i class="fas fa-ticket-alt me-1"></i> Flight Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trains_add.php"><i class="fas fa-train me-1"></i> Trains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trainbookings_view.php"><i class="fas fa-ticket-alt me-1"></i> Train Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout-btn" href="adminLogout.php"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="section-title">User Management</h2>
                        <p class="text-muted mb-4">Search, update or delete user records</p>
                        
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="UserID" class="form-label">User ID</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="number" name="UserID" class="form-control" placeholder="Enter UserID to search" value="<?php echo($UserID);?>">
                                </div>
                                <small class="text-muted">Enter UserID to search for existing records</small>
                            </div>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="FullName" class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="FullName" class="form-control" placeholder="Full Name" value="<?php echo($FullName);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="Username" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        <input type="text" name="Username" class="form-control" placeholder="Username" value="<?php echo($Username);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="EMail" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="EMail" class="form-control" placeholder="Email" value="<?php echo($EMail);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" pattern="^\d{10}$" class="form-control" name="Phone" placeholder="10-digit phone" value="<?php echo($Phone);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="Password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="Password" class="form-control" placeholder="Password" value="<?php echo($Password);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="Date" class="form-label">Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        <input type="date" name="Date" class="form-control" value="<?php echo($Date);?>">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="AddressLine1" class="form-label">Address Line 1</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" name="AddressLine1" class="form-control" placeholder="Address Line 1" value="<?php echo($AddressLine1);?>">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="AddressLine2" class="form-label">Address Line 2</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" name="AddressLine2" class="form-control" placeholder="Address Line 2" value="<?php echo($AddressLine2);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="City" class="form-label">City</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        <input type="text" name="City" class="form-control" placeholder="City" value="<?php echo($City);?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="State" class="form-label">State</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        <input type="text" name="State" class="form-control" placeholder="State" value="<?php echo($State);?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-3 mt-4">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <button type="submit" name="search" class="btn btn-primary w-100">
                                            <i class="fas fa-search me-2"></i> Search
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="update" class="btn btn-warning w-100">
                                            <i class="fas fa-sync-alt me-2"></i> Update
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="delete" class="btn btn-danger w-100">
                                            <i class="fas fa-trash-alt me-2"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="section-title">Users Database</h2>
                        <p class="text-muted mb-4">All registered users in the system</p>
                        
                        <div class="table-responsive">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "projectmeteor";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die('<div class="error-message status-message">Connection failed: ' . $conn->connect_error . '</div>');
                            }

                            $sql = "SELECT UserID, FullName, EMail, Phone, Username, Password, AddressLine1, AddressLine2, City, State, Date FROM users";
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
                                                <th><i class="fas fa-city"></i> City</th>
                                                <th><i class="fas fa-calendar"></i> Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                            <td>'.$row['UserID'].'</td>
                                            <td>'.$row['FullName'].'</td>
                                            <td>'.$row['EMail'].'</td>
                                            <td>'.$row['Phone'].'</td>
                                            <td>'.$row['Username'].'</td>
                                            <td>'.$row['City'].'</td>
                                            <td>'.$row['Date'].'</td>
                                          </tr>';
                                }
                                
                                echo '</tbody></table>';
                            } else {
                                echo '<div class="alert alert-info">No users found in the database</div>';
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Show status messages if they exist
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>
</html>