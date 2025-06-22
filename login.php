<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | VISIT OROMIA</title>
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
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }
        .login-container h1 {
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
        .btn-login {
            background-color: #28a745;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            width: 100%;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
            font-size: 1rem;
            color: #343a40;
        }
        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .signup-prompt {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #343a40;
        }
        .signup-prompt a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .signup-prompt a:hover {
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
        .login-feedback {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
        .login-feedback.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }
        .captcha-container {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .captcha-image {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 5px;
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            letter-spacing: 3px;
            user-select: none;
        }
        .refresh-captcha {
            margin-left: 10px;
            cursor: pointer;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        
        <!-- Error message display (for server-side errors) -->
        <div id="loginFeedback" class="login-feedback error" style="display: none;">
            Invalid username or password. Please try again.
        </div>
        
        <form id="loginForm" action="loginAction.php" method="POST" novalidate>
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username or Email:</label>
                <input type="text" class="form-control" name="username" id="username" 
                       placeholder="Enter username or email here" required
                       pattern="^[a-zA-Z0-9_@.]{4,50}$">
                <div class="error-message" id="usernameError">
                    Please enter a valid username or email (4-50 characters, letters, numbers, _, @, .)
                </div>
            </div>
            
            <!-- Password -->
            <div class="mb-3 password-container">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" 
                       placeholder="Enter password here" required
                       minlength="8" maxlength="50">
                <i class="toggle-password fas fa-eye" id="togglePassword"></i>
                <div class="error-message" id="passwordError">
                    Password must be at least 8 characters
                </div>
            </div>
            
            <!-- CAPTCHA -->
            <div class="mb-3">
                <label for="captcha" class="form-label">Security Check:</label>
                <div class="captcha-container">
                    <div class="captcha-image" id="captchaText">A7B9C3</div>
                    <i class="refresh-captcha fas fa-sync-alt" id="refreshCaptcha"></i>
                </div>
                <input type="text" class="form-control" name="captcha" id="captcha" 
                       placeholder="Enter the code above" required>
                <div class="error-message" id="captchaError">
                    Please enter the correct CAPTCHA code
                </div>
            </div>
            
            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            
            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-login" name="login" id="loginButton">
                    <span id="loginButtonText">Login</span>
                    <span id="loginSpinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                </button>
            </div>
            
            <div class="forgot-password">
                <a href="forgotPassword.php">Forgot Password?</a>
            </div>
        </form>
        
        <div class="signup-prompt">
            New user? <a href="signup.php">Sign Up</a> instead.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Validation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            const captchaInput = document.getElementById('captcha');
            const captchaText = document.getElementById('captchaText');
            const togglePassword = document.getElementById('togglePassword');
            const loginButton = document.getElementById('loginButton');
            const loginSpinner = document.getElementById('loginSpinner');
            const loginButtonText = document.getElementById('loginButtonText');
            
            // Generate random CAPTCHA
            function generateCaptcha() {
                const chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                let captcha = '';
                for (let i = 0; i < 6; i++) {
                    captcha += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                captchaText.textContent = captcha;
                return captcha;
            }
            
            let currentCaptcha = generateCaptcha();
            
            // Refresh CAPTCHA
            document.getElementById('refreshCaptcha').addEventListener('click', function() {
                currentCaptcha = generateCaptcha();
            });
            
            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
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
            
            // Validate username/email
            validateField(usernameInput, 'usernameError', (value) => {
                return /^[a-zA-Z0-9_@.]{4,50}$/.test(value);
            });
            
            // Validate password
            validateField(passwordInput, 'passwordError', (value) => {
                return value.length >= 8;
            });
            
            // Validate CAPTCHA
            validateField(captchaInput, 'captchaError', (value) => {
                return value.toUpperCase() === currentCaptcha;
            });
            
            // Form submission
            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                // Validate username
                if (!/^[a-zA-Z0-9_@.]{4,50}$/.test(usernameInput.value)) {
                    document.getElementById('usernameError').style.display = 'block';
                    isValid = false;
                }
                
                // Validate password
                if (passwordInput.value.length < 8) {
                    document.getElementById('passwordError').style.display = 'block';
                    isValid = false;
                }
                
                // Validate CAPTCHA
                if (captchaInput.value.toUpperCase() !== currentCaptcha) {
                    document.getElementById('captchaError').style.display = 'block';
                    isValid = false;
                }
                
                if (!isValid) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    // Show loading state
                    loginButton.disabled = true;
                    loginSpinner.style.display = 'inline-block';
                    loginButtonText.textContent = 'Authenticating...';
                    
                    // In a real application, this would be handled by the form submission
                    // This is just to demonstrate the loading state
                    setTimeout(() => {
                        loginButton.disabled = false;
                        loginSpinner.style.display = 'none';
                        loginButtonText.textContent = 'Login';
                    }, 2000);
                }
            });
            
            // Check for URL parameters that might indicate a failed login attempt
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                const errorMessage = document.getElementById('loginFeedback');
                errorMessage.style.display = 'block';
                
                // Clear the error after 5 seconds
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>
</html>