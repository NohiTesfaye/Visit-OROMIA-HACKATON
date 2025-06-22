<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel | ADD HOTELS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
            --accent-color: #fd79a8;
            --dark-color: #2d3436;
            --light-color: #f5f6fa;
            --success-color: #00b894;
            --warning-color: #fdcb6e;
            --danger-color: #d63031;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
        }
        
        .navbar-brand {
            font-family: 'Courgette', cursive;
            font-size: 1.8rem;
            color: var(--light-color) !important;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .navbar {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color)) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .nav-link {
            color: var(--light-color) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
            border-radius: 4px;
        }
        
        .nav-link:hover {
            background-color: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255,255,255,0.9);
            margin-bottom: 30px;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.25);
        }
        
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: var(--dark-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-info {
            background-color: #0984e3;
            border-color: #0984e3;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            border: none;
            padding: 15px;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(108, 92, 231, 0.05);
            transform: scale(1.005);
        }
        
        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid #f0f0f0;
        }
        
        h1, h2, h3, h4 {
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        .status-message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .success-message {
            background-color: rgba(0, 184, 148, 0.2);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }
        
        .error-message {
            background-color: rgba(214, 48, 49, 0.2);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }
        
        .logout-btn {
            background-color: var(--danger-color);
            color: white !important;
            border-radius: 6px;
            padding: 8px 15px !important;
            margin-left: 10px;
        }
        
        .logout-btn:hover {
            background-color: #c0392b !important;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark-color);
        }
        
        .input-group-text {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        
        .amenity-badge {
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        .hotel-image-preview {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
            display: none;
        }
        
        .action-buttons .btn {
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor1";
$hotelID = "";
$hotelName = "";
$city = "";
$locality = "";
$stars = "";
$rating = "";
$hotelDesc = "";
$checkIn = "";
$checkOut = "";
$price = "";
$roomsAvailable = "";
$wifi = "No";
$swimmingPool = "No";
$parking = "No";
$restaurant = "No";
$laundry = "No";
$cafe = "No";
$mainImage = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Connect to mysql database
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
    echo '<div class="error-message status-message">Connection Error: ' . $ex->getMessage() . '</div>';
}

// Get data from the form
function getData() {
    $data = array();
    $data[0] = isset($_POST['hotelID']) ? $_POST['hotelID'] : '';
    $data[1] = $_POST['hotelName'];
    $data[2] = $_POST['city'];
    $data[3] = $_POST['locality'];
    $data[4] = $_POST['stars'];
    $data[5] = $_POST['rating'];
    $data[6] = $_POST['hotelDesc'];
    $data[7] = $_POST['checkIn'];
    $data[8] = $_POST['checkOut'];
    $data[9] = $_POST['price'];
    $data[10] = $_POST['roomsAvailable'];
    $data[11] = isset($_POST['wifi']) ? 'Yes' : 'No';
    $data[12] = isset($_POST['swimmingPool']) ? 'Yes' : 'No';
    $data[13] = isset($_POST['parking']) ? 'Yes' : 'No';
    $data[14] = isset($_POST['restaurant']) ? 'Yes' : 'No';
    $data[15] = isset($_POST['laundry']) ? 'Yes' : 'No';
    $data[16] = isset($_POST['cafe']) ? 'Yes' : 'No';
    $data[17] = $_POST['mainImage'];
    return $data;
}

// Search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM hotels WHERE hotelID = '$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $hotelID = $rows['hotelID'];
                $hotelName = $rows['hotelName'];
                $city = $rows['city'];
                $locality = $rows['locality'];
                $stars = $rows['stars'];
                $rating = $rows['rating'];
                $hotelDesc = $rows['hotelDesc'];
                $checkIn = $rows['checkIn'];
                $checkOut = $rows['checkOut'];
                $price = $rows['price'];
                $roomsAvailable = $rows['roomsAvailable'];
                $wifi = $rows['wifi'];
                $swimmingPool = $rows['swimmingPool'];
                $parking = $rows['parking'];
                $restaurant = $rows['restaurant'];
                $laundry = $rows['laundry'];
                $cafe = $rows['cafe'];
                $mainImage = $rows['mainImage'];
            }
        } else {
            echo '<div class="error-message status-message">No hotel found with the specified ID</div>';
        }
    } else {
        echo '<div class="error-message status-message">Error in search operation</div>';
    }
}

// Insert
if (isset($_POST['insert'])) {
    $info = getData();
    $insert_query = "INSERT INTO `hotels`(`hotelName`, `city`, `locality`, `stars`, `rating`, `hotelDesc`, `checkIn`, `checkOut`, `price`, `roomsAvailable`, `wifi`, `swimmingPool`, `parking`, `restaurant`, `laundry`, `cafe`, `mainImage`) 
                    VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]','$info[15]','$info[16]','$info[17]')";
    try {
        $insert_result = mysqli_query($conn, $insert_query);
        if ($insert_result) {
            if (mysqli_affected_rows($conn) > 0) {
                $new_id = mysqli_insert_id($conn);
                echo '<div class="success-message status-message">Hotel added successfully. ID: ' . $new_id . '</div>';
                // Clear form after successful insert
                $hotelName = $city = $locality = $stars = $rating = $hotelDesc = $checkIn = $checkOut = $price = $roomsAvailable = $mainImage = "";
                $wifi = $swimmingPool = $parking = $restaurant = $laundry = $cafe = "No";
            } else {
                echo '<div class="error-message status-message">Failed to add hotel</div>';
            }
        }
    } catch (Exception $ex) {
        echo '<div class="error-message status-message">Error: ' . $ex->getMessage() . '</div>';
    }
}

// Delete
if (isset($_POST['delete'])) {
    $info = getData();
    if (!empty($info[0])) {
        $delete_query = "DELETE FROM `hotels` WHERE hotelID = '$info[0]'";
        try {
            $delete_result = mysqli_query($conn, $delete_query);
            if ($delete_result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo '<div class="success-message status-message">Hotel deleted successfully</div>';
                    // Clear form after successful delete
                    $hotelID = $hotelName = $city = $locality = $stars = $rating = $hotelDesc = $checkIn = $checkOut = $price = $roomsAvailable = $mainImage = "";
                    $wifi = $swimmingPool = $parking = $restaurant = $laundry = $cafe = "No";
                } else {
                    echo '<div class="error-message status-message">No hotel found with the specified ID</div>';
                }
            }
        } catch (Exception $ex) {
            echo '<div class="error-message status-message">Error: ' . $ex->getMessage() . '</div>';
        }
    } else {
        echo '<div class="error-message status-message">Please enter a Hotel ID to delete</div>';
    }
}

// Edit
if (isset($_POST['update'])) {
    $info = getData();
    if (!empty($info[0])) {
        $update_query = "UPDATE `hotels` SET 
                        hotelName='$info[1]',
                        city='$info[2]',
                        locality='$info[3]',
                        stars='$info[4]',
                        rating='$info[5]',
                        hotelDesc='$info[6]',
                        checkIn='$info[7]',
                        checkOut='$info[8]',
                        price='$info[9]',
                        roomsAvailable='$info[10]',
                        wifi='$info[11]',
                        swimmingPool='$info[12]',
                        parking='$info[13]',
                        restaurant='$info[14]',
                        laundry='$info[15]',
                        cafe='$info[16]',
                        mainImage='$info[17]' 
                        WHERE hotelID = '$info[0]'";
        try {
            $update_result = mysqli_query($conn, $update_query);
            if ($update_result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo '<div class="success-message status-message">Hotel updated successfully</div>';
                } else {
                    echo '<div class="error-message status-message">No changes made or hotel not found</div>';
                }
            }
        } catch (Exception $ex) {
            echo '<div class="error-message status-message">Error: ' . $ex->getMessage() . '</div>';
        }
    } else {
        echo '<div class="error-message status-message">Please enter a Hotel ID to update</div>';
    }
}
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">VISIT OROMIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users_add.php"><i class="fas fa-users me-1"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="hotels_add.php"><i class="fas fa-hotel me-1"></i> Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotelbookings_view.php"><i class="fas fa-calendar-check me-1"></i> Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flights_add.php"><i class="fas fa-plane me-1"></i> Flights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flightbookings_view.php"><i class="fas fa-ticket-alt me-1"></i> Flight Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trains_add.php"><i class="fas fa-train me-1"></i> Trains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trainbookings_view.php"><i class="fas fa-ticket-alt me-1"></i> Train Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout-btn" href="adminLogout.php"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="section-title">Hotel Management</h2>
                        <p class="text-muted mb-4">Add, search, update or delete hotel records</p>
                        
                        <form method="post" action="" id="hotelForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="hotelID" class="form-label">Hotel ID</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        <input type="number" name="hotelID" class="form-control" placeholder="Enter Hotel ID to search" value="<?php echo $hotelID; ?>">
                                    </div>
                                    <small class="text-muted">Enter Hotel ID to search existing records (leave blank when adding new hotel)</small>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="hotelName" class="form-label">Hotel Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-hotel"></i></span>
                                        <input type="text" name="hotelName" class="form-control" placeholder="Hotel Name" value="<?php echo $hotelName; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $city; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="locality" class="form-label">Locality</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" name="locality" class="form-control" placeholder="Locality/Area" value="<?php echo $locality; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="stars" class="form-label">Star Rating</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                        <select name="stars" class="form-select" required>
                                            <option value="">Select</option>
                                            <option value="1" <?php echo $stars==1?'selected':''; ?>>1 Star</option>
                                            <option value="2" <?php echo $stars==2?'selected':''; ?>>2 Stars</option>
                                            <option value="3" <?php echo $stars==3?'selected':''; ?>>3 Stars</option>
                                            <option value="4" <?php echo $stars==4?'selected':''; ?>>4 Stars</option>
                                            <option value="5" <?php echo $stars==5?'selected':''; ?>>5 Stars</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="rating" class="form-label">Guest Rating</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-thumbs-up"></i></span>
                                        <select name="rating" class="form-select" required>
                                            <option value="">Select</option>
                                            <option value="1" <?php echo $rating==1?'selected':''; ?>>1 (Poor)</option>
                                            <option value="2" <?php echo $rating==2?'selected':''; ?>>2 (Fair)</option>
                                            <option value="3" <?php echo $rating==3?'selected':''; ?>>3 (Good)</option>
                                            <option value="4" <?php echo $rating==4?'selected':''; ?>>4 (Very Good)</option>
                                            <option value="5" <?php echo $rating==5?'selected':''; ?>>5 (Excellent)</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="checkIn" class="form-label">Check-in Time</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-sign-in-alt"></i></span>
                                        <input type="time" name="checkIn" class="form-control" value="<?php echo $checkIn; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="checkOut" class="form-label">Check-out Time</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-sign-out-alt"></i></span>
                                        <input type="time" name="checkOut" class="form-control" value="<?php echo $checkOut; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price per Night (ETB)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                        <input type="number" name="price" class="form-control" placeholder="Price" value="<?php echo $price; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="roomsAvailable" class="form-label">Rooms Available</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                        <input type="number" name="roomsAvailable" class="form-control" placeholder="Available Rooms" value="<?php echo $roomsAvailable; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="hotelDesc" class="form-label">Hotel Description</label>
                                    <textarea name="hotelDesc" class="form-control" rows="3" placeholder="Enter hotel description" required><?php echo $hotelDesc; ?></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label">Amenities</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="wifi" id="wifi" value="Yes" <?php echo $wifi=='Yes'?'checked':''; ?>>
                                                <label class="form-check-label" for="wifi">
                                                    <i class="fas fa-wifi me-1"></i> Free WiFi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="swimmingPool" id="swimmingPool" value="Yes" <?php echo $swimmingPool=='Yes'?'checked':''; ?>>
                                                <label class="form-check-label" for="swimmingPool">
                                                    <i class="fas fa-swimming-pool me-1"></i> Swimming Pool
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="parking" id="parking" value="Yes" <?php echo $parking=='Yes'?'checked':''; ?>>
                                                <label class="form-check-label" for="parking">
                                                    <i class="fas fa-parking me-1"></i> Parking
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="restaurant" id="restaurant" value="Yes" <?php echo $restaurant=='Yes'?'checked':''; ?>>
                                                <label class="form-check-label" for="restaurant">
                                                    <i class="fas fa-utensils me-1"></i> Restaurant
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="laundry" id="laundry" value="Yes" <?php echo $laundry=='Yes'?'checked':''; ?>>
                                                <label class="form-check-label" for="laundry">
                                                    <i class="fas fa-tshirt me-1"></i> Laundry
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cafe" id="cafe" value="Yes" <?php echo $cafe=='Yes'?'checked':''; ?>>
                                                <label class="form-check-label" for="cafe">
                                                    <i class="fas fa-coffee me-1"></i> Cafe
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="mainImage" class="form-label">Hotel Image URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        <input type="text" name="mainImage" class="form-control" placeholder="Enter image URL" value="<?php echo $mainImage; ?>" id="imageUrl" required>
                                    </div>
                                    <?php if (!empty($mainImage)): ?>
                                        <img src="<?php echo $mainImage; ?>" alt="Hotel Image Preview" class="hotel-image-preview" id="imagePreview" style="display: block;">
                                    <?php else: ?>
                                        <img src="" alt="Hotel Image Preview" class="hotel-image-preview" id="imagePreview">
                                    <?php endif; ?>
                                </div>
                                
                                <div class="col-12">
                                    <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" name="search" class="btn btn-primary">
                                            <i class="fas fa-search me-2"></i> Search
                                        </button>
                                        <button type="submit" name="insert" class="btn btn-success">
                                            <i class="fas fa-plus me-2"></i> Add
                                        </button>
                                        <button type="submit" name="update" class="btn btn-warning">
                                            <i class="fas fa-sync-alt me-2"></i> Update
                                        </button>
                                        <button type="submit" name="delete" class="btn btn-danger">
                                            <i class="fas fa-trash-alt me-2"></i> Delete
                                        </button>
                                        <button type="reset" class="btn btn-secondary">
                                            <i class="fas fa-undo me-2"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="section-title">Hotels Database</h2>
                        <p class="text-muted mb-4">All hotels in the system</p>
                        
                        <div class="table-responsive">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "projectmeteor1";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die('<div class="error-message status-message">Connection failed: ' . $conn->connect_error . '</div>');
                            }

                            $sql = "SELECT hotelID, hotelName, city, locality, stars, rating, checkIn, checkOut, price, roomsAvailable, wifi, swimmingPool, parking, restaurant, laundry, cafe, mainImage FROM hotels";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo '<table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-hashtag"></i> ID</th>
                                                <th><i class="fas fa-hotel"></i> Hotel</th>
                                                <th><i class="fas fa-city"></i> City</th>
                                                <th><i class="fas fa-map-marker-alt"></i> Locality</th>
                                                <th><i class="fas fa-star"></i> Stars</th>
                                                <th><i class="fas fa-rupee-sign"></i> Price</th>
                                                <th><i class="fas fa-bed"></i> Rooms</th>
                                                <th><i class="fas fa-check-circle"></i> Amenities</th>
                                                <th><i class="fas fa-image"></i> Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                
                                while ($row = $result->fetch_assoc()) {
                                    $amenities = [];
                                    if ($row['wifi'] == 'Yes') $amenities[] = '<span class="badge bg-primary amenity-badge"><i class="fas fa-wifi"></i> WiFi</span>';
                                    if ($row['swimmingPool'] == 'Yes') $amenities[] = '<span class="badge bg-success amenity-badge"><i class="fas fa-swimming-pool"></i> Pool</span>';
                                    if ($row['parking'] == 'Yes') $amenities[] = '<span class="badge bg-info amenity-badge"><i class="fas fa-parking"></i> Parking</span>';
                                    if ($row['restaurant'] == 'Yes') $amenities[] = '<span class="badge bg-warning amenity-badge"><i class="fas fa-utensils"></i> Restaurant</span>';
                                    if ($row['laundry'] == 'Yes') $amenities[] = '<span class="badge bg-secondary amenity-badge"><i class="fas fa-tshirt"></i> Laundry</span>';
                                    if ($row['cafe'] == 'Yes') $amenities[] = '<span class="badge bg-dark amenity-badge"><i class="fas fa-coffee"></i> Cafe</span>';
                                    
                                    echo '<tr>
                                            <td>' . $row['hotelID'] . '</td>
                                            <td>
                                                <strong>' . $row['hotelName'] . '</strong><br>
                                                <small class="text-muted">' . str_repeat('★', $row['stars']) . ' ' . $row['rating'] . '/5</small>
                                            </td>
                                            <td>' . $row['city'] . '</td>
                                            <td>' . $row['locality'] . '</td>
                                            <td>' . str_repeat('★', $row['stars']) . '</td>
                                            <td>₹' . $row['price'] . '</td>
                                            <td>' . $row['roomsAvailable'] . '</td>
                                            <td>' . implode('', $amenities) . '</td>
                                            <td><img src="' . $row['mainImage'] . '" alt="Hotel Image" style="max-width: 80px; height: auto; border-radius: 4px;" onerror="this.style.display=\'none\'"></td>
                                          </tr>';
                                }
                                
                                echo '</tbody></table>';
                            } else {
                                echo '<div class="alert alert-info">No hotels found in the database</div>';
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image preview functionality
        document.getElementById('imageUrl').addEventListener('input', function() {
            const preview = document.getElementById('imagePreview');
            preview.src = this.value;
            if (this.value) {
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });
        
        // Show status messages and fade them out
        document.addEventListener('DOMContentLoaded', function() {
            const statusMessages = document.querySelectorAll('.status-message');
            statusMessages.forEach(message => {
                if (message.textContent.trim() !== '') {
                    setTimeout(() => {
                        message.style.opacity = '0';
                        message.style.transition = 'opacity 1s ease';
                        setTimeout(() => message.remove(), 1000);
                    }, 5000);
                }
            });
            
            // Clear hotelID when adding new hotel
            const insertBtn = document.querySelector('button[name="insert"]');
            if (insertBtn) {
                insertBtn.addEventListener('click', function() {
                    document.querySelector('input[name="hotelID"]').value = '';
                });
            }
        });
        
        // Form validation
        document.getElementById('hotelForm').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill all required fields');
            }
        });
    </script>
</body>
</html>