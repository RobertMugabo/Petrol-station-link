<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Sign Up</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="fname" class="form-control" required placeholder="Enter your first name" pattern="^[a-zA-Z]+$" title="Please enter only letters">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="lname" class="form-control" required placeholder="Enter your last name" pattern="^[a-zA-Z]+$" title="Please enter only letters">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="tel" id="phone_number" name="phone" class="form-control" required pattern="\+250[0-9]{9}" value="+250" title="Do not exceed 12 digits" placeholder="Enter your phone number">
                            </div>
                            <div class="form-group">
                                <label for="company">Company <small>(if applicable)</small></label>
                                <input type="text" id="company" name="company" class="form-control" placeholder="Enter company you work for">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" minlength="6" placeholder="Create a password">
                            </div>
                            <div class="form-group">
                                <label for="confirm">Confirm Password</label>
                                <input type="password" id="confirm" name="confirm" class="form-control" minlength="6" placeholder="Confirm password">
                            </div>
                            <div class="form-group text-center">
                                Already have an account? <a href="login.php">Log In</a><br>
                               <a href="../index.PHP">Back home</a>
                            </div>
                            <button type="submit" name="signup" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

try{   
    $connect=new PDO("mysql:host=localhost;dbname=petrol station link","root","");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['signup'])) {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['phone'];
        $company=$_POST['company'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];

        $check = $connect->prepare("SELECT * FROM `users` WHERE `phone number` = :phone");
        $check->execute([':phone' => $phone]);

        if ($check->rowCount() > 0) {
            echo "<script>alert('Phone number already registered')</script>";
        } 
        else{
            if ($password==$confirm) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $insert=$connect->prepare("INSERT INTO `users`(`first name`, `last name`, `phone number`, `company`, `password`) VALUES (:fname, :lname, :phone, :company, :password)");
                $insert->execute([
                    ':fname' => $fname,
                    ':lname' => $lname,
                    ':phone' => $phone,
                    ':company' => $company,
                    ':password' => $hashed_password
                ]);

                if ($insert) {
                    echo "<script>alert('$fname successfully registered')</script>";
                    echo "<script>window.location.href = 'login.php';</script>";
                } else {
                    echo "<script>alert('Unexpected error occurred')</script>";
                }
            }
            else {
                echo "<script>alert('Password mismatch')</script>";
            }
        }
    } 
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
