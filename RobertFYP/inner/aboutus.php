<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrol Station Link</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            position: relative;
            text-align: center;
            color: white;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .floating-text-container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 5px;
        }
        .floating-text , .floating-text2 {
            font-family: Roboto;
            font-size: 24px;
            margin: 10px 0;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <h1 style="font-family: Elephant; width: 100%; display: inline-block;">PETROL STATION LINK</h1>
        <h3 style="font-family: Roboto; font-weight: 200;">All Petrol station services in one place</h3>
    </div>
    <div class="container">
        <div class="card">
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php" style="color:yellow;">About</a></li>
                    <li><a href="stations.php">Nearby Stations</a></li>
                    <li><a href="contactus.php">Contact</a></li>
                    <li><a href="pay.php">Payment</a></li>
                    <br><br>
                </ul>
            </nav>
        </div>
        <div class="card">
            <div class="floating-text-container">
                <p class="floating-text">Dedicated to digitally solve All petrol station-related issues</p>
                <p class="floating-text" style="color:teal;">•Easily pay for your vehicle gas</p>
                <p class="floating-text" style="color:teal;">•Know the nearest gas station</p>
                <p class="floating-text" style="color:teal;">•And many more...</p><br><br>

                <p class="floating-text">Committed to ease all journey difficulties</p>
                <p class="floating-text2" style="color:teal;">•No mid journey empty fuel</p>
                <p class="floating-text2" style="color:teal;">•No journey Delay</p>
            </div>
            <img src="man1.png" alt="Petrol Station" style="opacity: 100%;">
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 R&J. All rights reserved.</p>
    </div>
</body>
</html>
