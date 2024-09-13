<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrol Station Link</title>
    <link rel="stylesheet" href="styles.css">
    <style>
         .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
        }
        .contact-form label {
            font-family: Roboto;
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-family: Roboto;
            font-size: 16px;
        }
        .contact-form button {
            font-family: Roboto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #45a049;
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
            <li><a href="contactus.php" style="color:yellow;">Contact</a></li>
            <li><a href="pay.php">Payment</a></li>
            <br><br>
        </ul>
    </nav>
        </div>
        <div class="card">
            <h2>Get in touch with us for any support, compliment or question</h2>
            <p>We're here to help you.</p>
            <ul>
                <li>📞 +250 789 438 711</li>
                <li>✉️ robertscresswell@gmail.com</li>
                <li>📌 Kigali, Rwanda</li>
            </ul>
            <p>If you have any questions or need further assistance, please fill out the form below and we will get back to you as soon as possible.</p>
            <form class="contact-form" action="feedback.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="6" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="footer">
    <p>&copy; 2024 R&J. All rights reserved.</p>
    </div>
</body>
</html>
