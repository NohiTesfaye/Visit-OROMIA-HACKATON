<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Adventure Tours - Visit Oromia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- A-Frame for VR -->
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <!-- Mapbox GL JS -->
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2c786c;
            --secondary-color: #ff7e33;
            --dark-color: #004445;
            --light-color: #f8f1e5;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }
        
        .hero-section {
            height: 70vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1604537529428-15bcbeecfe4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        
        .vr-container {
            height: 500px;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }
        
        .location-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .location-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .location-card img {
            height: 200px;
            object-fit: cover;
        }
        
        .map-container {
            height: 500px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .feature-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }
        
        .nav-pills .nav-link {
            color: var(--dark-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-mountain"></i> Visit Oromia Adventures
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#virtual-tours">Virtual Tours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#destinations">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map-explorer">Map Explorer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#book-tour">Book a Tour</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Explore Oromia's Adventures Virtually</h1>
            <p class="lead mb-5">Immerse yourself in the breathtaking landscapes and rich culture of Oromia from anywhere in the world</p>
            <a href="#virtual-tours" class="btn btn-primary btn-lg me-3">Start Exploring</a>
            <a href="#book-tour" class="btn btn-outline-light btn-lg">Book Real Tour</a>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Virtual Tours Section -->
        <section id="virtual-tours" class="py-5">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="fw-bold mb-3">Immersive 360° Virtual Tours</h2>
                    <p class="lead">Experience Oromia's most spectacular locations through our interactive virtual reality tours</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <!-- A-Frame VR Container -->
                    <div class="vr-container">
                        <a-scene embedded>
                            <a-sky src="https://images.unsplash.com/photo-1604537529428-15bcbeecfe4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" rotation="0 -90 0"></a-sky>
                            <a-camera>
                                <a-cursor></a-cursor>
                            </a-camera>
                        </a-scene>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold mb-4">Bale Mountains National Park</h3>
                    <p class="lead">Explore Africa's largest Afro-alpine habitat with this 360° virtual tour.</p>
                    <p>Navigate through the stunning landscapes by clicking and dragging with your mouse. Use the controls in the bottom right to switch between different viewpoints.</p>
                    
                    <div class="mt-4">
                        <h5 class="fw-bold">Tour Highlights:</h5>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-mountain me-3 text-primary"></i>
                                <span>Sanetti Plateau - Africa's highest all-weather road</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-tree me-3 text-primary"></i>
                                <span>Harenna Forest - Mystical cloud forest ecosystem</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-paw me-3 text-primary"></i>
                                <span>Ethiopian wolf habitats</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Previous Tour
                        </button>
                        <button class="btn btn-primary">
                            Next Tour <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Destinations Section -->
        <section id="destinations" class="py-5">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="fw-bold mb-3">Adventure Destinations</h2>
                    <p class="lead">Discover Oromia's most exciting adventure tourism locations</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="location-card card h-100">
                        <img src="https://images.unsplash.com/photo-1604537529428-15bcbeecfe4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Bale Mountains">
                        <div class="card-body">
                            <h5 class="card-title">Bale Mountains</h5>
                            <p class="card-text">Home to the endangered Ethiopian wolf and stunning alpine landscapes.</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#baleModal">
                                View 360° Tour
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="location-card card h-100">
                        <img src="https://images.unsplash.com/photo-1581434681345-5b57fb961934?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Sof Omar Caves">
                        <div class="card-body">
                            <h5 class="card-title">Sof Omar Caves</h5>
                            <p class="card-text">The longest cave system in Ethiopia with spectacular limestone formations.</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#sofomarModal">
                                View 360° Tour
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="location-card card h-100">
                        <img src="https://images.unsplash.com/photo-1509319117193-57bab727e09d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Wenchi Crater Lake">
                        <div class="card-body">
                            <h5 class="card-title">Wenchi Crater Lake</h5>
                            <p class="card-text">A stunning volcanic crater lake with hiking trails and hot springs.</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#wenchiModal">
                                View 360° Tour
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="location-card card h-100">
                        <img src="https://images.unsplash.com/photo-1470114716159-e389f8712fda?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Awash National Park">
                        <div class="card-body">
                            <h5 class="card-title">Awash National Park</h5>
                            <p class="card-text">Spectacular waterfalls and diverse wildlife in the Great Rift Valley.</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#awashModal">
                                View 360° Tour
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="location-card card h-100">
                        <img src="https://images.unsplash.com/photo-1509319117193-57bab727e09d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Lake Langano">
                        <div class="card-body">
                            <h5 class="card-title">Lake Langano</h5>
                            <p class="card-text">A popular destination for water sports and bird watching.</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#langanoModal">
                                View 360° Tour
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="location-card card h-100">
                        <img src="https://images.unsplash.com/photo-1505245208761-ba872912fac0?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Dinsho">
                        <div class="card-body">
                            <h5 class="card-title">Dinsho</h5>
                            <p class="card-text">Gateway to Bale Mountains with cultural and wildlife attractions.</p>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dinshoModal">
                                View 360° Tour
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Explorer Section -->
        <section id="map-explorer" class="py-5">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="fw-bold mb-3">Interactive Map Explorer</h2>
                    <p class="lead">Discover Oromia's adventure locations and plan your journey</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="map-container">
                        <div id="oromiaMap" style="height: 100%; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Adventure Locations</h5>
                            <p>Click on markers to explore Oromia's adventure tourism sites:</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-mountain me-3 text-primary"></i>
                                    <span>Bale Mountains National Park</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-water me-3 text-primary"></i>
                                    <span>Wenchi Crater Lake</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-cave me-3 text-primary"></i>
                                    <span>Sof Omar Caves</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-hiking me-3 text-primary"></i>
                                    <span>Awash National Park</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-swimmer me-3 text-primary"></i>
                                    <span>Lake Langano</span>
                                </li>
                            </ul>
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-primary w-100" id="locateMeBtn">
                                    <i class="fas fa-location-arrow me-2"></i> Show My Location
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Book Tour Section -->
        <section id="book-tour" class="py-5">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="fw-bold mb-3">Ready for a Real Adventure?</h2>
                    <p class="lead">Book your Oromia adventure tour today</p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body p-5">
                            <form id="tourBookingForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tourDate" class="form-label">Preferred Tour Date</label>
                                        <input type="date" class="form-control" id="tourDate" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="tourPackage" class="form-label">Select Tour Package</label>
                                    <select class="form-select" id="tourPackage" required>
                                        <option value="" selected disabled>Choose a package</option>
                                        <option value="bale_mountains">Bale Mountains Expedition (5 days)</option>
                                        <option value="wenchi_lake">Wenchi Crater Lake Adventure (3 days)</option>
                                        <option value="sof_omar">Sof Omar Caves Exploration (2 days)</option>
                                        <option value="full_oromia">Complete Oromia Adventure (10 days)</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="specialRequests" class="form-label">Special Requests</label>
                                    <textarea class="form-control" id="specialRequests" rows="3"></textarea>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i> Submit Booking Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- VR Tour Modals -->
    <div class="modal fade" id="baleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bale Mountains 360° Tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="height: 500px;">
                        <a-scene embedded>
                            <a-sky src="https://images.unsplash.com/photo-1604537529428-15bcbeecfe4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" rotation="0 -90 0"></a-sky>
                            <a-camera>
                                <a-cursor></a-cursor>
                            </a-camera>
                        </a-scene>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#book-tour" class="btn btn-primary" data-bs-dismiss="modal">Book This Tour</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-mountain me-2"></i> Visit Oromia Adventures</h5>
                    <p>Discover the breathtaking landscapes and rich culture of Oromia, Ethiopia.</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Explore</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Virtual Tours</a></li>
                        <li><a href="#" class="text-white">Destinations</a></li>
                        <li><a href="#" class="text-white">Adventure Activities</a></li>
                        <li><a href="#" class="text-white">Cultural Experiences</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                        <li><a href="#" class="text-white">Blog</a></li>
                        <li><a href="#" class="text-white">Careers</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Newsletter</h5>
                    <p>Subscribe to get updates on new virtual tours and special offers.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2023 Visit Oromia Adventures. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Initialize Mapbox map
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWZyZW1tZWxha3UiLCJhIjoiY21hMWNmZ2RmMXpkNzJxc21nMW8yMWFpeiJ9.QVFNLkGpx1AHg2VJo4DKzQ';
        
        const map = new mapboxgl.Map({
            container: 'oromiaMap',
            style: 'mapbox://styles/mapbox/outdoors-v12',
            center: [39.7014, 6.9252], // Bale Mountains coordinates
            zoom: 7
        });
        
        // Add markers for adventure locations
        const adventureLocations = [
            {
                name: "Bale Mountains National Park",
                coordinates: [39.7014, 6.9252],
                description: "Home to the endangered Ethiopian wolf and stunning alpine landscapes.",
                icon: "mountain"
            },
            {
                name: "Wenchi Crater Lake",
                coordinates: [37.847, 8.753],
                description: "A stunning volcanic crater lake with hiking trails and hot springs.",
                icon: "water"
            },
            {
                name: "Sof Omar Caves",
                coordinates: [40.8667, 6.9],
                description: "The longest cave system in Ethiopia with spectacular limestone formations.",
                icon: "cave"
            },
            {
                name: "Awash National Park",
                coordinates: [40.0, 8.9167],
                description: "Spectacular waterfalls and diverse wildlife in the Great Rift Valley.",
                icon: "hiking"
            },
            {
                name: "Lake Langano",
                coordinates: [38.75, 7.6],
                description: "A popular destination for water sports and bird watching.",
                icon: "swimmer"
            }
        ];
        
        // Add markers to the map
        adventureLocations.forEach(location => {
            // Create a DOM element for the marker
            const el = document.createElement('div');
            el.className = 'marker';
            el.innerHTML = `<i class="fas fa-${location.icon}"></i>`;
            
            // Add the marker to the map
            new mapboxgl.Marker(el)
                .setLngLat(location.coordinates)
                .setPopup(new mapboxgl.Popup({ offset: 25 })
                    .setHTML(`<h5>${location.name}</h5><p>${location.description}</p>`))
                .addTo(map);
        });
        
        // Add geolocate control to the map
        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        }));
        
        // Locate me button functionality
        document.getElementById('locateMeBtn').addEventListener('click', function() {
            navigator.geolocation.getCurrentPosition(function(position) {
                map.flyTo({
                    center: [position.coords.longitude, position.coords.latitude],
                    zoom: 9
                });
            });
        });
        
        // Form submission
        document.getElementById('tourBookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your booking request! We will contact you shortly.');
            this.reset();
        });
    </script>
</body>
</html>