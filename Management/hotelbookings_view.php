<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel | Hotel Bookings</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
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
            color: #ffdd57 !important;
            text-decoration: underline;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255,255,255,0.95);
            margin-bottom: 30px;
            animation: fadeIn 1s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 10px;
            font-weight: 700;
            color: var(--primary-color);
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
            text-align: center;
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
            text-align: center;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.85rem;
        }
        
        .status-active {
            background-color: rgba(0, 184, 148, 0.2);
            color: var(--success-color);
        }
        
        .status-cancelled {
            background-color: rgba(214, 48, 49, 0.2);
            color: var(--danger-color);
        }
        
        .action-btn {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.85rem;
            margin: 0 3px;
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
        
        .search-box {
            max-width: 300px;
            margin-bottom: 20px;
        }
        
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }
        
        .confirmation-dialog {
            max-width: 500px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Tourism Management System</a>
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
                        <a class="nav-link" href="hotels_add.php"><i class="fas fa-hotel me-1"></i> Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="hotelbookings_view.php"><i class="fas fa-calendar-check me-1"></i> Bookings</a>
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
                        <h2 class="section-title">Hotel Bookings Management</h2>
                        <p class="text-muted mb-4">View and manage all hotel bookings</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="search-box">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search bookings..." id="searchInput">
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary" onclick="window.location.reload()">
                                    <i class="fas fa-sync-alt me-2"></i> Refresh
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "projectmeteor";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die('<div class="alert alert-danger">Connection failed: ' . $conn->connect_error . '</div>');
                            }

                            $sql = "SELECT bookingID, hotelName, date, username, cancelled FROM hotelbookings ORDER BY date DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo '<table class="table table-hover align-middle" id="bookingsTable">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-hashtag"></i> Booking ID</th>
                                                <th><i class="fas fa-hotel"></i> Hotel Name</th>
                                                <th><i class="fas fa-calendar-day"></i> Date</th>
                                                <th><i class="fas fa-user"></i> Username</th>
                                                <th><i class="fas fa-info-circle"></i> Status</th>
                                                <th><i class="fas fa-cog"></i> Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                
                                while ($row = $result->fetch_assoc()) {
                                    $statusClass = $row['cancelled'] == 'Yes' ? 'status-cancelled' : 'status-active';
                                    $statusText = $row['cancelled'] == 'Yes' ? 'Cancelled' : 'Active';
                                    
                                    echo '<tr data-booking-id="' . $row['bookingID'] . '">
                                            <td>' . $row['bookingID'] . '</td>
                                            <td>' . $row['hotelName'] . '</td>
                                            <td>' . $row['date'] . '</td>
                                            <td>' . $row['username'] . '</td>
                                            <td><span class="status-badge ' . $statusClass . '">' . $statusText . '</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary action-btn view-btn" data-bs-toggle="tooltip" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>';
                                    
                                    if ($row['cancelled'] == 'No') {
                                        echo '<button class="btn btn-sm btn-outline-warning action-btn edit-btn" data-bs-toggle="tooltip" title="Edit Booking">
                                                <i class="fas fa-edit"></i>
                                              </button>
                                              <button class="btn btn-sm btn-outline-danger action-btn cancel-btn" data-bs-toggle="tooltip" title="Cancel Booking">
                                                <i class="fas fa-times"></i>
                                              </button>';
                                    }
                                    
                                    echo '</td>
                                          </tr>';
                                }
                                
                                echo '</tbody></table>';
                            } else {
                                echo '<div class="alert alert-info">No hotel bookings found in the database</div>';
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Booking Modal -->
    <div class="modal fade" id="viewBookingModal" tabindex="-1" aria-labelledby="viewBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewBookingModalLabel">Booking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bookingDetails">
                    <!-- Details will be loaded here via AJAX -->
                    <div class="text-center my-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Booking Confirmation Modal -->
    <div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog confirmation-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="cancelBookingModalLabel">Confirm Cancellation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this booking?</p>
                    <p><strong>Booking ID:</strong> <span id="cancelBookingId"></span></p>
                    <p><strong>Hotel:</strong> <span id="cancelHotelName"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Keep Booking</button>
                    <button type="button" class="btn btn-danger" id="confirmCancelBtn">Yes, Cancel Booking</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize variables
        let currentBookingId = null;
        const viewBookingModal = new bootstrap.Modal(document.getElementById('viewBookingModal'));
        const cancelBookingModal = new bootstrap.Modal(document.getElementById('cancelBookingModal'));
        
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#bookingsTable tbody tr');
            
            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });
        
        // View Booking Button Click
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                currentBookingId = row.getAttribute('data-booking-id');
                
                // Show loading state
                document.getElementById('bookingDetails').innerHTML = `
                    <div class="text-center my-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`;
                
                // Show modal
                viewBookingModal.show();
                
                // Simulate loading booking details (replace with actual AJAX call)
                setTimeout(() => {
                    // This would be replaced with actual data from your database
                    document.getElementById('bookingDetails').innerHTML = `
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Booking Information</h5>
                                <p><strong>Booking ID:</strong> ${currentBookingId}</p>
                                <p><strong>Hotel Name:</strong> ${row.cells[1].textContent}</p>
                                <p><strong>Booking Date:</strong> ${row.cells[2].textContent}</p>
                                <p><strong>User:</strong> ${row.cells[3].textContent}</p>
                                <p><strong>Status:</strong> ${row.cells[4].textContent}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Additional Details</h5>
                                <p><strong>Check-in Date:</strong> ${new Date(row.cells[2].textContent).toLocaleDateString()}</p>
                                <p><strong>Check-out Date:</strong> ${new Date(new Date(row.cells[2].textContent).getTime() + 86400000).toLocaleDateString()}</p>
                                <p><strong>Room Type:</strong> Standard Double</p>
                                <p><strong>Guests:</strong> 2 Adults</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5>Special Requests</h5>
                            <p>None</p>
                        </div>`;
                }, 1000);
            });
        });
        
        // Cancel Booking Button Click
        document.querySelectorAll('.cancel-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                currentBookingId = row.getAttribute('data-booking-id');
                
                // Set modal content
                document.getElementById('cancelBookingId').textContent = currentBookingId;
                document.getElementById('cancelHotelName').textContent = row.cells[1].textContent;
                
                // Show modal
                cancelBookingModal.show();
            });
        });
        
        // Confirm Cancellation Button Click
        document.getElementById('confirmCancelBtn').addEventListener('click', function() {
            // Here you would make an AJAX call to cancel the booking
            // For demonstration, we'll just update the UI
            
            // Find the row with the current booking ID
            const row = document.querySelector(`tr[data-booking-id="${currentBookingId}"]`);
            if (row) {
                // Update status
                row.cells[4].innerHTML = '<span class="status-badge status-cancelled">Cancelled</span>';
                
                // Remove action buttons
                const actionCell = row.cells[5];
                actionCell.innerHTML = '<button class="btn btn-sm btn-outline-primary action-btn view-btn" data-bs-toggle="tooltip" title="View Details">' +
                                      '<i class="fas fa-eye"></i></button>';
                
                // Reattach event listener to the new view button
                actionCell.querySelector('.view-btn').addEventListener('click', function() {
                    // Same view functionality as before
                    const row = this.closest('tr');
                    currentBookingId = row.getAttribute('data-booking-id');
                    document.getElementById('bookingDetails').innerHTML = `
                        <div class="text-center my-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>`;
                    viewBookingModal.show();
                    setTimeout(() => {
                        document.getElementById('bookingDetails').innerHTML = `
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Booking Information</h5>
                                    <p><strong>Booking ID:</strong> ${currentBookingId}</p>
                                    <p><strong>Hotel Name:</strong> ${row.cells[1].textContent}</p>
                                    <p><strong>Booking Date:</strong> ${row.cells[2].textContent}</p>
                                    <p><strong>User:</strong> ${row.cells[3].textContent}</p>
                                    <p><strong>Status:</strong> ${row.cells[4].textContent}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Additional Details</h5>
                                    <p><strong>Check-in Date:</strong> ${new Date(row.cells[2].textContent).toLocaleDateString()}</p>
                                    <p><strong>Check-out Date:</strong> ${new Date(new Date(row.cells[2].textContent).getTime() + 86400000).toLocaleDateString()}</p>
                                    <p><strong>Room Type:</strong> Standard Double</p>
                                    <p><strong>Guests:</strong> 2 Adults</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h5>Special Requests</h5>
                                <p>None</p>
                            </div>`;
                    }, 1000);
                });
            }
            
            // Show success message
            alert('Booking cancelled successfully!');
            
            // Close modal
            cancelBookingModal.hide();
        });
        
        // Edit Booking Button Click
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const bookingId = row.getAttribute('data-booking-id');
                alert('Edit functionality for booking ID: ' + bookingId + ' would be implemented here');
                // In a real implementation, this would open an edit form/modal
            });
        });
    </script>
</body>
</html>