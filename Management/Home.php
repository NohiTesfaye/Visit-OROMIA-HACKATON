<?php session_start();
if(!isset($_SESSION['username'])){
    header('Location: adminLogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css?family=Courgette"
      rel="stylesheet"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <style>
     body {
        background-image: url('images.jpg');
        background-repeat:no-repeat;
      }
      
     h1{
        font-size: 60px;
        font-family: Courgette;
      
      }
      .options {
    background-color: #f8f9fa; /* Light background color */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    padding: 20px; /* Padding inside the container */
    width: 400px; /* Increased width */
    min-height: 300px; /* Minimum height */
    margin: 0 auto; /* Center the container */
    text-align: center; /* Center the text */
}

.options h3 {
    margin: 15px 0; /* Space between each option */
    font-family: 'Arial', sans-serif; /* Font family */
}

.options a {
    text-decoration: none; /* Remove underline from links */
    color: #007bff; /* Link color */
    font-weight: bold; /* Bold text for links */
    transition: color 0.3s, transform 0.3s; /* Smooth transition for hover effect */
}

.options a:hover {
    color: #0056b3; /* Darker link color on hover */
    transform: scale(1.05); /* Slightly enlarge on hover */
}

.btn-danger {
    background-color: red; /* Bootstrap danger button color */
    color: white; /* White text color */
    padding: 10px 15px; /* Padding for the button */
    border-radius: 5px; /* Rounded corners */
    border: none; /* No border */
    transition: background-color 0.3s; /* Smooth background color change */
}

.btn-danger:hover {
    background-color: #c82333; /* Darker shade on hover */
}
h5{
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  font-size: 400;
}
  
      

    </style>
    <title>Admin Panel | Home</title>
  </head>
  <body >
            <center>
            <h1>
              VISIT OROMIA </h1
            >
          <h1>Admin Panel</h1>
          </center>
             <div class="options">
              <center>
              <h3><a href="users_add.php">USERS</a></h3>
              <h3><a href="hotels_add.php">ADD HOTELS</a></h3>
              <h3><a href="hotelbookings_view.php">HOTEL BOOKINGS</a></h3>
              <h3><a href="flights_add.php">ADD FLIGHTS</a></h3>
              <h3><a href="flightbookings_view.php">FLIGHT BOOKINGS</a></h3>
              <h3><a href="trains_add.php">ADD TRAINS</a></h3>
              <h3><a href="trainbookings_view.php">TRAIN BOOKINGS</a></h3>
              <h3><a href="adminLogout.php" class="btn btn-danger">LOG OUT</a></h3>
    </center>
    </div>
    <center>
    <button class="btn btn-secondary"> <a href="\travel\index.php"><h5>Click here to go to user panel</h5></a></button>
    </center>   
  </body>
</html>
