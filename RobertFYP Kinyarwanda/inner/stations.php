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
                    <li><a href="stations.php" style="color:yellow;">Nearby Stations</a></li>
                    <li><a href="contactus.php">Contact</a></li>
                    <li><a href="pay.php">Payment</a></li>
                </ul>
            </nav>
        </div>
        <div class="card">
        <h2 style="size:40px;">Check the place for petrol stations and fill your tank before it's too late</h2>
            <h2>Currently, You are here👇🏾</h2>
            
            <div id="map">            
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5327136879255!2d30.088148374804767!3d-1.9394676980429286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca6eb4b136305%3A0xfa7ecaf4c40f3383!2skLab!5e0!3m2!1sen!2srw!4v1721304717970!5m2!1sen!2srw" width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 R&J. All rights reserved.</p>
    </div>
    

</body>
</html>
