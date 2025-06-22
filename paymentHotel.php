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
		
		<?php 
session_start();
include("common/headerLoggedIn.php"); 

// Initialize variables
$totalPassengers = $_POST["totalPassengersHidden"] ?? 0;
$fare = $_POST["fareHidden"] ?? 0;
$mode = $_POST["modeHidden"] ?? '';
$type = $_POST["typeHidden"] ?? '';
$class = $_POST["classHidden"] ?? '';
$origin = $_POST["originHidden"] ?? '';
$destination = $_POST["destinationHidden"] ?? '';
$depart = $_POST["departHidden"] ?? '';
$return = $_POST["returnHidden"] ?? '';
$adults = $_POST["adultsHidden"] ?? 0;
$children = $_POST["childrenHidden"] ?? 0;
$noOfPassengers = (int)$adults + (int)$children;

// Store passenger names
$passengers = [];
for($i = 1; $i <= $totalPassengers; $i++) {
    $passengers[] = [
        'name' => $_POST["name$i"] ?? '',
        'gender' => $_POST["gender$i"] ?? ''
    ];
}

// Chapa Payment Configuration
$chapa_secret_key = 'CHASECK_TEST-pUjHY4B5oTzH3m3R1LT0kvNqRNTiRAaD'; // Replace with your key
$tx_ref = 'HTL-' . uniqid(); // Unique transaction reference for hotels

// Store booking data in session for webhook verification
$_SESSION['booking_data'] = [
    'tx_ref' => $tx_ref,
    'fare' => $fare,
    'passengers' => $passengers,
    'type' => $type,
    'flight_details' => [
        'origin' => $origin,
        'destination' => $destination,
        'departure' => $depart,
        'return' => $return
    ]
];
?>

<div class="spacer">a</div>

<div class="col-sm-12 paymentWrapper">
    <div class="headingOne">Payment</div>
    
    <div class="totalAmount">
        Amount to be paid: <span class="sansSerif">ETB</span> <?php echo htmlspecialchars($fare); ?>
    </div>
    
    <div class="col-sm-3"></div>
    
    <div class="col-sm-6">
        <div class="boxCenter">
            <form method="POST" id="chapaPaymentForm">
                <div class="col-sm-12 tag">
                    Full Name:
                </div>
                <div class="col-sm-12">
                    <input type="text" class="input" name="nameOnCard" placeholder="Enter your full name" required>
                </div>
                
                <div class="col-sm-12 tag">
                    Email:
                </div>
                <div class="col-sm-12">
                    <input type="email" class="input" name="email" placeholder="Enter your email" required>
                </div>
                
                <!-- Hidden fields for all booking data -->
                <input type="hidden" name="tx_ref" value="<?php echo $tx_ref; ?>">
                <input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
                <input type="hidden" name="totalPassengersHidden" value="<?php echo $totalPassengers; ?>">
                <input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
                <input type="hidden" name="classHidden" value="<?php echo $class; ?>">
                <input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
                <input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
                <input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
                <input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
                <input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
                <input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
                <input type="hidden" name="modeHidden" value="<?php echo $mode; ?>">
                <input type="hidden" name="amount" value="<?php echo $fare; ?>">
                <input type="hidden" name="currency" value="ETB">
                <input type="hidden" name="title" value="Hotel Booking">
                <input type="hidden" name="description" value="Booking for <?php echo $noOfPassengers; ?> guests">
                
                <?php foreach($passengers as $i => $passenger): ?>
                    <input type="hidden" name="nameHidden<?php echo $i+1; ?>" value="<?php echo htmlspecialchars($passenger['name']); ?>">
                    <input type="hidden" name="genderHidden<?php echo $i+1; ?>" value="<?php echo htmlspecialchars($passenger['gender']); ?>">
                <?php endforeach; ?>
                
                <?php if($type == "Return Trip"): ?>
                    <input type="hidden" name="flightNoOutboundHidden" value="<?php echo $_POST["flightNoOutboundHidden"] ?? ''; ?>">
                    <input type="hidden" name="flightNoInboundHidden" value="<?php echo $_POST["flightNoInboundHidden"] ?? ''; ?>">
                <?php elseif($type == "One Way"): ?>
                    <input type="hidden" name="flightNoOutboundHidden" value="<?php echo $_POST["flightNoOutboundHidden"] ?? ''; ?>">
                <?php endif; ?>
                
                <div class="col-sm-12 bookingButton text-center">
                    <button type="submit" name="pay_with_chapa" class="paymentButton">Pay with Chapa</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="col-sm-3"></div>
</div>

<?php 
// Process Chapa payment when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay_with_chapa'])) {
    require_once 'chapa_payment_processor.php'; // Shared payment processing file
    processChapaPayment($_POST, $chapa_secret_key);
}

include("common/footer.php"); 
?>
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>