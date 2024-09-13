<?php
session_start();
require './vendor/vendor/autoload.php'; // Adjust the path if necessary
include_once "connection.php"; // Adjust the path to your database connection script

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateToken($length = 32) {
    return bin2hex(random_bytes($length));
}

$message = '';

// Handling password reset submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    $token = $_POST['token'];
    $userid = $_POST['userid'];

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($new_password) || empty($confirm_password)) {
        $message = '<div class="alert alert-danger">All fields are required</div>';
    } elseif ($new_password !== $confirm_password) {
        $message = '<div class="alert alert-danger">Passwords do not match</div>';
    } else {
        // Verify token and expiry
        $query = "SELECT * FROM reset_tokens WHERE userid=? AND token=? AND expiry > NOW()";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $userid, $token);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Hash the new password using md5 and truncate the last 2 characters
            $hashed_password = substr(md5($new_password), 0, -2);

            // Update the password in the users table
            $update_query = "UPDATE users SET password=? WHERE userid=?";
            $update_stmt = mysqli_prepare($con, $update_query);
            mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $userid);
            mysqli_stmt_execute($update_stmt);

            // Delete the used reset token
            mysqli_query($con, "DELETE FROM reset_tokens WHERE userid='$userid' AND token='$token'");

            $message = '<div class="alert alert-success">Password reset successfully</div>';
        } else {
            $message = '<div class="alert alert-danger">Invalid or expired token</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .reset-form {
            background-color: #343a40;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: white;
        }
        .reset-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffc107;
        }
        .reset-form .form-control {
            background-color: #495057;
            border: none;
            color: white;
            text-align: center;
        }
        .reset-form .form-control::placeholder {
            color: #adb5bd;
        }
        .reset-form .btn {
            width: 100%;
       
            border: none;
            color: #343a40;
            transition: background-color 0.3s;
        }
        
        .alert {
            margin-top: 15px;
        }
        .back-to-login {
            display: block;
            text-align: center;
            margin-top: 10px;
           
        }
        .back-to-login:hover {
            text-decoration: none;
            color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="reset-form">
                    <h2 class="text-primary">Reset Password</h2>
                    <?php if (!empty($message)) echo $message; ?>
                    <form action="" method="POST">
                        <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>">
                        <input type="hidden" name="userid" value="<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>">
                        <div class="form-group">
                            <input type="password" name="new_password" placeholder="Enter New Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" placeholder="Confirm New Password" class="form-control">
                        </div>
                        <button type="submit" name="reset_password" class="btn bg-primary">RESET PASSWORD</button>
                        <a href="index.php" class="back-to-login text-primary">Back to Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
