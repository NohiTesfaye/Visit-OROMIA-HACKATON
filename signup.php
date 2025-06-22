<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | VISIT OROMIA</title>
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
        .signup-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            animation: fadeIn 1s ease-in-out;
        }
        .signup-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
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
        .btn-signup {
            background-color: #28a745;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            width: 100%;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-signup:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .login-prompt {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #343a40;
        }
        .login-prompt a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .login-prompt a:hover {
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
        .valid-feedback {
            font-size: 0.85rem;
            color: #28a745;
            margin-bottom: 10px;
            display: none;
        }
        .password-strength {
            height: 5px;
            background: #e9ecef;
            margin-bottom: 15px;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }
        .password-hint {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form id="signupForm" action="signupAction.php" method="POST" novalidate>
            <!-- Full Name -->
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your full name here" id="fullname" required
                       pattern="^[a-zA-Z\s]{2,50}$" title="Name should only contain letters and spaces (2-50 characters)">
                <div class="error-message" id="fullnameError">Please enter a valid full name (2-50 letters and spaces only)</div>
            </div>
            
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email here" id="email" required
                       pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                <div class="error-message" id="emailError">Please enter a valid email address</div>
                <div class="valid-feedback" id="emailValid">Email looks good!</div>
            </div>
            
            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter your phone no. here" id="phone" required
                       pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" title="Valid phone number format">
                <div class="error-message" id="phoneError">Please enter a valid phone number</div>
            </div>
            
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter a username here" id="username" required
                       pattern="^[a-zA-Z0-9_]{4,20}$" title="Username must be 4-20 characters (letters, numbers, underscores)">
                <div class="error-message" id="usernameError">Username must be 4-20 characters (letters, numbers, underscores only)</div>
                <div class="error-message" id="usernameExists" style="display: none;">This username already exists. Please choose a different one.</div>
            </div>
            
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter a password here" id="password" required
                       minlength="8" maxlength="50">
                <div class="password-strength">
                    <div class="password-strength-bar" id="passwordStrengthBar"></div>
                </div>
                <div class="password-hint">
                    Password must be at least 8 characters and contain:
                    <ul>
                        <li id="lengthReq">At least 8 characters</li>
                        <li id="upperReq">At least one uppercase letter</li>
                        <li id="lowerReq">At least one lowercase letter</li>
                        <li id="numberReq">At least one number</li>
                        <li id="specialReq">At least one special character</li>
                    </ul>
                </div>
                <div class="error-message" id="passwordError">Please enter a strong password that meets all requirements</div>
            </div>
            
            <!-- Repeat Password -->
            <div class="mb-3">
                <label for="repeatPassword" class="form-label">Repeat Password:</label>
                <input type="password" class="form-control" name="repeatPassword" placeholder="Enter the same password again" id="repeatPassword" required>
                <div class="error-message" id="repeatPasswordError">Passwords do not match</div>
            </div>
            
            <!-- Address Line 1 -->
            <div class="mb-3">
                <label for="addressLine1" class="form-label">Address Line 1:</label>
                <input type="text" class="form-control" name="addressLine1" placeholder="Enter your House No./ Flat No. or Apartment No." id="addressLine1" required
                       maxlength="100">
                <div class="error-message" id="addressLine1Error">Please enter a valid address</div>
            </div>
            
            <!-- Address Line 2 -->
            <div class="mb-3">
                <label for="addressLine2" class="form-label">Address Line 2:</label>
                <input type="text" class="form-control" name="addressLine2" placeholder="Enter the name of your Lane, Locality" id="addressLine2" required
                       maxlength="100">
                <div class="error-message" id="addressLine2Error">Please enter a valid address</div>
            </div>
            
            <!-- City -->
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" name="city" placeholder="Enter the name of your city here" id="city" required
                       pattern="^[a-zA-Z\s\-']{2,50}$" title="City name should only contain letters, spaces, hyphens, and apostrophes">
                <div class="error-message" id="cityError">Please enter a valid city name</div>
            </div>
            
            <!-- State -->
            <div class="mb-3">
                <label for="state" class="form-label">State:</label>
                <input type="text" class="form-control" name="state" placeholder="Enter the name of your state here" id="state" required
                       pattern="^[a-zA-Z\s\-']{2,50}$" title="State name should only contain letters, spaces, hyphens, and apostrophes">
                <div class="error-message" id="stateError">Please enter a valid state name</div>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-signup" name="signup" id="signupButton">Sign Up</button>
            </div>
        </form>
        <div class="login-prompt">
            Already have an account? <a href="login.php">Login</a> instead.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Validation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('signupForm');
            const passwordInput = document.getElementById('password');
            const repeatPasswordInput = document.getElementById('repeatPassword');
            const passwordStrengthBar = document.getElementById('passwordStrengthBar');
            const passwordError = document.getElementById('passwordError');
            
            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check password length
                if (password.length >= 8) {
                    document.getElementById('lengthReq').style.color = '#28a745';
                    strength += 1;
                } else {
                    document.getElementById('lengthReq').style.color = '#6c757d';
                }
                
                // Check for uppercase letters
                if (/[A-Z]/.test(password)) {
                    document.getElementById('upperReq').style.color = '#28a745';
                    strength += 1;
                } else {
                    document.getElementById('upperReq').style.color = '#6c757d';
                }
                
                // Check for lowercase letters
                if (/[a-z]/.test(password)) {
                    document.getElementById('lowerReq').style.color = '#28a745';
                    strength += 1;
                } else {
                    document.getElementById('lowerReq').style.color = '#6c757d';
                }
                
                // Check for numbers
                if (/[0-9]/.test(password)) {
                    document.getElementById('numberReq').style.color = '#28a745';
                    strength += 1;
                } else {
                    document.getElementById('numberReq').style.color = '#6c757d';
                }
                
                // Check for special characters
                if (/[^A-Za-z0-9]/.test(password)) {
                    document.getElementById('specialReq').style.color = '#28a745';
                    strength += 1;
                } else {
                    document.getElementById('specialReq').style.color = '#6c757d';
                }
                
                // Update strength bar
                const strengthPercent = (strength / 5) * 100;
                passwordStrengthBar.style.width = strengthPercent + '%';
                
                // Change color based on strength
                if (strength <= 2) {
                    passwordStrengthBar.style.backgroundColor = '#dc3545'; // Red
                } else if (strength <= 4) {
                    passwordStrengthBar.style.backgroundColor = '#fd7e14'; // Orange
                } else {
                    passwordStrengthBar.style.backgroundColor = '#28a745'; // Green
                }
            });
            
            // Password match validation
            repeatPasswordInput.addEventListener('input', function() {
                const repeatPasswordError = document.getElementById('repeatPasswordError');
                if (passwordInput.value !== this.value) {
                    repeatPasswordError.style.display = 'block';
                } else {
                    repeatPasswordError.style.display = 'none';
                }
            });
            
            // Email validation with basic format check
            document.getElementById('email').addEventListener('input', function() {
                const emailError = document.getElementById('emailError');
                const emailValid = document.getElementById('emailValid');
                
                if (this.validity.valid) {
                    emailError.style.display = 'none';
                    emailValid.style.display = 'block';
                } else {
                    emailValid.style.display = 'none';
                    emailError.style.display = 'block';
                }
            });
            
            // Form submission validation
            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                // Validate all required fields
                const requiredInputs = form.querySelectorAll('[required]');
                requiredInputs.forEach(input => {
                    const errorElement = document.getElementById(input.id + 'Error');
                    
                    if (!input.checkValidity()) {
                        errorElement.style.display = 'block';
                        isValid = false;
                    } else {
                        errorElement.style.display = 'none';
                    }
                });
                
                // Additional password validation
                const password = passwordInput.value;
                if (password.length < 8 || 
                    !/[A-Z]/.test(password) || 
                    !/[a-z]/.test(password) || 
                    !/[0-9]/.test(password) || 
                    !/[^A-Za-z0-9]/.test(password)) {
                    passwordError.style.display = 'block';
                    isValid = false;
                } else {
                    passwordError.style.display = 'none';
                }
                
                // Check if passwords match
                if (passwordInput.value !== repeatPasswordInput.value) {
                    document.getElementById('repeatPasswordError').style.display = 'block';
                    isValid = false;
                }
                
                if (!isValid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                // Here you could add AJAX username availability check before final submission
            });
            
            // Real-time validation for other fields
            const validateField = (fieldId, errorId) => {
                const field = document.getElementById(fieldId);
                const error = document.getElementById(errorId);
                
                field.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        error.style.display = 'none';
                    } else {
                        error.style.display = 'block';
                    }
                });
            };
            
            // Set up validation for all fields
            validateField('fullname', 'fullnameError');
            validateField('phone', 'phoneError');
            validateField('username', 'usernameError');
            validateField('addressLine1', 'addressLine1Error');
            validateField('addressLine2', 'addressLine2Error');
            validateField('city', 'cityError');
            validateField('state', 'stateError');
            
            // Here you would typically add an AJAX call to check username availability
            // This is just a placeholder for that functionality
            document.getElementById('username').addEventListener('blur', function() {
                // In a real implementation, you would make an AJAX call to your server
                // to check if the username exists. This is just a simulation.
                const usernameExists = document.getElementById('usernameExists');
                // Simulate checking common usernames
                const commonUsernames = ['admin', 'user', 'test', 'guest', 'root'];
                if (commonUsernames.includes(this.value.toLowerCase())) {
                    usernameExists.style.display = 'block';
                    document.getElementById('usernameError').style.display = 'none';
                } else {
                    usernameExists.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>