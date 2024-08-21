<?php
require('DBconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
    $message = !empty($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

    $sql = "INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, message) 
            VALUES ('$name', '$email', '$phone', '$appointment_date', '$appointment_time', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Appointment successfully booked!');
            window.location.href='bookings.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
