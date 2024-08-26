<?php
session_start(); 

require('DBconnection.php');

function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

function emailExists($email) {
    global $conn;
    $email = sanitize($email);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

function validatePassword($password) {
    return true; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (emailExists($email)) {
        echo "Error: Email already exists. Please choose a different email.";
        exit();
    }

    if (!validatePassword($password)) {
        echo "Error: Password does not meet requirements.";
        exit();
    }

    $firstname = sanitize($_POST['firstname']);
    $middlename = sanitize($_POST['middlename']);
    $lastname = sanitize($_POST['lastname']);
    $gender = sanitize($_POST['gender']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);

    $sql = "INSERT INTO users (firstname, middlename, lastname, gender, phone, address, email, password)
            VALUES ('$firstname', '$middlename', '$lastname', '$gender', '$phone', '$address', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['email'] = $email; 
        
        if (file_exists('index.php')) {
            header("Location: index.php");
        } else {
            echo "Error: Redirection file not found.";
        }
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>