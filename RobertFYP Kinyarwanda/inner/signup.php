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
                        <h4 class="card-title text-center">Iyandikishe</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="first_name">Izina ribanza</label>
                                <input type="text" id="first_name" name="fname" class="form-control" required placeholder="Injiza izina ribanza" pattern="^[a-zA-Z]+$" title="Injiza inyuguti gusa">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Irindi zina</label>
                                <input type="text" id="last_name" name="lname" class="form-control" required placeholder="Injiza irindi zina ryawe" pattern="^[a-zA-Z]+$" title="Injiza inyuguti gusa">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Numero ya telefoni</label>
                                <input type="tel" id="phone_number" name="phone" class="form-control" required pattern="\+250[0-9]{9}" title="Injiza imibare itarenga 12" value="+250" placeholder="Injiza numero ya telefoni yawe">
                            </div>
                            <div class="form-group">
                                <label for="company">Kompanyi<small>(niba ihari)</small></label>
                                <input type="text" id="company" name="company" class="form-control" placeholder="Injiza ikompanyi ukorera">
                            </div>
                            <div class="form-group">
                                <label for="password">Ijambobanga</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Hanga ijambobanga" minlength="6" title="Hanga ijambo banga rikomeye">
                            </div>
                            <div class="form-group">
                                <label for="confirm">Emeza ijambobanga</label>
                                <input type="password" id="confirm" name="confirm" class="form-control" placeholder="Ongera wandike ijambobanga ryawe">
                            </div>
                             <button type="submit" name="signup" class="btn btn-primary btn-block">Iyandikishe</button>
                            <div class="form-group text-center">
                                Usanzwe ufite konti? <a href="login.php">Injira</a><br>
                               <a href="../index.PHP">Subira ahabanza</a>
                            </div>
                           
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
    try {   
        $connect = new PDO("mysql:host=localhost;dbname=petrol station link", "root", "");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if (isset($_POST['signup'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $company = $_POST['company'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
    
            $check = $connect->prepare("SELECT * FROM `users` WHERE `phone number` = :phone");
            $check->execute([':phone' => $phone]);
    
            if ($check->rowCount() > 0) {
                echo "<script>alert('iyi nomero isanzwemo. Gerageza indi')</script>";
            } else {
                if ($password == $confirm) {
                    // Replace this with MD5 hashing
                    $hashed_password = md5($password);
    
                    $insert = $connect->prepare("INSERT INTO `users`(`first name`, `last name`, `phone number`, `company`, `password`) VALUES (:fname, :lname, :phone, :company, :password)");
                    $insert->execute([
                        ':fname' => $fname,
                        ':lname' => $lname,
                        ':phone' => $phone,
                        ':company' => $company,
                        ':password' => $hashed_password
                    ]);
    
                    if ($insert) {
                        echo "<script>alert('$fname yanditswe neza')</script>";
                        echo "<script>window.location.href = 'login.php';</script>";
                    } else {
                        echo "<script>alert('Habayemo ikibazo kitari kitezwe')</script>";
                    }
                } else {
                    echo "<script>alert('Amagambobanga ntahura')</script>";
                }
            }
        } 
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
?>
