<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrol Station Link</title>
    <link rel="stylesheet" href="styles.css">
    <style>
       
        #map {
            height: 700px; 
            width: 100%;
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
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="stations.php">Nearby Stations</a></li>
                    <li><a href="contactus.php">Contact</a></li>
                    <li><a href="pay.php" style="color:yellow;">Payment</a></li>
                </ul>
            </nav>
        </div>
        <div class="card">
            <h2>Choose mode of Payment</h2>
            <select name="payment-method" id="">
                <option value="MoMo">MTN Mobile money</option>
                <option value="AirtelMoney">AirtelMoney</option>
                <option value="bank">Bank</option>
            </select>
            
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 R&J. All rights reserved.</p>
    </div>
    

</body>
</html>

