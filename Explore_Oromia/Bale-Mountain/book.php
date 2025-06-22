<?php
// Database connection
$host = "localhost"; // Replace with your host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "projectmeteor"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch hotels in Baalee city
$city = "Baalee"; // Fixed city name
$sql = "SELECT * FROM hotels WHERE city = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $city);
$stmt->execute();
$result = $stmt->get_result();

$hotels = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hotels[] = $row;
    }
} else {
    echo "<p>No hotels found in Baalee city.</p>";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels in Baalee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hotel-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hotel-card img {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Hotels in Baalee</h1>

        <!-- Display Hotels -->
        <div class="mt-5">
            <?php if (!empty($hotels)): ?>
                <div class="row">
                    <?php foreach ($hotels as $hotel): ?>
                        <div class="col-md-6">
                            <div class="hotel-card">
                                <img src="<?php echo htmlspecialchars($hotel['mainImage']); ?>" alt="<?php echo htmlspecialchars($hotel['hotelName']); ?>">
                                <h3><?php echo htmlspecialchars($hotel['hotelName']); ?></h3>
                                <p><strong>Locality:</strong> <?php echo htmlspecialchars($hotel['locality']); ?></p>
                                <p><strong>Rating:</strong> <?php echo htmlspecialchars($hotel['rating']); ?></p>
                                <p><strong>Price:</strong> $<?php echo htmlspecialchars($hotel['price']); ?> per night</p>
                                <p><strong>Rooms Available:</strong> <?php echo htmlspecialchars($hotel['roomsAvailable']); ?></p>
                                <p><strong>Amenities:</strong>
                                    <?php
                                    $amenities = [];
                                    if ($hotel['wifi'] == 'Yes') $amenities[] = 'Wi-Fi';
                                    if ($hotel['swimmingPool'] == 'Yes') $amenities[] = 'Swimming Pool';
                                    if ($hotel['parking'] == 'Yes') $amenities[] = 'Parking';
                                    if ($hotel['restaurant'] == 'Yes') $amenities[] = 'Restaurant';
                                    if ($hotel['laundry'] == 'Yes') $amenities[] = 'Laundry';
                                    if ($hotel['cafe'] == 'Yes') $amenities[] = 'Cafe';
                                    echo implode(', ', $amenities);
                                    ?>
                                </p>
                                <a href="book.php?hotelID=<?php echo htmlspecialchars($hotel['hotelID']); ?>" class="btn btn-success">Book Now</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No hotels found in Baalee city.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>