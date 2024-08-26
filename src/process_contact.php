<?php
require('DBconnection.php');

function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $phone = isset($_POST['phone']) ? sanitize($_POST['phone']) : NULL;
        $subject = sanitize($_POST['subject']);
        $message = sanitize($_POST['message']);

        $sql = "INSERT INTO contact_forms (name, email, phone, subject, message) 
                VALUES ('$name', '$email', '$phone', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Message sent successfully to Arya!');
                window.location.href='contact.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>
            alert('All fields are required.');
            window.history.back();
        </script>";
    }

    $conn->close();
}
?>
