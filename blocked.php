<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blocked | VISIT OROMIA</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400|Roboto:400,500" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #2980b9, #8e44ad); /* Gradient background */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevents scrollbars on smaller screens */
        }

        .blocked-container {
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
            padding: 40px;
            border-radius: 12px;
            backdrop-filter: blur(10px); /* Add a blur effect */
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }

        .heading {
            font-family: 'Oswald', sans-serif;
            font-size: 3em;
            margin-bottom: 20px;
        }

        .text {
            font-size: 1.4em;
            margin-bottom: 30px;
        }

        .button {
            background-color: #fff; /* White button */
            color:rgb(185, 41, 51); /* Blue text */
            padding: 14px 28px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent on hover */
            transform: translateY(-2px); /* Slight lift on hover */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="blocked-container">
        <div class="heading">Blocked</div>
        <div class="text">
            You need to be logged in to access this page.<br />
            Please login with a valid account to continue.
        </div>
        <a href="login.php">
            <button class="button">Login</button>
        </a>
    </div>
</body>
</html>