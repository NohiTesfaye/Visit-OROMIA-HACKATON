<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Users </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="js/bootstrap.min.js"></script>
<style>
	body {
    background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
    width: 100%;
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
	$search_query="SELECT * FROM users WHERE UserID = '$info[0]'";
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
				echo("No data are available");
			}
		} else{
			echo("Result error");
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
				echo("Data inserted successfully");

			}else{
				echo("Data not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
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
				echo("Data deleted");
			}else{
				echo("Data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("Error in deleting".$ex->getMessage());
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
				echo("Data updated");
			}else{
				echo("Data not updated");
			}
		}
	}catch(Exception $ex){
		echo("Error in updating".$ex->getMessage());
	}
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourism Management System</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar-brand {
      font-size: 1.8rem;
      font-weight: bold;
      color: #fff !important;
    }
    .navbar {
      background-color: #007bff !important;
      border-radius: 0;
      margin-bottom: 20px;
    }
    .navbar-nav {
      margin-left: auto;
    }
    .navbar-nav a {
      color: #fff !important;
      font-size: 1.1rem;
      margin: 0 10px;
    }
    .navbar-nav a:hover {
      color: #f8f9fa !important;
      text-decoration: underline;
    }
    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }
    .form-container h4 {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }
    .form-control {
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 15px;
    }
    .btn-success, .btn-info {
      width: 100%;
      padding: 12px;
      font-size: 1.1rem;
      border-radius: 5px;
      margin-top: 10px;
    }
    .btn-success {
      background-color: #28a745;
      border: none;
    }
    .btn-info {
      background-color: #17a2b8;
      border: none;
    }
    .btn-success:hover {
      background-color: #218838;
    }
    .btn-info:hover {
      background-color: #138496;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fas fa-globe"></i> Tourism Management System
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="Home.php">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="users_add.php">USERS</a></li>
          <li class="nav-item"><a class="nav-link" href="hotels_add.php">ADD HOTELS</a></li>
          <li class="nav-item"><a class="nav-link" href="hotelbookings_view.php">HOTEL BOOKINGS</a></li>
          <li class="nav-item"><a class="nav-link" href="flights_add.php">ADD FLIGHTS</a></li>
          <li class="nav-item"><a class="nav-link" href="flightbookings_view.php">FLIGHT BOOKINGS</a></li>
          <li class="nav-item"><a class="nav-link" href="trains_add.php">ADD TRAINS</a></li>
          <li class="nav-item"><a class="nav-link" href="trainbookings_view.php">TRAIN BOOKINGS</a></li>
          <li class="nav-item"><a class="nav-link" href="adminLogout.php">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Form Container -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-container">
          <form method="post" action="">
            <h4>UserID Number (Use to Search user's data)</h4>
            <input type="number" name="UserID" class="form-control" placeholder="UserID No. / Automatic Number Generates" value="<?php echo($UserID); ?>" disabled>

            <div class="row">
              <div class="col-md-6">
                <h4>Full Name</h4>
                <input type="text" name="FullName" class="form-control" placeholder="Enter Full Name" value="<?php echo($FullName); ?>" required>
              </div>
              <div class="col-md-6">
                <h4>Username</h4>
                <input type="text" name="Username" class="form-control" placeholder="Enter Username" value="<?php echo($Username); ?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <h4>Email</h4>
                <input type="email" name="EMail" class="form-control" placeholder="Enter Email" value="<?php echo($EMail); ?>" required>
              </div>
              <div class="col-md-6">
                <h4>Phone (10-digit)</h4>
                <input type="tel" pattern="^\d{10}$" class="form-control" name="Phone" placeholder="10-digit Phone Number" value="<?php echo($Phone); ?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <h4>Password</h4>
                <input type="password" name="Password" class="form-control" placeholder="Enter Password" value="<?php echo($Password); ?>" required>
              </div>
              <div class="col-md-6">
                <h4>Address Line 1</h4>
                <input type="text" name="AddressLine1" class="form-control" placeholder="Enter Address Line 1" value="<?php echo($AddressLine1); ?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <h4>Address Line 2</h4>
                <input type="text" name="AddressLine2" class="form-control" placeholder="Enter Address Line 2" value="<?php echo($AddressLine2); ?>" required>
              </div>
              <div class="col-md-6">
                <h4>City</h4>
                <input type="text" name="City" class="form-control" placeholder="Enter City" value="<?php echo($City); ?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <h4>State</h4>
                <input type="text" name="State" class="form-control" placeholder="Enter State" value="<?php echo($State); ?>" required>
              </div>
              <div class="col-md-6">
                <h4>Date</h4>
                <input type="date" name="Date" class="form-control" placeholder="Enter Date" value="<?php echo($Date); ?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <input type="submit" class="btn btn-success" name="insert" value="Add">
                <a href="users_update.php" class="btn btn-info">Update | Delete | Search</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data - Admin Panel</title>
    <!-- Bootstrap CSS for modern styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts for a modern typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }
        h1 {
            font-weight: bold;
            margin-top: 20px;
            color: #dc3545; /* Red color for emphasis */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
        }
        .table {
            margin-top: 20px;
            border: 2px solid #000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-in-out;
        }
        .table th {
            background-color: #343a40; /* Dark gray header */
            color: #fff;
            font-size: 18px;
            text-align: center;
            padding: 15px;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05); /* Light striped effect */
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075); /* Hover effect */
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }
        .container {
            max-width: 100%;
            padding: 20px;
        }
        .btn-refresh {
            background-color: #28a745; /* Green color for the refresh button */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-refresh:hover {
            background-color: #218838; /* Darker green on hover */
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1><i class="fas fa-users-cog"></i> USERS DATA - ADMIN PANEL</h1>
                <hr>
                <button class="btn-refresh" onclick="window.location.reload();">
                    <i class="fas fa-sync-alt"></i> Refresh Data
                </button>
                <br><br>
                <?php
                // Database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "projectmeteor";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from the `users` table
                $sql = "SELECT UserID, FullName, EMail, Phone, Username, Password, AddressLine1, AddressLine2, City, State, Date FROM users";
                $result = $conn->query($sql);

                // Display data in a table
                if ($result->num_rows > 0) {
                    echo '
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>UserID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>';

                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . htmlspecialchars($row['UserID']) . '</td>
                            <td>' . htmlspecialchars($row['FullName']) . '</td>
                            <td>' . htmlspecialchars($row['EMail']) . '</td>
                            <td>' . htmlspecialchars($row['Phone']) . '</td>
                            <td>' . htmlspecialchars($row['Username']) . '</td>
                            <td>' . htmlspecialchars($row['Password']) . '</td>
                            <td>' . htmlspecialchars($row['AddressLine1']) . '</td>
                            <td>' . htmlspecialchars($row['AddressLine2']) . '</td>
                            <td>' . htmlspecialchars($row['City']) . '</td>
                            <td>' . htmlspecialchars($row['State']) . '</td>
                            <td>' . htmlspecialchars($row['Date']) . '</td>
                        </tr>';
                    }

                    echo '
                            </tbody>
                        </table>
                    </div>';
                } else {
                    echo '<p class="text-center text-muted">No records found.</p>';
                }

                // Close the connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>