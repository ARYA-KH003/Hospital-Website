<?php
session_start();
require('DBconnection.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

// Handle Delete User Request
if (isset($_GET['delete_user_id'])) {
    $user_id = $_GET['delete_user_id'];
    $query = "DELETE FROM users WHERE id = $user_id";
    mysqli_query($conn, $query);

    // Optionally, delete related appointments
    $appointment_query = "DELETE FROM appointments WHERE email = (SELECT email FROM users WHERE id = $user_id)";
    mysqli_query($conn, $appointment_query);

    header('Location: admin_dashboard.php#users');
    exit();
}

// Handle Delete Appointment Request
if (isset($_GET['delete_appointment_id'])) {
    $appointment_id = $_GET['delete_appointment_id'];
    $query = "DELETE FROM appointments WHERE id = $appointment_id";
    mysqli_query($conn, $query);

    header('Location: admin_dashboard.php#appointments');
    exit();
}

// Handle Edit User Request
if (isset($_GET['edit_user_id'])) {
    $user_id = $_GET['edit_user_id'];
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $update_query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', phone='$phone', address='$address' WHERE id = $user_id";
        if (mysqli_query($conn, $update_query)) {
            header('Location: admin_dashboard.php#users');
            exit();
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }
}

// Handle Edit Appointment Request
if (isset($_GET['edit_appointment_id'])) {
    $appointment_id = $_GET['edit_appointment_id'];
    $query = "SELECT * FROM appointments WHERE id = $appointment_id";
    $result = mysqli_query($conn, $query);
    $appointment = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];

        $update_query = "UPDATE appointments SET name='$name', phone='$phone', appointment_date='$appointment_date', appointment_time='$appointment_time' WHERE id = $appointment_id";
        if (mysqli_query($conn, $update_query)) {
            header('Location: admin_dashboard.php#appointments');
            exit();
        } else {
            echo "Error updating appointment: " . mysqli_error($conn);
        }
    }
}

// Query to fetch users
$user_query = "SELECT * FROM users";
$user_result = mysqli_query($conn, $user_query);

// Query to fetch appointments by joining on email
$appointment_query = "
    SELECT appointments.*, CONCAT(users.firstname, ' ', users.middlename, ' ', users.lastname) AS user_name 
    FROM appointments 
    LEFT JOIN users ON appointments.email = users.email";
$appointment_result = mysqli_query($conn, $appointment_query);

// Query to fetch login history
$login_query = "
    SELECT user_logins.*, CONCAT(users.firstname, ' ', users.middlename, ' ', users.lastname) AS user_name 
    FROM user_logins 
    LEFT JOIN users ON user_logins.user_id = users.id
    ORDER BY login_time DESC";
$login_result = mysqli_query($conn, $login_query);

// Query to fetch messages from contact forms
$message_query = "SELECT * FROM contact_forms ORDER BY id DESC";
$message_result = mysqli_query($conn, $message_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hospital Management System</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>
<body>

<header>
    <h1>ARYAcare - Admin</h1>
    <nav class="navbar">
        <a href="#users">Users</a>
        <a href="#appointments">Appointments</a>
        <a href="#logins">Login History</a>
        <a href="#messages">Messages</a>
        <a href="logout.php" class="logout-icon">Logout</a>
    </nav>
</header>

<!-- Admin Dashboard section starts -->
<section class="admin-dashboard" id="users">
    <h2>Users</h2>
    <div class="box-container">
        <?php while ($row = mysqli_fetch_assoc($user_result)): ?>
        <div class="box user-box">
            <h3><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></h3>
            <p>Email: <?php echo $row['email']; ?></p>
            <p>Phone: <?php echo $row['phone']; ?></p>
            <p>Address: <?php echo $row['address']; ?></p>
            <a href="admin_dashboard.php?edit_user_id=<?php echo $row['id']; ?>#edit-section" class="btn">Edit</a>
            <a href="admin_dashboard.php?delete_user_id=<?php echo $row['id']; ?>" class="btn delete-btn">Delete</a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="admin-dashboard" id="appointments">
    <h2>Appointments</h2>
    <div class="box-container">
        <?php while ($row = mysqli_fetch_assoc($appointment_result)): ?>
        <div class="box appointment-box">
            <h3>Appointment ID: <?php echo $row['id']; ?></h3>
            <p>Name: <?php echo $row['name']; ?></p>
            <p>Email: <?php echo $row['email']; ?></p>
            <p>Phone: <?php echo $row['phone']; ?></p>
            <p>Appointment Date: <?php echo $row['appointment_date']; ?></p>
            <p>Appointment Time: <?php echo $row['appointment_time'] ? $row['appointment_time'] : 'Not specified'; ?></p>
            <p>User: <?php echo isset($row['user_name']) ? $row['user_name'] : 'Unknown'; ?></p>
            <a href="admin_dashboard.php?edit_appointment_id=<?php echo $row['id']; ?>#edit-section" class="btn">Edit</a>
            <a href="admin_dashboard.php?delete_appointment_id=<?php echo $row['id']; ?>" class="btn delete-btn">Cancel</a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="admin-dashboard" id="logins">
    <h2>Login History</h2>
    <div class="box-container">
        <?php while ($row = mysqli_fetch_assoc($login_result)): ?>
        <div class="box login-box">
            <h3><?php echo $row['user_name']; ?></h3>
            <p>Login Time: <?php echo $row['login_time']; ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="admin-dashboard" id="messages">
    <h2>User Messages</h2>
    <div class="box-container">
        <?php while ($row = mysqli_fetch_assoc($message_result)): ?>
        <div class="box message-box">
            <h3>Message ID: <?php echo $row['id']; ?></h3>
            <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $row['phone'] ? $row['phone'] : 'Not provided'; ?></p>
            <p><strong>Subject:</strong> <?php echo $row['subject']; ?></p>
            <p><strong>Message:</strong> <?php echo $row['message']; ?></p>
            <p><strong>Sent At:</strong> <?php echo $row['created_at']; ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Edit User or Appointment Form -->
<section class="admin-dashboard" id="edit-section">
    <?php if (isset($_GET['edit_user_id'])): ?>
    <h2>Edit User</h2>
    <form action="" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>" required>
        <label for="middlename">Middle Name:</label>
        <input type="text" name="middlename" value="<?php echo $user['middlename']; ?>">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" readonly>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $user['address']; ?>" required>
        <button type="submit" class="btn">Update</button>
    </form>
    <?php endif; ?>

    <?php if (isset($_GET['edit_appointment_id'])): ?>
    <h2>Edit Appointment</h2>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $appointment['name']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $appointment['email']; ?>" readonly>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $appointment['phone']; ?>" required>
        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" value="<?php echo $appointment['appointment_date']; ?>" required>
        <label for="appointment_time">Appointment Time:</label>
        <input type="time" name="appointment_time" value="<?php echo $appointment['appointment_time']; ?>">
        <button type="submit" class="btn">Update</button>
    </form>
    <?php endif; ?>
</section>


<script src="js/script.js"></script>

</body>
</html>
