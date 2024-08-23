<?php
ob_start();
session_start();
require('DBconnection.php'); // Ensure this file contains the correct database connection details

// Function to sanitize user input
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    // Check credentials in the admin table
    $admin_query = "SELECT * FROM admin WHERE email = ?";
    if ($admin_stmt = $conn->prepare($admin_query)) {
        $admin_stmt->bind_param("s", $email);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        if ($admin_result->num_rows > 0) {
            $admin_row = $admin_result->fetch_assoc();

            if ($password === $admin_row['password']) { // Plain text password check for admin
                $_SESSION['admin_id'] = $admin_row['id'];
                $_SESSION['admin_email'] = $admin_row['email'];
                header("Location: admin_dashboard.php");
                exit();
            } else {
                echo "Incorrect admin password. <a href='login.php'>Back to Login</a>";
            }
        } else {
            echo "Admin not found. <a href='login.php'>Back to Login</a>";
        }
        $admin_stmt->close();
    } else {
        error_log("Error preparing admin statement: " . $conn->error);
    }

    // Check credentials in the users table
    $user_query = "SELECT * FROM users WHERE email = ?";
    if ($user_stmt = $conn->prepare($user_query)) {
        $user_stmt->bind_param("s", $email);
        $user_stmt->execute();
        $user_result = $user_stmt->get_result();

        if ($user_result->num_rows > 0) {
            $user_row = $user_result->fetch_assoc();

            if (password_verify($password, $user_row['password'])) {
                // Record the login time in the user_logins table
                $login_time = date('Y-m-d H:i:s');
                $login_query = "INSERT INTO user_logins (user_id, login_time) VALUES (?, ?)";
                if ($login_stmt = $conn->prepare($login_query)) {
                    $login_stmt->bind_param("is", $user_row['id'], $login_time);
                    $login_stmt->execute();
                    $login_stmt->close();
                }

                $_SESSION['user_id'] = $user_row['id'];
                $_SESSION['username'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
                $_SESSION['email'] = $user_row['email'];
                header("Location: user_dashboard.php");
                exit();
            } else {
                echo "Incorrect user password. <a href='login.php'>Back to Login</a>";
            }
        } else {
            echo "User not found. <a href='login.php'>Back to Login</a>";
        }

        $user_stmt->close();
    } else {
        error_log("Error preparing user statement: " . $conn->error);
    }
}

$conn->close();
ob_end_flush(); // Flush output buffer and send output to the browser
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ARYAcare</title>
    <link rel="stylesheet" href="css/login.css"> <!-- Link to your login.css -->
</head>
<body>

    <header>
        <h1>ARYAcare - Login</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>

    <!-- login section starts -->
    <section class="login" id="login">
        <h1 class="heading"> <span>login</span> to your account </h1>

        <div class="login-form">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>

                <div class="form-group">
                    <a href="register.php">Register</a>
                </div>
            </form>
        </div>
    </section>
    <!-- login section ends -->

    <script src="js/script.js"></script>


</body>
</html>
