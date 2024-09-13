<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Petrol Station Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Injira</h2>
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Numero ya telefoni</label>
                                <input type="tel" id="phone" name="phone" class="form-control" required placeholder="Injiza numero ya telefoni yawe">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Ijambobanga</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Injiza ijambobanga ryawe" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Injira</button>
                            <a href="../resets.php">Wibagiwe ijambobanga?</a>
                            <div class="d-flex justify-content-between align-items-center">
                                <p>Nta Konti ufite?<a href="signup.php">Iyandikishe</a></p> 
                                <a href="../index.PHP">Subira ahabanza</a>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Connect to the database
try {
    $connect = new PDO("mysql:host=localhost;dbname=petrol_station_link", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<script>alert('Database connection failed: " . $e->getMessage() . "');</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if the user exists
    $query = $connect->prepare("SELECT * FROM `users` WHERE `phone_number` = :phone");
    $query->execute([':phone' => $phone]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "<script>alert('Iyi nomero ya telefoni ntizwi');</script>";
    } else {
        // Debug information
        echo "<script>console.log('User found: " . json_encode($user) . "');</script>";

        // Verify the password using MD5
        if (isset($user['password']) && md5($password) == $user['password']) {
            // Password is correct, start the session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];

            echo "<script>window.location.href = 'index.php';</script>"; // Redirect to a welcome page or dashboard
        } else {
            echo "<script>alert('Ijambo banga si ryo');</script>";
        }
    }
}
?>
