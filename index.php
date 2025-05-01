<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Tourism Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet"> 
    <link href="style2.css" rel="stylesheet">
</head>

<body style="background-color: #D5E5D5;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-globe"></i> VISIT OROMIA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="booking.php" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Bookings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="hotels.php">Hotels</a></li>
                            <li><a class="dropdown-item" href="flights.php">Flights</a></li>
                            <li><a class="dropdown-item" href="trains.php">Bus</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOromia" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Explore Oromia
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownOromia">
                            <li><a class="dropdown-item" href="Explore_Oromia/index.html">Natural Attractions</a></li>
                            <li><a class="dropdown-item" href="Explore_Oromia/cultural_site.html">Cultural Sites</a></li>
                            <li><a class="dropdown-item" href="oromia_adventure_tours.php">Adventure Tours</a></li>
                            <li><a class="dropdown-item" href="Explore_Oromia/culural-food.html">Food & Culture</a></li>
                            <li><a class="dropdown-item" href="chat.php">Chat with us!S</a></li>
                            <li><a class="dropdown-item" href="video.html">VIDEO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactUs.php">Contact</a></li>
                    <?php if (isset($_SESSION["username"])) : ?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel Section -->
    <div class="col-xs-12 banner">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="visit oromia/Baatuu.jpg" alt="Image1">
                </div>
                <div class="carousel-item">
                    <img src="visit oromia/Baatu.jpg" alt="Image2">
                </div>
                <div class="carousel-item">
                    <img src="visit oromia/wenchi.jfif" alt="Image3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

  

  <!-- Destinations Section -->
  <section id="destinations" class="container my-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeInUp">Natural Attractions</h2>
    <div class="row">
      <div class="col-md-4 mb-4 animate__animated animate__fadeInLeft">
        <div class="card">
          <img src="visit oromia/baalee.jpg" class="card-img-top" alt="Bale Mountain">
          <div class="card-body">
            <h5 class="card-title">Bale Mountain National Park</h5>
            <p class="card-text">Explore the stunning highlands and diverse wildlife.</p>
            <a href="Explore_Oromia/Bale-Mountain/index.html" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 animate__animated animate__fadeInUp">
        <div class="card">
          <img src="visit oromia/wenchi.jfif" class="card-img-top" alt="Wenchi Crater Lake">
          <div class="card-body">
            <h5 class="card-title">Wenchi Crater Lake</h5>
            <p class="card-text">A serene lake surrounded by lush greenery.</p>
            <a href="Explore_Oromia/Wenchi/index.html" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 animate__animated animate__fadeInRight">
        <div class="card">
          <img src="visit oromia/awash NP4.jpg" class="card-img-top" alt="Awash National Park">
          <div class="card-body">
            <h5 class="card-title">Awash National Park</h5>
            <p class="card-text">Home to diverse wildlife and stunning landscapes.</p>
            <a href="Explore_Oromia/Awash/index.html" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 animate__animated animate__fadeInRight">
        <div class="card">
          <img src="visit oromia/abijatta1.jpg" class="card-img-top" alt="Awash National Park">
          <div class="card-body">
            <h5 class="card-title">Abijatta Shalla</h5>
            <p class="card-text">Home to diverse wildlife and stunning landscapes.</p>
            <a href="Explore_Oromia/Abijata-shalla/index.html" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 animate__animated animate__fadeInRight">
        <div class="card">
          <img src="visit oromia/mount-kundudu.jpg" class="card-img-top" alt="Awash National Park">
          <div class="card-body">
            <h5 class="card-title">Mount Kundudu</h5>
            <p class="card-text">Home to diverse wildlife and stunning landscapes.</p>
            <a href="Explore_Oromia/Mount-kundudu/index.html" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 animate__animated animate__fadeInRight">
        <div class="card">
          <img src="visit oromia/langano1.jpg" class="card-img-top" alt="Awash National Park">
          <div class="card-body">
            <h5 class="card-title">Lake Langano</h5>
            <p class="card-text">Home to diverse wildlife and stunning landscapes.</p>
            <a href="Explore_Oromia/Lanagno/index.html" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Cultural Site Section -->
  <section class="things-to-do-section">
    <div class="container">
      <h2 class="text-center mb-5">Cultural Site</h2>
      <div class="row">
        <!-- Gadaa -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="visit oromia/culture.jpg" 
              class="card-img-top"
              alt="Nature"
            />
            <div class="card-body">
              <h5 class="card-title">Gadaa</h5>
              <p class="card-text">
                Explore the breathtaking landscapes, wildlife, and natural wonders of Oromia.
              </p>
              <a href="Explore_Oromia/cultural_event/gadaa.html" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Irrechaa -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="visit oromia/festivals.jpg" 
              class="card-img-top"
              alt="Culture"
            />
            <div class="card-body">
              <h5 class="card-title">Irrecha</h5>
              <p class="card-text">
                Immerse yourself in the rich traditions, music, and art of Oromia's diverse communities.
              </p>
              <a href="Explore_Oromia/cultural_event/irrecha.html" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Buttaa qalaa -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="visit oromia/butaa-qala.jpg"
              class="card-img-top"
              alt="Adventure"
            />
            <div class="card-body">
              <h5 class="card-title">Buttaa Qalaa</h5>
              <p class="card-text">
                Experience thrilling activities like hiking, trekking, and exploring hidden gems.
              </p>
              <a href="Explore_Oromia/cultural_event/butta_qala.html" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
                    </div>
                    </div>
                    </section>

        <!-- Food and Culture Section -->
  <section class="things-to-do-section">
    <div class="container">
      <h2 class="text-center mb-5">Food and Culture </h2>
      <div class="row">
        <!-- Nature -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="Explore_Oromia/karrayyu/images/caccabsaa.jpg" 
              class="card-img-top"
              alt="Nature"
            />
            <div class="card-body">
              <h5 class="card-title">Caccabsaa</h5>
              <p class="card-text">
                Explore the breathtaking landscapes, wildlife, and natural wonders of Oromia.
              </p>
              <a href="Explore_Oromia/culural-food/Caccabsaa.html" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- buna qalaa -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="visit oromia/buna-qala.jpg" 
              class="card-img-top"
              alt="Culture"
            />
            <div class="card-body">
              <h5 class="card-title">Buna-Qalaa</h5>
              <p class="card-text">
                Immerse yourself in the rich traditions, music, and art of Oromia's diverse communities.
              </p>
              <a href="Explore_Oromia/culural-food/buna_qala.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <!-- cumboo -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="Explore_Oromia/karrayyu/images/cumboo.jpg"
              class="card-img-top"
              alt="Adventure"
            />
            <div class="card-body">
              <h5 class="card-title">Cumboo</h5>
              <p class="card-text">
                Experience thrilling activities like hiking, trekking, and exploring hidden gems.
              </p>
              <a href="Explore_Oromia/culural-food/cumboo.html" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
                    </section>
        
				</div> <!-- header -->
			</div> 

            <!-- Footer -->
<footer class="footer-section" style="background-color: #2c3e50; color: white; padding: 40px 0;">
  <div class="container">
    <div class="row">
      <!-- Quick Links -->
      <div class="col-md-4 mb-4">
        <h5 style="font-weight: bold; color: #ecf0f1;">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.html" style="color: #ecf0f1; text-decoration: none;">Home</a></li>
          <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Destination</a></li>
          <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Things to Do</a></li>
          <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Booking Service</a></li>
          <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Unique</a></li>
          <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Map</a></li>
        </ul>
      </div>

      <!-- About Us -->
      <div class="col-md-4 mb-4">
        <h5 style="font-weight: bold; color: #ecf0f1;">About Us</h5>
        <p>
          Visit Oromia is your gateway to exploring the stunning landscapes, rich culture, and exciting adventures in Oromia, Ethiopia. Discover the beauty of nature, immerse yourself in local traditions, and create unforgettable memories.
        </p>
      </div>

      <!-- Social Media -->
      <div class="col-md-4 mb-4">
        <h5 style="font-weight: bold; color: #ecf0f1;">Follow Us</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#" class="text-decoration-none" style="color: #ecf0f1;">
              <i class="fab fa-facebook"></i> Facebook
            </a>
          </li>
          <li>
            <a href="#" class="text-decoration-none" style="color: #ecf0f1;">
              <i class="fab fa-twitter"></i> Twitter
            </a>
          </li>
          <li>
            <a href="#" class="text-decoration-none" style="color: #ecf0f1;">
              <i class="fab fa-instagram"></i> Instagram
            </a>
          </li>
          <li>
            <a href="#" class="text-decoration-none" style="color: #ecf0f1;">
              <i class="fab fa-youtube"></i> YouTube
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center mt-4">
      <p class="mb-0" style="color: #bdc3c7;">
        &copy; 2025 Visit Oromia. All rights reserved.
      </p>
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
