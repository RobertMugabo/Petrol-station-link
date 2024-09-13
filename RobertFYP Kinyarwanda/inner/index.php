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
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 500px;
        }
        
        .floating-text , .floating-text2 {
            font-family: Roboto;
            font-size: 24px;
            margin: 10px 0;
        }
        .card button{
            margin-left: 100px;
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
            <div class="floating-text-container">
                <p class="floating-text" style="font-size:30px;">Welcome to the solution to all problems related to Not-emptiness of your fuel tank</p><br><br>
                <div>
                    <button style="border-radius:20px;" onclick="window.location.href='signup.php';">Sign up</button>
                    <button style="border-radius:20px;" onclick="window.location.href='login.php';">Log In</button>
                </div>
                
                
            </div>
           
            
        </div>
        
        <img src="man1.png" alt="Petrol Station" style="opacity: 100%;">
    </div>    
    
</body>
    <div class="footer" >
        <p style="margin-left: 0px;">&copy; 2024 R&J. All rights reserved.</p>
    </div>
</html>
