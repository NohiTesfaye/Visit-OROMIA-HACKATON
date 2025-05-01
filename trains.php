<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blockedBooking.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>BUS  | VISIT OROMIA</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/bootstrap-select.js"></script>
    	<script src="js/bootstrap-dropdown.js"></script>
    	<script src="js/jquery-2.1.1.min.js"></script>
    	<script src="js/moment-with-locales.js"></script>
    	<script src="js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript">
		
			$(function () {
				
                $('#datetimepicker3').datetimepicker({
					format: 'L',
		   			locale: 'en-gb',
					useCurrent: false,
					minDate: moment()
				});
				
				$('#datetimepicker3').on('dp.change',function(e){
					console.log(e.date.format('dddd'));
					$('#dayTrain').val(e.date.format('dddd'));
				});
            });
		
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
			<div class="trains col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<?php include("common/headerTransparentLoggedIn.php"); ?>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<a href="hotels.php"><li>Hotels</li></a>
								<a href="flights.php"><li>Flights</li></a>
								<li class="selected">Bus</li></a>
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- TRAIN SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search">
   					
    					<div class="content">
    					
    					<form action="trainSearch.php" method="POST">
    					
    						<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="originTrain">Origin:<p> </p></label>
     
      								<select id= "originTrain"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin Station" name="origin" required>
       									<option value="ADDIS ABABA" data-subtext="ADDIS ABABA" data-tokens="ADDIS ABABA">ADDIS ABABA</option>
        								<option value="ADAMA" data-subtext="ADAMA" data-tokens="ADAMA">ADAMA</option>
       									<option value="NAQAMTEE" data-subtext="NAQAMTEE" data-tokens="NAQAMTEE">NAQAMTEE</option>
        								<option value="SHASHAMANNEE" data-subtext="SHASHAMANNEE" data-tokens="SHASHAMANNEE">SHASHAMANNEE</option>
        								<option value="CIROO" data-subtext="CIROO" data-tokens="CIROO">CIROO</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="destinationTrain">Destination:<p> </p></label>
     
      								<select id= "destinationTrain"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination Station" name="destination" required>
       									<option value="BAALEE" data-subtext="BAALEE" data-tokens="BAALEE">BAALEE</option>
        								<option value="AMBOO" data-subtext="AMBOO" data-tokens="AMBOO">AMBOO</option>
       									<option value="KUNDUDDUU" data-subtext="KUNDUDDUU" data-tokens="KUNDUDDUU">KUNDUDDUU</option>
        								<option value="SHASHAMANEE" data-subtext="SHASHAMANEE" data-tokens="SHASHAMANEE">SHASHAMANEE</option>
        								<option value="MATAHAARAA" data-subtext="MATAHAARAA" data-tokens="MATAHAARAA">MATAHAARAA</option>
										<option value="BAATUU" data-subtext="BAATUU" data-tokens="BAATUU">BAATUU</option>
										<option value="DAMBI DOOLLO" data-subtext="DAMBI DOOLLO" data-tokens="DAMBI DOOLLO">DAMBI DOOLLO</option>
        								<option value="GINNIRII" data-subtext="GINNIRII" data-tokens="GINNIRII">GINNIRII</option>
        								<option value="MATTUU" data-subtext="MATTUU" data-tokens="MATTUU">MATTUU</option>
										<option value="NAQAMTEE" data-subtext="NAQAMTEE" data-tokens="NAQAMTEE">NAQAMTEE</option>
										<option value="CIROO" data-subtext="CIROO" data-tokens="CIROO">CIROO</option>




      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime3">Select Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker3">
                						<input id="datetime3" type="text" class="inputDate form-control" placeholder="Select Date" name="date" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
    						<div class="col-sm-3">
	
							<label for="class">Select Class: <p> </p></label>
    							<div class="form-group">
    								<select id= "class" class="selectpicker form-control" data-size="5" title="Select Class" name="class" required>
  										<option value="1AC">First AC</option>
  										<option value="2AC">Second AC</option>
  										<option value="3AC">Third AC</option>
  										<option value="SL">Sleeper</option>
  										<option value="CC">AC Chair Car</option>
									</select>
								</div>
							</div>
            			
							<div class="col-sm-3">
	
							<label for="adults">No. of adults:<p> </p></label>
    							<div class="form-group">
    								<select id= "adults" class="selectpicker form-control" data-size="5" title="Aged 18 and above" name="adults" required>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
  										<option value="5">5</option>
  										<option value="6">6</option>
									</select>
								</div>
							</div>
							
							<div class="col-sm-3">
							
							<label for="children">No. of children:<p> </p></label>
								<div class="form-group">
   									<select id= "children" class="selectpicker form-control" data-size="5" title="Aged upto 17" name="children" required>
  										<option value="0">0</option>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
  										<option value="5">5</option>
  										<option value="6">6</option>
									</select>
								</div>
							</div>
           			
           					<input type="hidden" name="day" value="null" id="dayTrain"/>
            			
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchTrains" value="Search Trains">
            				
            				</div>
            				
            				</form>

    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- TRAIN SEARCH SECTION ENDS -->
				
			</div> <!-- trains -->	
			
			
			<div class="footer col-sm-12">
		</div>
			
			
			           
<!-- Footer -->
<footer class="footer-section">
  <div class="container">
    <div class="row">
      <!-- Quick Links -->
      <div class="col-md-4 mb-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Destination</a></li>
          <li><a href="#">Things to Do</a></li>
          <li><a href="#">Booking Service</a></li>
          <li><a href="#">Unique</a></li>
          <li><a href="#">Map</a></li>
        </ul>
      </div>

      <!-- About Us -->
      <div class="col-md-4 mb-4">
        <h5>About Us</h5>
        <p>
          Visit Oromia is your gateway to exploring the stunning landscapes, rich culture, and exciting adventures in Oromia, Ethiopia. Discover the beauty of nature, immerse yourself in local traditions, and create unforgettable memories.
        </p>
      </div>

      <!-- Social Media -->
      <div class="col-md-4 mb-4">
        <h5>Follow Us</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#" class="text-decoration-none">
              <i class="fab fa-facebook"></i> Facebook
            </a>
          </li>
          <li>
            <a href="#" class="text-decoration-none">
              <i class="fab fa-twitter"></i> Twitter
            </a>
          </li>
          <li>
            <a href="#" class="text-decoration-none">
              <i class="fab fa-instagram"></i> Instagram
            </a>
          </li>
          <li>
            <a href="#" class="text-decoration-none">
              <i class="fab fa-youtube"></i> YouTube
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center mt-4">
      <p class="mb-0">
        &copy; 2025 Visit Oromia. All rights reserved.
      </p>
    </div>
  </div>
</footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>
