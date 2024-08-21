<?php
require('DBconnection.php');

function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

function handle_contact_form() {
    global $conn;

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
                echo json_encode(["message" => "Message sent successfully!"]);
            } else {
                echo json_encode(["error" => "Error: " . $sql . " " . $conn->error]);
            }
        } else {
            echo json_encode(["error" => "All fields are required."]);
        }
    } else {
        echo json_encode(["error" => "Invalid request method."]);
    }
}

handle_contact_form();

$conn->close();
?>