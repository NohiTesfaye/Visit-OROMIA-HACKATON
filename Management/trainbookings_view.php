<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel | Train Bookings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #5e72e4;
            --primary-dark: #4a5acf;
            --secondary: #f7fafc;
            --accent: #f687b3;
            --text: #2d3748;
            --light: #ffffff;
            --success: #48bb78;
            --danger: #f56565;
            --warning: #ed8936;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--text);
            line-height: 1.6;
        }
        
        /* Elegant Header */
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 2rem;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--light) !important;
            letter-spacing: 0.5px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.7rem 1.2rem !important;
            margin: 0 0.3rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        
        /* Luxe Content Container */
        .main-container {
            background-color: var(--light);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin: 2rem auto;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        /* Stylish Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--primary);
        }
        
        .page-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--primary);
            font-size: 2rem;
            margin: 0;
            display: flex;
            align-items: center;
        }
        
        .page-title i {
            margin-right: 15px;
            font-size: 1.8rem;
            color: var(--accent);
        }
        
        /* Refined Table */
        .booking-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.95rem;
        }
        
        .booking-table thead th {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--light);
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            border: none;
            position: sticky;
            top: 0;
        }
        
        .booking-table tbody tr {
            transition: all 0.2s ease;
            background-color: var(--light);
        }
        
        .booking-table tbody tr:nth-child(even) {
            background-color: var(--secondary);
        }
        
        .booking-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .booking-table td {
            padding: 1.2rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        /* Elegant Status Badges */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .badge-confirmed {
            background-color: rgba(72, 187, 120, 0.1);
            color: var(--success);
            border: 1px solid rgba(72, 187, 120, 0.3);
        }
        
        .badge-cancelled {
            background-color: rgba(245, 101, 101, 0.1);
            color: var(--danger);
            border: 1px solid rgba(245, 101, 101, 0.3);
        }
        
        /* Beautiful Route Display */
        .route-display {
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        .route-arrow {
            margin: 0 1rem;
            color: var(--primary);
            font-size: 0.9rem;
        }
        
        /* Action Buttons */
        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            margin: 0 3px;
            cursor: pointer;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
        }
        
        .btn-view {
            background-color: rgba(94, 114, 228, 0.1);
            color: var(--primary);
        }
        
        .btn-edit {
            background-color: rgba(246, 135, 179, 0.1);
            color: var(--accent);
        }
        
        .btn-cancel {
            background-color: rgba(245, 101, 101, 0.1);
            color: var(--danger);
        }
        
        /* Modal Styling */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 12px 12px 0 0;
            border: none;
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .booking-detail {
            margin-bottom: 1.5rem;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.3rem;
        }
        
        .detail-value {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <!-- Elegant Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-train me-2"></i>LuxeRail
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./users_add.php"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./hotels_add.php"><i class="fas fa-users"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./hotels_add"><i class="fas fa-hotel"></i> Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./flights_add.php"><i class="fas fa-plane"></i> Flights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./trains_add.php"><i class="fas fa-train"></i> Trains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog"></i> Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="main-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">
                    <i class="fas fa-ticket-alt"></i>Train Bookings
                </h1>
                <div>
                    <button class="btn btn-primary px-4 py-2" style="background: var(--primary); border: none;">
                        <i class="fas fa-plus me-2"></i>New Booking
                    </button>
                </div>
            </div>
            
            <!-- Bookings Table -->
            <div class="table-responsive">
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Passenger</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Route</th>
                            <th>Passengers</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Booking 1 -->
                        <tr id="booking-TR7852">
                            <td><strong>#TR7852</strong></td>
                            <td>Sarah Johnson</td>
                            <td>May 15, 2023</td>
                            <td>
                                <span class="status-badge badge-confirmed" id="status-TR7852">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Confirmed
                                </span>
                            </td>
                            <td>
                                <div class="route-display">
                                    <span>New York</span>
                                    <i class="fas fa-arrow-right route-arrow"></i>
                                    <span>Washington</span>
                                </div>
                            </td>
                            <td>2</td>
                            <td>
                                <button class="action-btn btn-view" onclick="viewBooking('TR7852')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn btn-edit" onclick="editBooking('TR7852')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-cancel" onclick="cancelBooking('TR7852')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Booking 2 -->
                        <tr id="booking-TR6421">
                            <td><strong>#TR6421</strong></td>
                            <td>Michael Chen</td>
                            <td>May 18, 2023</td>
                            <td>
                                <span class="status-badge badge-confirmed" id="status-TR6421">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Confirmed
                                </span>
                            </td>
                            <td>
                                <div class="route-display">
                                    <span>Chicago</span>
                                    <i class="fas fa-arrow-right route-arrow"></i>
                                    <span>Los Angeles</span>
                                </div>
                            </td>
                            <td>1</td>
                            <td>
                                <button class="action-btn btn-view" onclick="viewBooking('TR6421')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn btn-edit" onclick="editBooking('TR6421')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-cancel" onclick="cancelBooking('TR6421')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Booking 3 -->
                        <tr id="booking-TR5198">
                            <td><strong>#TR5198</strong></td>
                            <td>Emily Rodriguez</td>
                            <td>May 20, 2023</td>
                            <td>
                                <span class="status-badge badge-cancelled" id="status-TR5198">
                                    <i class="fas fa-times-circle me-1"></i>
                                    Cancelled
                                </span>
                            </td>
                            <td>
                                <div class="route-display">
                                    <span>Boston</span>
                                    <i class="fas fa-arrow-right route-arrow"></i>
                                    <span>Philadelphia</span>
                                </div>
                            </td>
                            <td>4</td>
                            <td>
                                <button class="action-btn btn-view" onclick="viewBooking('TR5198')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn btn-edit" onclick="editBooking('TR5198')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn btn-cancel" onclick="cancelBooking('TR5198')" disabled>
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View Booking Modal -->
    <div class="modal fade" id="viewBookingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bookingDetails">
                    <!-- Details will be inserted here by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printBooking()">
                        <i class="fas fa-print me-1"></i> Print Ticket
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Booking Modal -->
    <div class="modal fade" id="editBookingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Booking</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBookingForm">
                        <div class="mb-3">
                            <label class="form-label">Passenger Name</label>
                            <input type="text" class="form-control" id="editPassengerName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Travel Date</label>
                            <input type="date" class="form-control" id="editTravelDate">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Route</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" class="form-control" id="editOrigin" placeholder="From">
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <i class="fas fa-arrow-right text-muted"></i>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="editDestination" placeholder="To">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number of Passengers</label>
                            <input type="number" class="form-control" id="editPassengers" min="1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveBookingChanges()">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // View Booking Details
        function viewBooking(bookingId) {
            // In a real app, you would fetch this data from your database
            const bookingData = {
                'TR7852': {
                    passenger: 'Sarah Johnson',
                    date: '2023-05-15',
                    status: 'Confirmed',
                    origin: 'New York',
                    destination: 'Washington',
                    passengers: '2',
                    class: 'First Class',
                    fare: '$189.00',
                    payment: 'Credit Card (****4532)'
                },
                'TR6421': {
                    passenger: 'Michael Chen',
                    date: '2023-05-18',
                    status: 'Confirmed',
                    origin: 'Chicago',
                    destination: 'Los Angeles',
                    passengers: '1',
                    class: 'Business',
                    fare: '$245.00',
                    payment: 'PayPal'
                },
                'TR5198': {
                    passenger: 'Emily Rodriguez',
                    date: '2023-05-20',
                    status: 'Cancelled',
                    origin: 'Boston',
                    destination: 'Philadelphia',
                    passengers: '4',
                    class: 'Economy',
                    fare: '$320.00',
                    payment: 'Credit Card (****6712)'
                }
            };
            
            const booking = bookingData[bookingId];
            const detailsHtml = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="booking-detail">
                            <div class="detail-label">Booking ID</div>
                            <div class="detail-value">#${bookingId}</div>
                        </div>
                        <div class="booking-detail">
                            <div class="detail-label">Passenger Name</div>
                            <div class="detail-value">${booking.passenger}</div>
                        </div>
                        <div class="booking-detail">
                            <div class="detail-label">Travel Date</div>
                            <div class="detail-value">${new Date(booking.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-detail">
                            <div class="detail-label">Status</div>
                            <div class="detail-value">
                                <span class="status-badge ${booking.status === 'Confirmed' ? 'badge-confirmed' : 'badge-cancelled'}">
                                    <i class="fas ${booking.status === 'Confirmed' ? 'fa-check-circle' : 'fa-times-circle'} me-1"></i>
                                    ${booking.status}
                                </span>
                            </div>
                        </div>
                        <div class="booking-detail">
                            <div class="detail-label">Class</div>
                            <div class="detail-value">${booking.class}</div>
                        </div>
                        <div class="booking-detail">
                            <div class="detail-label">Total Fare</div>
                            <div class="detail-value">${booking.fare}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="booking-detail">
                            <div class="detail-label">Route</div>
                            <div class="detail-value">
                                <div class="route-display">
                                    <span>${booking.origin}</span>
                                    <i class="fas fa-arrow-right route-arrow"></i>
                                    <span>${booking.destination}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-detail">
                            <div class="detail-label">Passengers</div>
                            <div class="detail-value">${booking.passengers}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="booking-detail">
                            <div class="detail-label">Payment Method</div>
                            <div class="detail-value">${booking.payment}</div>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('bookingDetails').innerHTML = detailsHtml;
            const modal = new bootstrap.Modal(document.getElementById('viewBookingModal'));
            modal.show();
        }

        // Edit Booking
        function editBooking(bookingId) {
            // In a real app, you would populate this form with actual booking data
            document.getElementById('editPassengerName').value = document.querySelector(`#booking-${bookingId} td:nth-child(2)`).textContent;
            document.getElementById('editTravelDate').value = '2023-05-15'; // Example date
            const routeParts = document.querySelector(`#booking-${bookingId} .route-display`).textContent.split(/\s+/);
            document.getElementById('editOrigin').value = routeParts[0];
            document.getElementById('editDestination').value = routeParts[2];
            document.getElementById('editPassengers').value = document.querySelector(`#booking-${bookingId} td:nth-child(6)`).textContent;
            
            const modal = new bootstrap.Modal(document.getElementById('editBookingModal'));
            modal.show();
        }

        // Save Booking Changes
        function saveBookingChanges() {
            // In a real app, you would save these changes to your database
            alert('Booking changes saved successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('editBookingModal'));
            modal.hide();
        }

        // Cancel Booking
        function cancelBooking(bookingId) {
            if (confirm('Are you sure you want to cancel this booking?')) {
                // In a real app, you would update the booking status in your database
                const statusBadge = document.getElementById(`status-${bookingId}`);
                statusBadge.className = 'status-badge badge-cancelled';
                statusBadge.innerHTML = '<i class="fas fa-times-circle me-1"></i>Cancelled';
                
                // Disable the cancel button
                const cancelBtn = document.querySelector(`#booking-${bookingId} .btn-cancel`);
                cancelBtn.disabled = true;
                
                alert('Booking has been cancelled successfully!');
            }
        }

        // Print Booking
        function printBooking() {
            alert('Printing booking ticket...');
            // In a real app, this would open the print dialog for the booking
        }
    </script>
</body>
</html>