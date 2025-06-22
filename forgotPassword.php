<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | VISIT OROMIA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Poppins', sans-serif;
            color: #333;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .forgot-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }
        .forgot-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }
        .forgot-container p {
            text-align: center;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 500;
            color: #343a40;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.5);
        }
        .btn-reset {
            background-color: #28a745;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            width: 100%;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-reset:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .back-to-login {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #343a40;
        }
        .back-to-login a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .back-to-login a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .error-message {
            font-size: 0.85rem;
            color: #dc3545;
            margin-bottom: 10px;
            display: none;
        }
        .success-message {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error-message-container {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <h1>Forgot Password</h1>
        <p>Enter your email address and we'll send you a link to reset your password.</p>
        
        <!-- Success message display -->
        <div id="successMessage" class="success-message" style="display: none;">
            Password reset link has been sent to your email address.
        </div>
        
        <!-- Error message display -->
        <div id="errorMessage" class="error-message-container" style="display: none;">
            We couldn't find an account with that email address.
        </div>
        
        <form id="forgotForm" action="resetPassword.php" method="POST" novalidate>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" 
                       placeholder="Enter your registered email address" required
                       pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                <div class="error-message" id="emailError">
                    Please enter a valid email address
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-reset" name="reset" id="resetButton">
                    <span id="resetButtonText">Reset Password</span>
                    <span id="resetSpinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                </button>
            </div>
        </form>
        
        <div class="back-to-login">
            Remember your password? <a href="login.php">Login</a> instead.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Validation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('forgotForm');
            const emailInput = document.getElementById('email');
            const resetButton = document.getElementById('resetButton');
            const resetSpinner = document.getElementById('resetSpinner');
            const resetButtonText = document.getElementById('resetButtonText');
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
            
            // Form validation
            const validateField = (field, errorId, validationFn) => {
                const errorElement = document.getElementById(errorId);
                
                field.addEventListener('input', function() {
                    if (validationFn(this.value)) {
                        errorElement.style.display = 'none';
                    } else {
                        errorElement.style.display = 'block';
                    }
                });
            };
            
            // Validate email
            validateField(emailInput, 'emailError', (value) => {
                return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
            });
            
            // Form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                let isValid = true;
                
                // Validate email
                if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailInput.value)) {
                    document.getElementById('emailError').style.display = 'block';
                    isValid = false;
                }
                
                if (!isValid) {
                    event.stopPropagation();
                } else {
                    // Show loading state
                    resetButton.disabled = true;
                    resetSpinner.style.display = 'inline-block';
                    resetButtonText.textContent = 'Sending...';
                    
                    // Simulate API call to server
                    setTimeout(() => {
                        // In a real application, this would be handled by the form submission
                        // Here we're just simulating a successful response
                        const isSuccess = Math.random() > 0.2; // 80% chance of success for demo
                        
                        if (isSuccess) {
                            // Show success message
                            successMessage.style.display = 'block';
                            errorMessage.style.display = 'none';
                            form.style.display = 'none';
                        } else {
                            // Show error message
                            errorMessage.style.display = 'block';
                            successMessage.style.display = 'none';
                        }
                        
                        // Reset button state
                        resetButton.disabled = false;
                        resetSpinner.style.display = 'none';
                        resetButtonText.textContent = 'Reset Password';
                    }, 2000);
                }
            });
            
            // Check for URL parameters that might indicate status
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                successMessage.style.display = 'block';
                form.style.display = 'none';
            } else if (urlParams.has('error')) {
                errorMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>