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
	
		<title>Hotels | VISIT Oromia</title>
    
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
       				$('#datetimepicker5').datetimepicker({
		   			format: 'L',
		   			locale: 'en-gb',
					useCurrent: false,
					minDate: moment()
	   				});
				
        			$('#datetimepicker6').datetimepicker({
            		useCurrent: false,
					format: 'L',
					locale: 'en-gb'
					});
				
					$("#datetimepicker5").on("dp.change", function (e) {
            		$('#datetimepicker6').data("DateTimePicker").minDate(e.date);
        			});
				
        			$("#datetimepicker2").on("dp.change", function (e) {
            		$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        			});
    		});
			
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
			<div class="hotels col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<?php include("common/headerTransparentLoggedIn.php"); ?>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<li class="selected">Hotels</li>
								<a href="flights.php"><li>Flights</li></a>
								<a href="trains.php"><li>Bus</li></a>
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- HOTELS SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search" id="searchHotel">
   					
    					<div class="content">
    					
    					<form action="hotelSearch.php" method="GET">
    					
    						<div class="col-sm-3">			
   							<div class="form-group">
   								 <label for="city">City:<p> </p></label>
     
      								<select id= "city"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select City" name="city" required>
       									<option value="Addis Ababa" data-tokens="Addis Ababa">Addis Ababa</option>
        								<option value="BAALEE" data-tokens="BAALEE">BAALEE</option>
        								<option value="ADAMA" data-tokens="ADAMA">ADAMA</option>
        								<option value="BAATUU" data-tokens="BAATUU">BAATUU</option>
        								<option value="CIROO" data-tokens="CIROO">CIROO</option>
										<option value="NAQAMTEE" data-tokens="NAQAMTEE">NAQAMTEE</option>
										<option value="DAMBI DOOLLO" data-tokens="DAMBI DOOLLO">DAMBI DOOLLO</option>
										<option value="Amboo" data-tokens="Amboo">AMBOO</option>
        								
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime5">Check-in:<p> </p></label>
            						<div class="input-group date" id="datetimepicker5">
                						<input id="datetime5" type="text" class="inputDate form-control" placeholder="Select Check-in Date" name="checkIn" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
    						<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime6">Check-out:<p> </p></label>
            						<div class="input-group date" id="datetimepicker6">
                						<input id="datetime6" type="text" class="inputDate form-control" placeholder="Select Check-out Date" name="checkOut" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
							<div class="col-sm-3">
	
							<label for="rooms">No. of rooms:<p> </p></label>
    							<div class="form-group">
    								<select id= "rooms" class="selectpicker form-control" data-size="5" title="Select no. of rooms" name="rooms" required>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
          							
          					<div class="col-sm-3" id="r1">
	
							<label for="room1">Room 1:<p> </p></label>
    							<div class="form-group">
    								<select id= "room1" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room1">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
         					
         					<div class="col-sm-3" id="r2">
	
							<label for="room2">Room 2:<p> </p></label>
    							<div class="form-group">
    								<select id= "room2" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room2">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
         					
         					<div class="col-sm-3" id="r3">
	
							<label for="room3">Room 3:<p> </p></label>
    							<div class="form-group">
    								<select id= "room3" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room3">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
         					
         					<div class="col-sm-3" id="r4">
	
							<label for="room3">Room 4:<p> </p></label>
    							<div class="form-group">
    								<select id= "room4" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room4">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
          					
          					
          					
          					
          					
          					
           				
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchHotels" value="Search Hotels" id="searchHotelButton">
            				
            				</div>

            			</form>
            			
    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- TRAIN SEARCH SECTION ENDS -->
				
			</div> <!-- trains -->	
			
			
			
			<!-- POPULAR BUS SECTION STARTS -->
			
				<!-- <div class="col-sm-12"> -->
					
					<div class="popularHotels col-sm-12">
					
						<div class="heading">
						
								Popular Cities IN Oromia
						
						</div>
						
						<div class="bg">
						
							
							<div  class="col-sm-4">
						
								<div class="listItem">
								
									<div class="imageContainer text-center">
										
										<img src="images/hotels/cities/NewDelhi/piccadily.jpg" alt="New Delhi Hotels">
										
									</div>
									
									<div class="headings">
										
										BAALEE MOUNT LOUNGE
										
									</div>
									
									<div class="info">
										
										3-star hotels averaging ETB 2000
										
									</div>
									
									<div class="info">
										
										5-star hotels averaging ETB 6500
										
									</div>
								
									
								</div> <!-- listItem 1 -->
							
							</div> <!-- col-sm-4 -->
							
							<div  class="col-sm-4">
						
								<div class="listItem">
								
									<div class="imageContainer text-center">
										
										<img src="images/hotels/cities/Mumbai/JWMarriott.jpg" alt="Mumbai Hotels">
										
									</div>
									
									<div class="headings">
										
										ADDIS ABABA GRAND HOTEL
										
									</div>
									
									<div class="info">
										
										3-star hotels averaging ETB 3900
										
									</div>
									
									<div class="info">
										
										5-star hotels averaging ETB 9700
										
									</div>
								
									
								</div> <!-- listItem 2 -->
							
							</div> <!-- col-sm-4 -->
							
							<div  class="col-sm-4">
						
								<div class="listItem">
								
									<div class="imageContainer text-center">
										
										<img src="images/hotels/cities/Kolkata/HyattRegency.jpg" alt="kolkata Hotels">
										
									</div>
									
									<div class="headings">
										
										ADAMA HILLSIDE HOTEL
										
									</div>
									
									<div class="info">
										
										3-star hotels averaging ETB 3000
										
									</div>
									
									<div class="info">
										
										5-star hotels averaging ETB 7750
										
									</div>
								
									
								</div> <!-- listItem 3 -->
							
							</div> <!-- col-sm-4 -->
							
							
						</div> <!-- bg -->
						
					</div> <!-- popularBus -->
					
				<!-- </div> -->
				
			<!-- POPULAR BUS SECTION ENDS -->
			
			
			
			           
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
