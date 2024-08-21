<?php
session_start();  // Start the session at the very beginning of the file

require('DBconnection.php');

// Check if the session variable for the user's email is set
if (!isset($_SESSION['email'])) {
    echo "You must log in to view this page.";
    exit();  // Stop the script if the user is not logged in
}

$email = $_SESSION['email'];

// Handle Delete Booking Request
if (isset($_GET['delete_booking_id'])) {
    $booking_id = $_GET['delete_booking_id'];
    $delete_query = "DELETE FROM appointments WHERE id = $booking_id AND email = '$email'";
    if (mysqli_query($conn, $delete_query)) {
        header('Location: bookings.php');  // Redirect back to the bookings page
        exit();
    } else {
        echo "Error deleting booking: " . mysqli_error($conn);
    }
}

// Handle Edit Booking Request
if (isset($_GET['edit_booking_id'])) {
    $booking_id = $_GET['edit_booking_id'];
    $query = "SELECT * FROM appointments WHERE id = $booking_id AND email = '$email'";
    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];
        $message = $_POST['message'];

        $update_query = "UPDATE appointments SET 
                         name='$name', 
                         phone='$phone', 
                         appointment_date='$appointment_date', 
                         appointment_time='$appointment_time',
                         message='$message'
                         WHERE id = $booking_id AND email = '$email'";
                         
        if (mysqli_query($conn, $update_query)) {
            header('Location: bookings.php');
            exit();
        } else {
            echo "Error updating booking: " . mysqli_error($conn);
        }
    }
}

// Fetch all bookings for the logged-in user
$sql = "SELECT * FROM appointments WHERE email='$email'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/bookings.css">
</head>
<body>
    <header>
        <h1>ARYAcare - Login</h1>
        <nav>
            <a href="bookings.php">Bookings</a>
            <a href="user_dashboard.php">Home</a>
        </nav>
    </header>

    <h1 class='title1'>Your Bookings</h1>

    <div class="booking-list">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['appointment_date']}</td>
                                <td>{$row['appointment_time']}</td>
                                <td>{$row['message']}</td>
                                <td>
                                    <a href='bookings.php?edit_booking_id={$row['id']}#edit-section' class='btn'>Edit</a>
                                    <a href='bookings.php?delete_booking_id={$row['id']}' class='btn delete-btn'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($_GET['edit_booking_id'])): ?>
    <section id="edit-section">
        <h2>Edit Booking</h2>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $booking['name']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="<?php echo $booking['phone']; ?>" required>

            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" value="<?php echo $booking['appointment_date']; ?>" required>

            <label for="appointment_time">Appointment Time:</label>
            <input type="time" name="appointment_time" value="<?php echo $booking['appointment_time']; ?>">

            <label for="message">Message:</label>
            <input type="text" name="message" value="<?php echo $booking['message']; ?>">

            <button type="submit" class="btn">Update</button>
        </form>
    </section>
    <?php endif; ?>

</body>
</html>
