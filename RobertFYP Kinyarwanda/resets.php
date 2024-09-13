<?php
session_start();
require 'vendor/autoload.php'; // Adjust the path if necessary
include_once "connection.php"; // Adjust the path to your database connection script

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateToken($length = 32) {
    return bin2hex(random_bytes($length));
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['send'])) {
        $email = $_POST['email'];

        if (empty($email)) {
            $message = '<div class="alert alert-danger">Email is required</div>';
        } else {
            // Validate email existence
            $query = "SELECT * FROM users WHERE email=?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $fetch = mysqli_fetch_assoc($result);
                $userid = $fetch['userid'];
                
                // Generate reset token and expiry time
                $token = generateToken();
                $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

                // Insert token into reset_tokens table
                $insert_query = "INSERT INTO reset_tokens (userid, token, expiry) VALUES (?, ?, ?)";
                $insert_stmt = mysqli_prepare($con, $insert_query);
                mysqli_stmt_bind_param($insert_stmt, "sss", $userid, $token, $expiry);
                mysqli_stmt_execute($insert_stmt);

                // Construct reset password link
                $reset_link = "http://localhost/tradep/reset_password.php?token=$token&userid=$userid";
                
                // Send email using PHPMailer
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ptechltdcompany@gmail.com'; // Your Gmail address
                    $mail->Password = 'hmkc ihdq awuu axiw'; // App password generated for Mail
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587; // TCP port to connect to; use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    // Uncomment for debugging
                    // $mail->SMTPDebug = 2;

                    //Recipients
                    $mail->setFrom('ptechltdcompany@gmail.com', 'PTechLtd'); // Your Gmail address and your name
                    $mail->addAddress($email);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Link';
                    $mail->Body = "Click the link below to reset your password:<br><br><a href='$reset_link'>$reset_link</a>";
                    $mail->AltBody = "Click the link below to reset your password:\n\n$reset_link";

                    $mail->send();
                    $message = '<div class="alert alert-success">Password reset link sent to your email</div>';
                } catch (Exception $e) {
                    $message = '<div class="alert alert-danger">Failed to send password reset link</div>';
                    error_log("PHPMailer Error: " . $mail->ErrorInfo);
                }
            } else {
                $message = '<div class="alert alert-danger">Unknown Email</div>';
            }
        }
    } elseif (isset($_POST['reset_password'])) {
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
                // Hash the new password securely using bcrypt
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                mysqli_query($con, "UPDATE users SET password='$hashed_password' WHERE userid='$userid'");
                mysqli_query($con, "DELETE FROM reset_tokens WHERE userid='$userid' AND token='$token'");
                $message = '<div class="alert alert-success">Password reset successfully</div>';
            } else {
                $message = '<div class="alert alert-danger">Invalid or expired token</div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Maisha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            background-color: #343a40;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form, .forgot-form, .reset-form {
            background-color: #212529;
            border-radius: 10px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            color: #f8f9fa;
            text-align: center;
        }
        .login-form h2, .forgot-form h2, .reset-form h2 {
            margin-bottom: 20px;
            color: #17a2b8;
            font-weight: 700;
        }
        .login-form .input-group-text, .forgot-form .form-control, .reset-form .form-control {
            background-color: #495057;
            border: 1px solid #6c757d;
            color: #f8f9fa;
        }
        .login-form .form-control::placeholder, .forgot-form .form-control::placeholder, .reset-form .form-control::placeholder {
            color: #adb5bd;
        }
        .login-form .btn, .forgot-form .btn, .reset-form .btn {
            width: 100%;
            background-color: #17a2b8;
            border: none;
            color: #f8f9fa;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .login-form .btn:hover, .forgot-form .btn:hover, .reset-form .btn:hover {
            background-color: #138496;
        }
        .login-form .form-check-label, .forgot-form .form-check-label, .reset-form .form-check-label {
            color: #f8f9fa;
        }
        .alert {
            margin-top: 15px;
        }
        .forgot-password, .back-to-login {
            margin-top: 15px;
        }
        .forgot-password a, .back-to-login {
            color: #17a2b8;
        }
        .forgot-password a:hover, .back-to-login:hover {
            text-decoration: underline;
        }
        .password-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #17a2b8;
        }
        .footer-text {
            margin-top: 20px;
            color: #adb5bd;
            font-size: 0.9em;
            text-align: center;
        }
        .company-logo {
            max-width: 40%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php if (!isset($_GET['token']) || !isset($_GET['userid'])): ?>
        <div class="login-form">
            <img src="maisha.jpg" alt="Maisha Logo" class="company-logo">
            <h2>Log Into Maisha</h2>
            <?php
            if (isset($_POST['send']) && !isset($_POST['reset_password'])) {
                echo $message;
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <button type="submit" name="send" class="btn">Send Reset Link</button>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
    <?php elseif (isset($_GET['token']) && isset($_GET['userid'])): ?>
        <div class="reset-form">
            <h2>Reset Password</h2>
            <?php
            if (isset($_POST['reset_password'])) {
                echo $message;
            }
            ?>
            <form method="post">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                <input type="hidden" name="userid" value="<?php echo htmlspecialchars($_GET['userid']); ?>">
                <div class="form-group">
                    <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button type="submit" name="reset_password" class="btn">Reset Password</button>
            </form>
        </div>
    <?php endif; ?>
</body>
</html>
