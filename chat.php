<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Oromia - Live Chat Support</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 80px;
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }
        p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 40px;
            animation: fadeIn 2s ease-in-out;
        }
        .btn-chat {
            background-color: #28a745;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 25px;
            color: #fff;
            transition: all 0.3s ease;
            animation: fadeIn 2.5s ease-in-out;
        }
        .btn-chat:hover {
            background-color: #218838;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 0;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Visit Oromia</h1>
        <p>Explore the beauty and culture of Oromia. Need help? Chat with us!</p>
        <button class="btn btn-chat" onclick="Tawk_API.toggle()">
            <i class="fas fa-comments"></i> Chat Now
        </button>
    </div>

    <!-- Tawk.to Live Chat Widget -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/67d827cd025cb91908785dc5/1imi5n042';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 Visit Oromia. All rights reserved.
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>