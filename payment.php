<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Payment | VISIT OROMIA</title>
    
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
    <?php include("common/headerLoggedIn.php"); ?>
    
    <?php
    // Initialize Chapa payment variables
    $chapa_secret_key = 'CHASECK_TEST-pUjHY4B5oTzH3m3R1LT0kvNqRNTiRAaD'; // Replace with your actual Chapa secret key
    $chapa_public_key = 'CHAPUBK_TEST-kWKjobElCZIeXNKNPeY0C6w56CbrCPcX'; // Replace with your actual Chapa public key
    $chapa_base_url = 'https://api.chapa.co/v1/transaction/initialize';
     $tx_ref = 'TRAVEL-' . uniqid() . '-' . rand(1000,9999); // Generate unique transaction reference
    
    $mode = $_POST["modeHidden"];
    
    if($mode == "ReturnTripFlight" or $mode == "OneWayFlight") {
        $totalPassengers = $_POST["totalPassengersHidden"];
        
        for($i = 1; $i <= $totalPassengers; $i++) {
            $name[$i] = $_POST["name$i"];
            $gender[$i] = $_POST["gender$i"];
        }
        
        $fare = $_POST["fareHidden"];
        $type = $_POST["typeHidden"];
        $class = $_POST["classHidden"];
        $origin = $_POST["originHidden"];
        $destination = $_POST["destinationHidden"];
        $depart = $_POST["departHidden"];
        $return = $_POST["returnHidden"];
        $adults = $_POST["adultsHidden"];
        $children = $_POST["childrenHidden"];
        $noOfPassengers = (int)$adults + (int)$children;
        
        if($type == "Return Trip") {
            $flightNoOutbound = $_POST["flightNoOutboundHidden"];
            $flightNoInbound = $_POST["flightNoInboundHidden"];
        }
        elseif($type == "One Way") {
            $flightNoOutbound = $_POST["flightNoOutboundHidden"];
        }
        
        if($class == "Economy Class")
            $className = "Economy";
        else
            $className = "Business";
    }
    elseif($mode == "hotel") {
        $fare = $_POST["fareHidden"];
        $hotelID = $_POST["hotelIDHidden"];
    }
    elseif($mode == "train") {
        $totalPassengers = $_POST["totalPassengersHidden"];
        $fare = $_POST["fareHidden"];
        $trainID = $_POST["trainIDHidden"];
        $origin = $_POST["originHidden"];
        $destination = $_POST["destinationHidden"];
        $date = $_POST["dateHidden"];
        $day = $_POST["dayHidden"];
        $class = $_POST["classHidden"];
        
        for($i = 1; $i <= $totalPassengers; $i++) {
            $name[$i] = $_POST["name$i"];
            $gender[$i] = $_POST["gender$i"];
        }
    }
    
    // Process payment when form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay_with_chapa'])) {
        $customer_name = $_POST['nameOnCard'];
        $customer_email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
if (!$customer_email) {
    die("<script>alert('Error: Invalid email address');</script>");}
        $currency = 'ETB'; // Ethiopian Birr - 
        
        $callback_url = ''; // Set your callback URL for payment verification
        
            // Split name into first and last
        $name_parts = explode(' ', $customer_name, 2);
        $first_name = $name_parts[0];
        $last_name = $name_parts[1] ?? '';
        // Prepare Chapa payment data
        $data = [
            'amount' => $fare,
            'currency' => $currency,
            'email' => $customer_email,
            'first_name' => $customer_name,
            'last_name' => $last_name,
            'tx_ref' => $tx_ref,
            'callback_url' => $callback_url,
            'return_url' => 'http://localhost/travel3/paymentsuccess.php',
            'customization' => [ 
        'title' => 'Travel Pay', // 10 chars
        'description' => 'Booking reservation'
            ]
        ];
        
        // Initialize cURL session
        $ch = curl_init($chapa_base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $chapa_secret_key,
            'Content-Type: application/json'
        ]);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $result = json_decode($response, true);
        
        if(isset($result['status']) && $result['status'] == 'success') {
            // Redirect to Chapa payment page
            header('Location: ' . $result['data']['checkout_url']);
            exit;
        } else {
            // Handle error
            $error_message = $result['message'] ?? 'Payment initialization failed';
            echo "<script>alert('Payment Error: " . json_encode($error_message) . "');</script>";
        }
    }
    ?>
    
    <div class="spacer">a</div>
    
    <div class="col-sm-12 paymentWrapper">
        <div class="headingOne">
            Payment
        </div>
        
        <div class="totalAmount">
            Amount to be paid: <span class="sansSerif">ETB</span> <?php echo $fare; ?>
        </div>
        
        <div class="col-sm-3"></div>
        
        <div class="col-sm-6">
            <div class="boxCenter">
                <form method="POST" id="paymentForm">
                    <div class="col-sm-12 tag">
                        Full Name:
                    </div>
                    
                    <div class="col-sm-12">
                        <input type="text" class="input" name="nameOnCard" placeholder="Enter your full name" id="nameOnCard" required>
                    </div>
                    
                    <div class="col-sm-12 tag">
                        Email:
                    </div>
                    
                    <div class="col-sm-12">
                        <input type="email" class="input" name="email" placeholder="Enter your email" id="email" required>
                    </div>
                    
                    <input type="hidden" name="tx_ref" value="<?php echo $tx_ref; ?>">
                    
                    <!-- Hidden fields for each mode -->
                    <?php if($mode == "ReturnTripFlight" or $mode == "OneWayFlight"): ?>
                        <input type="hidden" name="totalPassengersHidden" value="<?php echo $totalPassengers; ?>">
                        <input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
                        <input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
                        <input type="hidden" name="classHidden" value="<?php echo $class; ?>">
                        <input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
                        <input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
                        <input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
                        <input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
                        <input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
                        <input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
                        <input type="hidden" name="modeHidden" value="<?php echo $mode ?>">
                        
                        <?php for($i = 1; $i <= $totalPassengers; $i++) { ?>
                            <input type="hidden" name="nameHidden<?php echo $i; ?>" value="<?php echo $name[$i]; ?>">
                            <input type="hidden" name="genderHidden<?php echo $i; ?>" value="<?php echo $gender[$i]; ?>">
                        <?php } ?>
                        
                        <?php if($type == "Return Trip") { ?>
                            <input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
                            <input type="hidden" name="flightNoInboundHidden" value="<?php echo $flightNoInbound; ?>">
                        <?php } elseif($type == "One Way") { ?>
                            <input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
                        <?php } ?>
                        
                    <?php elseif($mode == "hotel"): ?>
                        <input type="hidden" name="hotelIDHidden" value="<?php echo $hotelID; ?>">
                        <input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
                        <input type="hidden" name="modeHidden" value="<?php echo $mode ?>">
                        
                    <?php elseif($mode == "train"): ?>
                        <input type="hidden" name="totalPassengersHidden" value="<?php echo $totalPassengers; ?>">
                        <input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
                        <input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
                        <input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
                        <input type="hidden" name="modeHidden" value="<?php echo $mode ?>">
                        <input type="hidden" name="dateHidden" value="<?php echo $date; ?>">
                        <input type="hidden" name="dayHidden" value="<?php echo $day; ?>">
                        <input type="hidden" name="classHidden" value="<?php echo $class; ?>">
                        <input type="hidden" name="trainIDHidden" value="<?php echo $trainID; ?>">
                        
                        <?php for($i = 1; $i <= $totalPassengers; $i++) { ?>
                            <input type="hidden" name="nameHidden<?php echo $i; ?>" value="<?php echo $name[$i]; ?>">
                            <input type="hidden" name="genderHidden<?php echo $i; ?>" value="<?php echo $gender[$i]; ?>">
                        <?php } ?>
                    <?php endif; ?>
                    
                    <div class="col-sm-12 bookingButton text-center">
                        <button type="submit" name="pay_with_chapa" class="paymentButton">Pay with Chapa</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-sm-3"></div>
    </div> <!-- paymentWrapper -->
    
    <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
    
    <?php include("common/footer.php"); ?>
</body>
	
	<!-- BODY TAG ENDS -->
	
</html>