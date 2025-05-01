<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD TAG STARTS -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>About Us | Visit Oromia</title>

    <!-- External Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        /* General Body Styling */
        body {
            background-color: #f4f4f4;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        header {
            background-color: #2E7D32;
            color: white;
            padding: 15px 30px;
            text-align: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* About Us Section */
        .aboutUsWrapper {
            max-width: 900px;
            margin: 40px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .headingOne {
            font-size: 2.5rem;
            color: #2E7D32;
            margin-bottom: 20px;
            position: relative;
        }

        .headingOne::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: #FFA000;
            margin: 10px auto;
        }

        .para {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        .highlight {
            color: #FFA000;
            font-weight: bold;
        }

        /* Image Section */
        .about-img {
            margin-top: 30px;
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styling */
        footer {
            background-color: #263238;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            margin-top: 40px;
            position: relative;
        }

        footer a {
            color: #FFA000;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .headingOne {
                font-size: 2rem;
            }

            .para {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .aboutUsWrapper {
                padding: 20px;
            }
        }
    </style>
</head>
<!-- HEAD TAG ENDS -->

<!-- BODY TAG STARTS -->
<body>

    <!-- Dynamic Header -->
    <?php 
        if(!isset($_SESSION["username"])) {
            include("common/headerLoggedOut.php");
        } else {
            include("common/headerLoggedIn.php");
        }
    ?>

    <!-- About Us Section -->
    <div class="aboutUsWrapper">
        <div class="headingOne">About Us</div>
        <div class="para">
            Welcome to <span class="highlight">Visit Oromia</span>, your premier guide to exploring Ethiopia's largest and most diverse region. 
            Our mission is to showcase the stunning natural beauty, rich culture, and unique experiences that 
            make Oromia a must-visit destination. Whether you seek adventure, cultural experiences, or a 
            serene escape into nature, we are here to guide you every step of the way.
            <br><br>
            We believe in empowering local communities by promoting <span class="highlight">sustainable tourism</span> while respecting 
            the diverse traditions of the Oromo people. Join us as we explore breathtaking landscapes, 
            vibrant cultures, and unforgettable adventures.
        </div>
        <img src="./Explore_Oromia/Yayu/images/yayo.jpg" alt="Oromia Landscape" class="about-img">
    </div>

    <!-- Footer -->
    <footer>
        © 2025 Visit Oromia. All Rights Reserved. Made with <i class="fa fa-heart" style="color: #FF6B6B;"></i> for Ethiopia. 
        <br>
        <a href="contact.php">Contact Us</a> | <a href="terms.php">Terms & Conditions</a>
    </footer>
</body>
<!-- BODY TAG ENDS -->

</html>