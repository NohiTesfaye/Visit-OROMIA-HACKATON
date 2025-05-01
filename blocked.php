<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blocked | Tourism Management</title>

    <!-- Stylesheets -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
</head>

<body>
    <div class="container-fluid">
        <!-- Blocked Section -->
        <div class="col-sm-12 blocked">
            <!-- Heading -->
            <div class="col-sm-12 text-center">
                <div class="col-sm-12 heading">
                    Blocked
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-sm-3"></div> <!-- Empty column for spacing -->
            <div class="col-sm-6 containerBox">
                <div class="col-sm-12 text">
                    You need to be logged in to access this page.
                    <br />
                    Please login with a valid account to continue.
                </div>
                <div class="col-sm-12 text-center">
                    <a href="login.php">
                        <input type="button" class="button" name="login" value="Login">
                    </a>
                </div>
            </div>
            <div class="col-sm-3"></div> <!-- Empty column for spacing -->
        </div>
    </div>
</body>

</html>
