<?php
session_start();
// Include the common header (navbar, etc.)

// Fetch the search query from the GET parameter
$query = isset($_GET['query']) ? $_GET['query'] : '';

// If there's no query, redirect to the home page
if (empty($query)) {
    header('Location: index.php');
    exit();
}

// Dummy data for demonstration purposes (Replace with actual data from your database)
$destinations = [
    ['name' => 'Bale Mountain National Park', 'description' => 'Explore the stunning highlands and diverse wildlife including the rare Ethiopian wolf.', 'image' => 'visit oromia/baalee.jpg', 'link' => 'Explore_Oromia/Bale-Mountain/index.html', 'rating' => 4.8],
    ['name' => 'Wenchi Crater Lake', 'description' => 'A serene volcanic crater lake surrounded by lush greenery and hot springs.', 'image' => 'visit oromia/wenchi.jfif', 'link' => 'Explore_Oromia/Wenchi/index.html', 'rating' => 4.6],
    ['name' => 'Awash National Park', 'description' => 'Home to diverse wildlife including oryx, kudu, and over 400 bird species.', 'image' => 'visit oromia/awash NP4.jpg', 'link' => 'Explore_Oromia/Awash/index.html', 'rating' => 4.4],
    ['name' => 'Sof Omar Cave', 'description' => 'The longest cave system in Ethiopia with spectacular limestone formations.', 'image' => 'visit oromia/sof_omar.jpg', 'link' => 'Explore_Oromia/Sof-Omar/index.html', 'rating' => 4.7],
    ['name' => 'Lake Langano', 'description' => 'A beautiful rift valley lake perfect for swimming and bird watching.', 'image' => 'visit oromia/langano.jpg', 'link' => 'Explore_Oromia/Langano/index.html', 'rating' => 4.3],
    ['name' => 'Dinsho Wildlife Sanctuary', 'description' => 'Gateway to Bale Mountains with abundant wildlife viewing opportunities.', 'image' => 'visit oromia/dinsho.jpg', 'link' => 'Explore_Oromia/Dinsho/index.html', 'rating' => 4.5],
];

// Filter destinations based on the search query
$filteredDestinations = array_filter($destinations, function($destination) use ($query) {
    return strpos(strtolower($destination['name']), strtolower($query)) !== false;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results for "<?php echo htmlspecialchars($query); ?>" | VISIT OROMIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2E8B57;
            --light-green: #D5E5D5;
            --dark-green: #1A4D2E;
            --accent-orange: #FF7F50;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: var(--dark-green);
        }
        
        .search-header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), url('https://images.unsplash.com/photo-1464037866556-6812c9d1c72e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            margin-bottom: 40px;
            text-align: center;
        }
        
        .search-header h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }
        
        .search-count {
            font-size: 1.1rem;
            background-color: rgba(255,255,255,0.2);
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
        }
        
        .destination-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            height: 100%;
        }
        
        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .destination-card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark-green);
        }
        
        .card-text {
            color: #666;
            margin-bottom: 15px;
        }
        
        .btn-explore {
            background-color: var(--primary-green);
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-explore:hover {
            background-color: var(--dark-green);
            transform: translateY(-2px);
        }
        
        .rating {
            color: var(--accent-orange);
            margin-bottom: 10px;
        }
        
        .no-results {
            text-align: center;
            padding: 60px 0;
        }
        
        .no-results i {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 20px;
        }
        
        .no-results h3 {
            margin-bottom: 20px;
        }
        
        .search-suggestions {
            margin-top: 30px;
        }
        
        .search-suggestions h4 {
            margin-bottom: 15px;
        }
        
        .suggestion-tag {
            display: inline-block;
            background-color: var(--light-green);
            color: var(--dark-green);
            padding: 5px 15px;
            border-radius: 50px;
            margin-right: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .suggestion-tag:hover {
            background-color: var(--primary-green);
            color: white;
        }
        
        @media (max-width: 768px) {
            .search-header {
                padding: 60px 0;
            }
            
            .search-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Search Header -->
    <div class="search-header">
        <div class="container">
            <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
            <div class="search-count">
                <?php echo count($filteredDestinations); ?> destinations found
            </div>
        </div>
    </div>

    <div class="container">
        <?php if (count($filteredDestinations) > 0): ?>
            <div class="row">
                <?php foreach ($filteredDestinations as $destination): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="destination-card">
                            <img src="<?php echo $destination['image']; ?>" class="card-img-top" alt="<?php echo $destination['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $destination['name']; ?></h5>
                                <?php if (isset($destination['rating'])): ?>
                                    <div class="rating">
                                        <?php for ($i = 0; $i < floor($destination['rating']); $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                        <?php if ($destination['rating'] - floor($destination['rating']) >= 0.5): ?>
                                            <i class="fas fa-star-half-alt"></i>
                                        <?php endif; ?>
                                        <span class="ms-2"><?php echo $destination['rating']; ?></span>
                                    </div>
                                <?php endif; ?>
                                <p class="card-text"><?php echo $destination['description']; ?></p>
                                <a href="<?php echo $destination['link']; ?>" class="btn btn-explore">
                                    Explore <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-results">
                <i class="far fa-compass"></i>
                <h3>No results found for "<?php echo htmlspecialchars($query); ?>"</h3>
                <p class="lead">We couldn't find any destinations matching your search.</p>
                
                <div class="search-suggestions">
                    <h4>Try searching for:</h4>
                    <a href="search.php?query=Bale" class="suggestion-tag">Bale</a>
                    <a href="search.php?query=Lake" class="suggestion-tag">Lake</a>
                    <a href="search.php?query=National Park" class="suggestion-tag">National Park</a>
                    <a href="search.php?query=Waterfall" class="suggestion-tag">Waterfall</a>
                    <a href="search.php?query=Culture" class="suggestion-tag">Culture</a>
                </div>
                
                <div class="mt-4">
                    <a href="index.php" class="btn btn-outline-primary">
                        <i class="fas fa-home me-2"></i> Return to Home
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple animation for cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.destination-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease ' + (index * 0.1) + 's';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
</body>
</html>