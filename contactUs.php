<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Contact Us | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<?php 
		
			if(!isset($_SESSION["username"])) {
				include("common/headerLoggedOut.php");
			}
			else {
				include("common/headerLoggedIn.php");
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 contactUsWrapper">
			
			<div class="headingOne">
				
				Contact Us
				
			</div>
			
			
		</div> <!-- paymentWrapper -->
		
		<div class="col-xs-12 contactPadding">
			
		<div class="col-sm-1"></div>
		
		<div class="col-sm-5 contactUsExtras">
			
			<div class="col-sm-12 heading">
				
				<span class="bold"><h2>We're located at:</h2></span>
				</br>
				<br>
				<h4>BOOLEE,NOAH REAL STATE,OROMIA,ETHIOPIA</h4>
			
			</div>
		
			
		</div>
		
		<div class="col-sm-5 contactUsForm">
			
			<form id="contactForm">
				
			<label for="name">Full Name:</label>
			<input type="text" class="input" name="name" required/>
			
			<label for="email">E-mail:</label>
			<input type="text" class="input" name="email" required/>
			
			<label for="queries">Queries:</label>
			<textarea class="input" name="queries" required></textarea>
			
			<div class="text-center">
				<input type="submit" class="contactButton" value="Send"/>
			</div>
				
			</form>
			
		</div>
		
		<div class="col-sm-1"></div>
		
		</div>
	
	<div class="col-xs-12 spacer">.</div> <!-- just a dummy class for creating some space -->
	<div class="col-xs-12 spacer">.</div> <!-- just a dummy class for creating some space -->
			
		<!-- Required CSS in the head section -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .footer-section {
        background: linear-gradient(135deg, #2C3E50, #3498db, #2ecc71);
        color: white;
        padding: 70px 0 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
    }

    .footer-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #e74c3c, #f1c40f, #2ecc71);
        animation: gradient 3s ease infinite;
        background-size: 200% 200%;
    }

    @keyframes gradient {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    .footer-section h5 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .footer-section h5::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: #f1c40f;
        border-radius: 3px;
    }

    .footer-section ul li {
        margin-bottom: 18px;
    }

    .footer-section ul li a {
        color: rgba(255, 255, 255, 0.9);
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .footer-section ul li a:hover {
        color: #f1c40f;
        transform: translateX(8px);
        text-shadow: 0 0 15px rgba(241, 196, 15, 0.5);
    }

    .footer-section .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .footer-section .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.4s ease;
        color: white;
    }

    .footer-section .social-links a:hover {
        background: #f1c40f;
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 5px 15px rgba(241, 196, 15, 0.4);
    }

    .footer-section i {
        margin-right: 12px;
        font-size: 1.3rem;
    }

    .copyright {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 25px;
        margin-top: 40px;
        font-size: 1.1rem;
    }

    .about-text {
        line-height: 1.9;
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        text-align: justify;
    }

    .heart-icon {
        color: #e74c3c;
        animation: heartbeat 1.5s ease infinite;
    }

    @keyframes heartbeat {
        0% {transform: scale(1);}
        50% {transform: scale(1.2);}
        100% {transform: scale(1);}
    }

    /* Hover effect for quick links */
    .footer-section ul li a::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0;
        height: 2px;
        background: #f1c40f;
        transition: width 0.3s ease;
    }

    .footer-section ul li a:hover::before {
        width: 100%;
    }
</style>
<!-- Required CSS in the head section -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .footer-section {
        background: linear-gradient(135deg, #2C3E50, #3498db, #2ecc71);
        color: white;
        padding: 70px 0 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
    }

    .footer-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #e74c3c, #f1c40f, #2ecc71);
        animation: gradient 3s ease infinite;
        background-size: 200% 200%;
    }

    @keyframes gradient {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    .footer-section h5 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .footer-section h5::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: #f1c40f;
        border-radius: 3px;
    }

    .footer-section ul li {
        margin-bottom: 18px;
    }

    .footer-section ul li a {
        color: rgba(255, 255, 255, 0.9);
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .footer-section ul li a:hover {
        color: #f1c40f;
        transform: translateX(8px);
        text-shadow: 0 0 15px rgba(241, 196, 15, 0.5);
    }

    .footer-section .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .footer-section .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.4s ease;
        color: white;
    }

    .footer-section .social-links a:hover {
        background: #f1c40f;
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 5px 15px rgba(241, 196, 15, 0.4);
    }

    .footer-section i {
        margin-right: 12px;
        font-size: 1.3rem;
    }

    .copyright {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 25px;
        margin-top: 40px;
        font-size: 1.1rem;
    }

    .about-text {
        line-height: 1.9;
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        text-align: justify;
    }

    .heart-icon {
        color: #e74c3c;
        animation: heartbeat 1.5s ease infinite;
    }

    @keyframes heartbeat {
        0% {transform: scale(1);}
        50% {transform: scale(1.2);}
        100% {transform: scale(1);}
    }

    /* Hover effect for quick links */
    .footer-section ul li a::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0;
        height: 2px;
        background: #f1c40f;
        transition: width 0.3s ease;
    }

    .footer-section ul li a:hover::before {
        width: 100%;
    }
</style>

<!-- Footer Section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <!-- Quick Links -->
            <div class="col-md-4 mb-5">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Destination</a></li>
                    <li><a href="#"><i class="fas fa-hiking"></i> Things to Do</a></li>
                    <li><a href="#"><i class="fas fa-ticket-alt"></i> Booking Service</a></li>
                    <li><a href="#"><i class="fas fa-star"></i> Unique</a></li>
                    <li><a href="#"><i class="fas fa-map"></i> Map</a></li>
                </ul>
            </div>

            <!-- About Us -->
            <div class="col-md-4 mb-5">
                <h5>About Us</h5>
                <p class="about-text">
                    Visit Oromia is your gateway to exploring the stunning landscapes, rich culture, and exciting adventures in Oromia, Ethiopia. Discover the beauty of nature, immerse yourself in local traditions, and create unforgettable memories.
                </p>
            </div>

            <!-- Social Media -->
            <div class="col-md-4 mb-5">
                <h5>Connect With Us</h5>
                <div class="social-links">
                    <a href="#" class="facebook" title="Follow us on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="twitter" title="Follow us on Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="instagram" title="Follow us on Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="youtube" title="Subscribe to our YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="tiktok" title="Follow us on TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center copyright">
            <p class="mb-0">
                &copy; 2025 Visit Oromia. All rights reserved. | Created with 
                <i class="fas fa-heart heart-icon"></i> for Oromia
            </p>
        </div>
    </div>
</footer>

<!-- Required Script at the end of body tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Required Script at the end of body tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>