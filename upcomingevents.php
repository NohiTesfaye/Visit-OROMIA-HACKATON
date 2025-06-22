<?php
// oromiaevents.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upcoming Events in Oromia</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2c786c;
      --secondary: #ff7e33;
      --dark: #004445;
      --light: #f8f1e5;
      --accent: #ff9a56;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }
    
    h1, h2, h3, h4 {
      font-family: 'Playfair Display', serif;
    }
    
    /* Header */
    .events-hero {
      background: linear-gradient(rgba(0, 68, 69, 0.85), rgba(0, 68, 69, 0.85)), 
                  url('https://images.unsplash.com/photo-1566438480900-0609be27a4be?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 120px 0;
      text-align: center;
      margin-bottom: 60px;
    }
    
    .events-hero h1 {
      font-size: 3.5rem;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .events-hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 30px;
    }
    
    /* Event Cards */
    .event-card {
      border: none;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      margin-bottom: 30px;
      background: white;
    }
    
    .event-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }
    
    .event-img {
      height: 220px;
      width: 100%;
      object-fit: cover;
    }
    
    .event-date {
      position: absolute;
      top: 20px;
      right: 20px;
      background: rgba(255, 255, 255, 0.9);
      padding: 10px 15px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .event-day {
      font-size: 1.8rem;
      font-weight: 700;
      line-height: 1;
      color: var(--dark);
    }
    
    .event-month {
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--primary);
      font-weight: 600;
    }
    
    .event-body {
      padding: 25px;
    }
    
    .event-title {
      color: var(--dark);
      font-size: 1.5rem;
      margin-bottom: 10px;
    }
    
    .event-location {
      color: var(--secondary);
      margin-bottom: 15px;
      font-size: 1rem;
    }
    
    .event-location i {
      margin-right: 5px;
    }
    
    .event-description {
      color: #666;
      margin-bottom: 20px;
      line-height: 1.6;
    }
    
    .event-type {
      display: inline-block;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 15px;
    }
    
    .cultural {
      background-color: #e3f2fd;
      color: #1976d2;
    }
    
    .sports {
      background-color: #e8f5e9;
      color: #388e3c;
    }
    
    .religious {
      background-color: #fff3e0;
      color: #e65100;
    }
    
    .music {
      background-color: #f3e5f5;
      color: #8e24aa;
    }
    
    .agricultural {
      background-color: #e0f7fa;
      color: #00838f;
    }
    
    .btn-register {
      background-color: var(--secondary);
      color: white;
      border: none;
      padding: 8px 20px;
      border-radius: 6px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-register:hover {
      background-color: var(--accent);
      transform: translateY(-2px);
    }
    
    /* Filter Section */
    .filter-section {
      background: white;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      margin-bottom: 50px;
    }
    
    .filter-title {
      color: var(--dark);
      margin-bottom: 20px;
      font-size: 1.5rem;
    }
    
    /* No Events */
    .no-events {
      text-align: center;
      padding: 80px 20px;
      color: #777;
    }
    
    .no-events i {
      font-size: 4rem;
      color: #ddd;
      margin-bottom: 20px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .events-hero h1 {
        font-size: 2.5rem;
      }
      
      .events-hero {
        padding: 80px 0;
      }
    }
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .event-card {
      animation: fadeIn 0.6s ease forwards;
      opacity: 0;
    }
    
    .event-card:nth-child(1) { animation-delay: 0.1s; }
    .event-card:nth-child(2) { animation-delay: 0.2s; }
    .event-card:nth-child(3) { animation-delay: 0.3s; }
    .event-card:nth-child(4) { animation-delay: 0.4s; }
    .event-card:nth-child(5) { animation-delay: 0.5s; }
    .event-card:nth-child(6) { animation-delay: 0.6s; }
  </style>
</head>
<body>
  <!-- Navbar (simplified version) -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--dark);">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-globe"></i> VISIT OROMIA
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="oromiaevents.php">Events</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Attractions</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="events-hero">
    <div class="container">
      <h1>Upcoming Events in Oromia</h1>
      <p>Discover the vibrant cultural festivals, exciting sports events, and traditional celebrations across our beautiful region</p>
      <a href="#events" class="btn btn-outline-light btn-lg">Explore Events</a>
    </div>
  </section>

  <!-- Main Content -->
  <div class="container" id="events">
    <!-- Filter Section -->
    <section class="filter-section">
      <h3 class="filter-title">Find Your Perfect Event</h3>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="categoryFilter" class="form-label">Event Category</label>
          <select class="form-select" id="categoryFilter">
            <option value="all">All Categories</option>
            <option value="cultural">Cultural Festival</option>
            <option value="sports">Sports Event</option>
            <option value="religious">Religious Celebration</option>
            <option value="music">Music Concert</option>
            <option value="agricultural">Agricultural Show</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="monthFilter" class="form-label">Month</label>
          <select class="form-select" id="monthFilter">
            <option value="all">All Months</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
          </select>
        </div>
        <div class="col-12">
          <button id="applyFilters" class="btn btn-primary">Apply Filters</button>
          <button id="resetFilters" class="btn btn-outline-secondary">Reset</button>
        </div>
      </div>
    </section>

    <!-- Events Grid -->
    <div class="row" id="eventsContainer">
      <?php
      // Sample events data
      $events = [
        [
          'id' => 1,
          'title' => 'Irreecha Festival',
          'description' => 'The annual Oromo thanksgiving festival celebrating the end of the rainy season and the beginning of harvest. Experience traditional dances, music, and colorful ceremonies.',
          'location' => 'Bishoftu, Oromia',
          'date' => '2023-10-01',
          'type' => 'cultural',
          'image' => 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
          'id' => 2,
          'title' => 'Oromia Marathon',
          'description' => 'Join thousands of runners in this annual marathon through the beautiful landscapes of Oromia. Choose from full marathon, half marathon, or 10K races.',
          'location' => 'Adama, Oromia',
          'date' => '2023-11-15',
          'type' => 'sports',
          'image' => 'https://images.unsplash.com/photo-1543351611-58f69d7c1781?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
          'id' => 3,
          'title' => 'Oromo Cultural Week',
          'description' => 'Week-long celebration of Oromo heritage featuring traditional music performances, art exhibitions, craft workshops, and authentic Oromo cuisine.',
          'location' => 'Jimma, Oromia',
          'date' => '2023-12-05',
          'type' => 'cultural',
          'image' => 'https://images.unsplash.com/photo-1464037866556-6812c9d1c72e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
          'id' => 4,
          'title' => 'Oromia Coffee Festival',
          'description' => 'Celebrate Oromia\'s world-famous coffee heritage with farm tours, cupping sessions, barista competitions, and traditional coffee ceremonies.',
          'location' => 'Harar, Oromia',
          'date' => '2024-01-20',
          'type' => 'agricultural',
          'image' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
          'id' => 5,
          'title' => 'Oromia Music Festival',
          'description' => 'Three-day festival showcasing the best of Oromo music, from traditional folk to contemporary artists. Dance the night away under the stars!',
          'location' => 'Shashamane, Oromia',
          'date' => '2024-02-10',
          'type' => 'music',
          'image' => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
          'id' => 6,
          'title' => 'Oromia Football Cup Finals',
          'description' => 'Witness the championship match of Oromia\'s premier football tournament featuring the region\'s top teams in an electrifying atmosphere.',
          'location' => 'Addis Ababa Stadium',
          'date' => '2024-03-05',
          'type' => 'sports',
          'image' => 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ]
      ];

      // Filter out past events
      $currentDate = date('Y-m-d');
      $upcomingEvents = array_filter($events, function($event) use ($currentDate) {
        return $event['date'] >= $currentDate;
      });

      // Sort by date
      usort($upcomingEvents, function($a, $b) {
        return strcmp($a['date'], $b['date']);
      });

      if (empty($upcomingEvents)) {
        echo '<div class="no-events">
                <i class="fas fa-calendar-times"></i>
                <h3>No Upcoming Events</h3>
                <p>Check back later for new events in Oromia</p>
              </div>';
      } else {
        foreach ($upcomingEvents as $event) {
          $eventDate = new DateTime($event['date']);
          $monthName = $eventDate->format('F');
          $day = $eventDate->format('j');
          $monthNum = $eventDate->format('n');
          
          echo '<div class="col-lg-4 col-md-6 mb-4 event-item" data-type="'.$event['type'].'" data-month="'.$monthNum.'">
                  <div class="event-card h-100">
                    <div class="position-relative">
                      <img src="'.$event['image'].'" class="event-img" alt="'.$event['title'].'">
                      <div class="event-date">
                        <div class="event-day">'.$day.'</div>
                        <div class="event-month">'.$monthName.'</div>
                      </div>
                    </div>
                    <div class="event-body">
                      <span class="event-type '.$event['type'].'">'.ucfirst($event['type']).'</span>
                      <h3 class="event-title">'.$event['title'].'</h3>
                      <div class="event-location"><i class="fas fa-map-marker-alt"></i> '.$event['location'].'</div>
                      <p class="event-description">'.$event['description'].'</p>
                      <button class="btn btn-register" data-event-id="'.$event['id'].'">Register Now</button>
                    </div>
                  </div>
                </div>';
        }
      }
      ?>
    </div>
  </div>

  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Footer</title>
</head>
<body>
	



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