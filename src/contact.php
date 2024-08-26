<?php
require('DBconnection.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Linking to the CSS file -->
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

<header>
        <h1>ARYAcare-Contacts</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>

<section class="contact" id="contact"> 

    <h1 class="heading">CONTACT</h1>

    <div class="row">

        <form action="process_contact.php" method="POST">
            <div class="inputBox">
                <input type="text" name="name" placeholder="name" required>
                <input type="email" name="email" placeholder="email" required>
            </div>

            <div class="inputBox">
                <input type="number" name="phone" placeholder="number">
                <input type="text" name="subject" placeholder="subject" required>
            </div>

            <textarea name="message" placeholder="message" required></textarea>
            <input type="submit" class="btn" value="send message">
        </form>
      
    </div>
    
    <!-- Contact Info Section -->
    <div class="contact-info">
        <h2>Contact Information</h2>
        <div class="box">
            <a href="tel:+393423286520"> <i class="fas fa-phone"></i> +39 342 328 6520 </a>
            <a href="mailto:khsrya03d22z224r@studenti.unime.it"> <i class="fas fa-envelope"></i> khsrya03d22z224r@studenti.unime.it </a>
            <a href="mailto:aryakhosravi75@gmail.com"> <i class="fas fa-envelope"></i> aryakhosravi75@gmail.com </a>
            <a href="https://www.google.com/maps/search/?api=1&query=Messina,+Italy+98122" target="_blank">  <i class="fas fa-map-marker-alt"></i> Messina, Italy - 98122 </a>
        </div>
    </div>

</section>

<script src="js/script.js"></script>

</body>
</html>

