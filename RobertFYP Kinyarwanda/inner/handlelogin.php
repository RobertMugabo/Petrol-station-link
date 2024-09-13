<?php
try {
    // Connect to the database
    $connect = new PDO("mysql:host=localhost;dbname=petrol station link", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // Check if the user exists
        $query = $connect->prepare("SELECT * FROM `users` WHERE `phone number` = :phone");
        $query->execute([':phone' => $phone]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start the session
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first name'];
                
                echo "<script>alert('Login successful');</script>";
                echo "<script>window.location.href = 'index.php';</script>"; // Redirect to a welcome page or dashboard
            } else {
                echo "<script>alert('Invalid password');</script>";
            }
        } else {
            echo "<script>alert('No user found with this phone number');</script>";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
