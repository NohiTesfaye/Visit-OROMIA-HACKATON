<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:blocked.php");
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION["username"];
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address1 = $conn->real_escape_string($_POST['address1']);
    $address2 = $conn->real_escape_string($_POST['address2']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    
    // Handle profile photo upload
    $profilePhoto = null;
    if(isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] == 0) {
        $targetDir = "uploads/profile_photos/";
        if(!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        $fileExt = pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION);
        $fileName = $user . '_' . time() . '.' . $fileExt;
        $targetFile = $targetDir . $fileName;
        
        // Check if image file is a actual image
        $check = getimagesize($_FILES['profilePhoto']['tmp_name']);
        if($check !== false) {
            // Allow certain file formats
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if(in_array(strtolower($fileExt), $allowedTypes)) {
                // Check file size (5MB max)
                if($_FILES['profilePhoto']['size'] <= 5000000) {
                    if(move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $targetFile)) {
                        $profilePhoto = $targetFile;
                    }
                }
            }
        }
    }
    
    $updateSQL = "UPDATE users SET 
                  FullName = '$fullName',
                  EMail = '$email',
                  Phone = '$phone',
                  AddressLine1 = '$address1',
                  AddressLine2 = '$address2',
                  City = '$city',
                  State = '$state'";
                  
    if($profilePhoto) {
        $updateSQL .= ", ProfilePhoto = '$profilePhoto'";
    }
    
    $updateSQL .= " WHERE Username = '$user'";
    
    if ($conn->query($updateSQL)) {
        $success = "Profile updated successfully!";
        // Refresh user data
        $profileSQL = "SELECT * FROM users WHERE Username='$user'";
        $profileQuery = $conn->query($profileSQL);
        $row = $profileQuery->fetch_assoc();
    } else {
        $error = "Error updating profile: " . $conn->error;
    }
}

// Get current user data
$user = $_SESSION["username"];
$profileSQL = "SELECT * FROM users WHERE Username='$user'";
$profileQuery = $conn->query($profileSQL);
$row = $profileQuery->fetch_assoc();

// Set default profile photo if none exists
$profilePhoto = !empty($row['ProfilePhoto']) ? $row['ProfilePhoto'] : 'images/default-profile.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard | tourism_management</title>
    
    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/userDashboard.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    
    <style>
        .profile-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
        }
        
        .profile-header {
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .profile-field {
            margin-bottom: 20px;
        }
        
        .profile-label {
            font-weight: 600;
            color: #7f8c8d;
            margin-bottom: 5px;
        }
        
        .profile-value {
            color: #34495e;
            font-size: 16px;
            padding: 8px 0;
        }
        
        .edit-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .edit-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .save-btn {
            background: #2ecc71;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .save-btn:hover {
            background: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .cancel-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .cancel-btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            box-shadow: none;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        
        .alert-success {
            background: #2ecc71;
            color: white;
            border: none;
        }
        
        .alert-danger {
            background: #e74c3c;
            color: white;
            border: none;
        }
        
        .profile-photo-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid #f1f1f1;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .profile-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .profile-photo-upload {
            display: none;
        }
        
        .profile-photo-edit {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.5);
            color: white;
            text-align: center;
            padding: 8px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .profile-photo-container:hover .profile-photo-edit {
            opacity: 1;
        }
        
        .cropper-container {
            max-width: 100%;
        }
        
        .modal-footer {
            justify-content: space-between;
        }
        
        .progress {
            height: 10px;
            margin-top: 10px;
            display: none;
        }
        
        .progress-bar {
            transition: width 0.3s;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .facebook { background: #3b5998; }
        .twitter { background: #1da1f2; }
        .instagram { background: #e1306c; }
        .linkedin { background: #0077b5; }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="col-sm-12 userDashboard text-center">
            <?php include("common/headerDashboardTransparentLoggedIn.php"); ?>
            
            <div class="col-sm-12">
                <div class="heading text-center">
                    My Dashboard
                </div>
            </div>
            
            <div class="col-sm-1"></div>
            
            <div class="col-sm-3 containerBoxLeft">
                <div class="col-sm-12 menuContainer bottomBorder active">
                    <span class="fa fa-user-o"></span> My Profile
                </div>
                
                <a href="userDashboardBookings.php">
                    <div class="col-sm-12 menuContainer bottomBorder">
                        <span class="fa fa-copy"></span> My Bookings
                    </div>
                </a>
                
                <a href="userDashboardETickets.php">
                    <div class="col-sm-12 menuContainer bottomBorder">
                        <span class="fa fa-clone"></span> My E-Tickets
                    </div>
                </a>
                
                <a href="userDashboardCancelTicket.php">
                    <div class="col-sm-12 menuContainer bottomBorder">
                        <span class="fa fa-close"></span> Cancel Ticket
                    </div>
                </a>
                
                <a href="userDashboardAccountSettings.php">
                    <div class="col-sm-12 menuContainer">
                        <span class="fa fa-bar-chart"></span> Account Stats
                    </div>
                </a>
            </div>
            
            <div class="col-sm-7 containerBoxRight text-left">
                <div class="profile-container">
                    <?php if(isset($success)): ?>
                        <div class="alert alert-success animate__animated animate__fadeIn">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger animate__animated animate__fadeIn">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3 class="profile-header">
                        <i class="fa fa-user-circle"></i> My Profile
                        <button id="editProfileBtn" class="btn edit-btn">
                            <i class="fa fa-edit"></i> Edit Profile
                        </button>
                    </h3>
                    
                    <form id="profileForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="profile-photo-container">
                                    <img src="<?php echo $profilePhoto; ?>" class="profile-photo" id="profilePhotoPreview">
                                    <div class="profile-photo-edit edit-mode" style="display: none;">
                                        <i class="fa fa-camera"></i> Change Photo
                                    </div>
                                    <input type="file" class="profile-photo-upload" id="profilePhotoUpload" name="profilePhoto" accept="image/*">
                                </div>
                                
                                <div class="progress edit-mode" style="display: none;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 profile-field">
                                <div class="profile-label">Username</div>
                                <div class="profile-value"><?php echo $row["Username"]; ?></div>
                            </div>
                            
                            <div class="col-sm-12 profile-field">
                                <div class="profile-label">Full Name</div>
                                <div class="profile-value view-mode"><?php echo $row["FullName"]; ?></div>
                                <input type="text" class="form-control edit-mode" name="fullName" value="<?php echo $row["FullName"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-6 profile-field">
                                <div class="profile-label">Email</div>
                                <div class="profile-value view-mode"><?php echo $row["EMail"]; ?></div>
                                <input type="email" class="form-control edit-mode" name="email" value="<?php echo $row["EMail"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-6 profile-field">
                                <div class="profile-label">Phone</div>
                                <div class="profile-value view-mode"><?php echo $row["Phone"]; ?></div>
                                <input type="text" class="form-control edit-mode" name="phone" value="<?php echo $row["Phone"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-12 profile-field">
                                <div class="profile-label">Address Line 1</div>
                                <div class="profile-value view-mode"><?php echo $row["AddressLine1"]; ?></div>
                                <input type="text" class="form-control edit-mode" name="address1" value="<?php echo $row["AddressLine1"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-12 profile-field">
                                <div class="profile-label">Address Line 2</div>
                                <div class="profile-value view-mode"><?php echo $row["AddressLine2"]; ?></div>
                                <input type="text" class="form-control edit-mode" name="address2" value="<?php echo $row["AddressLine2"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-6 profile-field">
                                <div class="profile-label">City</div>
                                <div class="profile-value view-mode"><?php echo $row["City"]; ?></div>
                                <input type="text" class="form-control edit-mode" name="city" value="<?php echo $row["City"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-6 profile-field">
                                <div class="profile-label">State</div>
                                <div class="profile-value view-mode"><?php echo $row["State"]; ?></div>
                                <input type="text" class="form-control edit-mode" name="state" value="<?php echo $row["State"]; ?>" style="display: none;">
                            </div>
                            
                            <div class="col-sm-12 profile-field">
                                <div class="profile-label">Account Created</div>
                                <div class="profile-value"><?php echo $row["Date"]; ?></div>
                            </div>
                            
                            <div class="col-sm-12 text-right edit-mode" style="display: none; margin-top: 20px;">
                                <button type="button" id="cancelEditBtn" class="btn cancel-btn">
                                    <i class="fa fa-times"></i> Cancel
                                </button>
                                <button type="submit" class="btn save-btn">
                                    <i class="fa fa-save"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="social-links">
                        <a href="#" class="social-link facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social-link twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social-link instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="social-link linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-1"></div>
            
            <div class="col-sm-12 spacer">a</div>
            <div class="col-sm-12 spacer">a</div>
        </div>
    </div>
    
    <!-- Photo Cropper Modal -->
    <div class="modal fade" id="photoCropModal" tabindex="-1" role="dialog" aria-labelledby="photoCropModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoCropModalLabel">Crop Profile Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="imageToCrop" src="" alt="" style="max-width: 100%;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="cropPhotoBtn">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("common/footer.php"); ?>
    
    <script>
        $(document).ready(function() {
            // Initialize variables
            var cropper;
            var profilePhotoChanged = false;
            
            // Toggle edit mode
            $('#editProfileBtn').click(function() {
                $('.view-mode').hide();
                $('.edit-mode').show();
                $('.edit-mode').addClass('animate__animated animate__fadeIn');
                $('#editProfileBtn').hide();
            });
            
            // Cancel edit
            $('#cancelEditBtn').click(function() {
                $('.edit-mode').hide();
                $('.view-mode').show();
                $('.view-mode').addClass('animate__animated animate__fadeIn');
                $('#editProfileBtn').show();
                
                // Reset form if photo was changed but not saved
                if(profilePhotoChanged) {
                    $('#profilePhotoPreview').attr('src', '<?php echo $profilePhoto; ?>');
                    profilePhotoChanged = false;
                }
            });
            
            // Flash message animation
            $('.alert').delay(3000).fadeOut('slow');
            
            // Profile photo upload click
            $('.profile-photo-edit').click(function() {
                $('#profilePhotoUpload').click();
            });
            
            // Profile photo change handler
            $('#profilePhotoUpload').change(function(e) {
                if(this.files && this.files.length) {
                    var file = this.files[0];
                    
                    // Check if file is an image
                    if(file.type.match('image.*')) {
                        var reader = new FileReader();
                        
                        reader.onload = function(e) {
                            // Show the crop modal
                            $('#imageToCrop').attr('src', e.target.result);
                            $('#photoCropModal').modal('show');
                            
                            // Initialize cropper when modal is shown
                            $('#photoCropModal').on('shown.bs.modal', function() {
                                if(cropper) {
                                    cropper.destroy();
                                }
                                
                                var image = document.getElementById('imageToCrop');
                                cropper = new Cropper(image, {
                                    aspectRatio: 1,
                                    viewMode: 1,
                                    autoCropArea: 0.8,
                                    responsive: true,
                                    guides: false
                                });
                            });
                        }
                        
                        reader.readAsDataURL(file);
                    } else {
                        alert('Please select an image file (jpg, png, gif)');
                    }
                }
            });
            
            // Crop photo button
            $('#cropPhotoBtn').click(function() {
                if(cropper) {
                    // Get cropped canvas
                    var canvas = cropper.getCroppedCanvas({
                        width: 400,
                        height: 400,
                        minWidth: 256,
                        minHeight: 256,
                        maxWidth: 800,
                        maxHeight: 800,
                        fillColor: '#fff',
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high'
                    });
                    
                    if(canvas) {
                        // Convert canvas to blob
                        canvas.toBlob(function(blob) {
                            // Create a new FormData object
                            var formData = new FormData();
                            
                            // Append the blob to the FormData with a filename
                            var fileName = 'cropped_' + Date.now() + '.jpg';
                            formData.append('profilePhoto', blob, fileName);
                            
                            // Show progress bar
                            $('.progress').show();
                            
                            // Simulate upload progress (in a real app, you would use AJAX)
                            var progress = 0;
                            var progressInterval = setInterval(function() {
                                progress += 10;
                                $('.progress-bar').css('width', progress + '%');
                                
                                if(progress >= 100) {
                                    clearInterval(progressInterval);
                                    
                                    // Update the preview image
                                    var url = URL.createObjectURL(blob);
                                    $('#profilePhotoPreview').attr('src', url);
                                    profilePhotoChanged = true;
                                    
                                    // Hide the modal
                                    $('#photoCropModal').modal('hide');
                                    
                                    // Hide progress bar after a delay
                                    setTimeout(function() {
                                        $('.progress').hide();
                                        $('.progress-bar').css('width', '0%');
                                    }, 1000);
                                }
                            }, 100);
                        }, 'image/jpeg', 0.9);
                    }
                }
            });
            
            // Clean up cropper when modal is closed
            $('#photoCropModal').on('hidden.bs.modal', function() {
                if(cropper) {
                    cropper.destroy();
                }
            });
            
            // Form submission
            $('#profileForm').submit(function(e) {
                // You could add form validation here
                // For example, check if required fields are filled
                
                // Show loading state on submit button
                $('.save-btn').html('<i class="fa fa-spinner fa-spin"></i> Saving...');
            });
        });
    </script>
</body>
</html>