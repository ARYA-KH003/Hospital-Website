<?php
require('DBconnection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARYAcare-Hospital</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <section class="flex">

        <a href="index.php" class="logo"> <i class="fas fa-heartbeat"></i> ARYAcare </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#services">services</a>
            <a href="#about">about</a>
            <a href="#doctors">doctors</a>
            <a href="#book">book</a>
        </nav>

        <a href="login.php" class="btn">Login</a>


    </section>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<div class="even-container">

    <section class="home" id="home">

        <div class="image">
            <img src="image/home-img.gif" alt="">
        </div>
    
        <div class="content">
            <h3>Take care with ARYAcare</h3>
            <p>Welcome to ARYAcare<br/>At ARYAcare, Our expert team is here to provide you with the highest quality care, 
            using the latest technology and best practices in medicine</p>
            <a href="contact.php" class="btn"> contact us <span class="fas fa-chevron-right"></span> </a>
        </div>
    
    </section>

</div>

<!-- home section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-user-md"></i>
        <h3>120+</h3>
        <p>doctors at work</p>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <h3>1050+</h3>
        <p>satisfied patients</p>
    </div>

    <div class="icons">
        <i class="fas fa-procedures"></i>
        <h3>400+</h3>
        <p>bed facility</p>
    </div>

    <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>20+</h3>
        <p>available hospitals</p>
    </div>

</section>

<!-- icons section ends -->

<!-- services section starts  -->

<div class="even-container">

    <section class="services" id="services">

        <h1 class="heading"> our services </h1>
    
        <div class="box-container">
    
        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>free checkups</h3>
            <p>ARYAcare gives free health checkups to help you stay healthy</p>
            <a href="html/services.html?service=checkups" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
             <i class="fas fa-ambulance"></i>
             <h3>24/7 ambulance</h3>
             <p>ARYAcare's ambulance is ready to help you anytime, day or night.</p>
             <a href="html/services.html?service=ambulance" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
       </div>
       <div class="box">
       <i class="fas fa-user-md"></i>
            <h3>expert doctors</h3>
            <p>The doctors at ARYAcare are here to give you the best care possible.</p>
            <a href="html/services.html?service=doctors" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>medicines</h3>
            <p>ARYAcare has all the medicines you need to get better.</p>
            <a href="html/services.html?service=medicines" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>bed facility</h3>
            <p>ARYAcare offers comfortable beds if you need to stay in the hospital.</p>
            <a href="html/services.html?service=bedfacility" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>total care</h3>
            <p>At ARYAcare, we take care of all your health needs in one place.</p>
            <a href="html/services.html?service=totalcare" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>
        
        </div>
    
    </section>

</div>

<!-- services section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> about us </h1>

    <div class="row">

        <div class="image">
            <img src="image/about-img.gif" alt="">
        </div>

        <div class="content">
            <h3>ARYAcare take care of your healthy life</h3>
            <p>At ARYAcare, we are committed to providing the best healthcare services to help you live a healthy and fulfilling life. Our team of experts is here to support your health journey with care and compassion.</p>
            <p>We believe that good health is the foundation of a happy life, and we are dedicated to offering you the best care possible, every step of the way.</p>
            <<a href="html/about.html?service=checkups" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>

        </div>

    </div>

</section>

<!-- about section ends -->

<!-- doctors section starts  -->

<div class="even-container">

    <section class="doctors" id="doctors">

        <h1 class="heading"> our doctors</h1>
    
        <div class="box-container">
    
            <div class="box">
                <img src="image/doctor1.jpg" alt="">
                <h3>Arya Khosravi</h3>
                <span>Expert Doctor</span>
                <div class="share">
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f" target="_blank" aria-label="Facebook"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter" target="_blank" aria-label="Twitter"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram" target="_blank" aria-label="Instagram"></a>
                    <a href="https://www.linkedin.com/" class="fab fa-linkedin" target="_blank" aria-label="LinkedIn"></a>
                </div>
            </div>
    
            <div class="box">
                <img src="image/doctor2.jpg" alt="">
                <h3>Adeeb Hamidi</h3>
                <span>Expert Doctor</span>
                <div class="share">
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f" target="_blank" aria-label="Facebook"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter" target="_blank" aria-label="Twitter"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram" target="_blank" aria-label="Instagram"></a>
                    <a href="https://www.linkedin.com/" class="fab fa-linkedin" target="_blank" aria-label="LinkedIn"></a>
                </div>
            </div>
    
            <div class="box">
                <img src="image/doctor3.jpg" alt="">
                <h3>Mojib Rabin</h3>
                <span>Expert Doctor</span>
                <div class="share">
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f" target="_blank" aria-label="Facebook"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter" target="_blank" aria-label="Twitter"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram" target="_blank" aria-label="Instagram"></a>
                    <a href="https://www.linkedin.com/" class="fab fa-linkedin" target="_blank" aria-label="LinkedIn"></a>
                </div>
            </div>
    
            <div class="box">
                <img src="image/doctor4.jpg" alt="">
                <h3>Kim Samir</h3>
                <span>Expert Doctor</span>
                <div class="share">
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f" target="_blank" aria-label="Facebook"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter" target="_blank" aria-label="Twitter"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram" target="_blank" aria-label="Instagram"></a>
                    <a href="https://www.linkedin.com/" class="fab fa-linkedin" target="_blank" aria-label="LinkedIn"></a>
                </div>
            </div>
    
            <div class="box">
                <img src="image/doctor5.jpg" alt="">
                <h3>Yoshan Mendis</h3>
                <span>Expert Doctor</span>
                <div class="share">
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f" target="_blank" aria-label="Facebook"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter" target="_blank" aria-label="Twitter"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram" target="_blank" aria-label="Instagram"></a>
                    <a href="https://www.linkedin.com/" class="fab fa-linkedin" target="_blank" aria-label="LinkedIn"></a>
                </div>
            </div>
    
            <div class="box">
                <img src="image/doctor6.jpg" alt="">
                <h3>Farid Norouzi</h3>
                <span>Expert Doctor</span>
                <div class="share">
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f" target="_blank" aria-label="Facebook"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter" target="_blank" aria-label="Twitter"></a>
                    <a href="https://www.instagram.com/" class="fab fa-instagram" target="_blank" aria-label="Instagram"></a>
                    <a href="https://www.linkedin.com/" class="fab fa-linkedin" target="_blank" aria-label="LinkedIn"></a>
                </div>
            </div>
    
        </div>
    
    </section>

</div>

<!-- doctors section ends -->


<!-- booking section starts   -->

<section class="book" id="book">

    <h1 class="heading"> book now </h1>    

    <div class="row">

        <div class="image">
            <img src="image/book-img.gif" alt="">
        </div>

        <form action="login.php" method="GET">
            <h3>Book Appointment</h3>
            <input type="text" name="name" placeholder="Your Name" class="box" required>
            <input type="number" name="phone" placeholder="Your Number" class="box" required>
            <input type="email" name="email" placeholder="Your Email" class="box" required>
            <input type="date" name="appointment_date" class="box" required>
            <input type="time" name="appointment_time" class="box">
            <textarea name="message" placeholder="Message (Optional)" class="box"></textarea>
            <input type="submit" value="Book Now" class="btn">
        </form>


    </div>

</section>

<!-- booking section ends -->


<!-- footer section starts  -->

<div class="even-container">

    <section class="footer">

        <div class="box-container">
    
            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
                <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
                <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
                <a href="#doctors"> <i class="fas fa-chevron-right"></i> doctors </a>
                <a href="#book"> <i class="fas fa-chevron-right"></i> book </a>
            </div>
    
            <div class="box">
                 <h3>our services</h3>
                 <a href="html/services.html?service=checkups"> <i class="fas fa-chevron-right"></i> free checkups </a>
                 <a href="html/services.html?service=ambulance"> <i class="fas fa-chevron-right"></i> 24/7 ambulance </a>
                 <a href="html/services.html?service=doctors"> <i class="fas fa-chevron-right"></i> expert doctors </a>
                 <a href="html/services.html?service=medicines"> <i class="fas fa-chevron-right"></i> medicines </a>
                 <a href="html/services.html?service=ambulance"> <i class="fas fa-chevron-right"></i>bed facility </a>
                 <a href="html/services.html?service=totalcare"> <i class="fas fa-chevron-right"></i>total care</a>
           </div>

    
           <div class="box">
                <h3>contact info</h3>
                <a href="tel:+393423286520"> <i class="fas fa-phone"></i> +39 342 328 6520 </a>
                <a href="mailto:khsrya03d22z224r@studenti.unime.it"> <i class="fas fa-envelope"></i> khsrya03d22z224r@studenti.unime.it </a>
                <a href="mailto:aryakhosravi75@gmail.com"> <i class="fas fa-envelope"></i> aryakhosravi75@gmail.com </a>
                <a href="https://www.google.com/maps/search/?api=1&query=Messina,+Italy+98122" target="_blank"> 
                    <i class="fas fa-map-marker-alt"></i> Messina, Italy - 98122 
                </a>
            </div>

    
            <div class="box">
                 <h3>follow us</h3>
                 <a href="https://www.facebook.com/arya.khosravi.3158" target="_blank"> <i class="fab fa-facebook-f"></i> facebook </a>
                 <a href="https://twitter.com" target="_blank"> <i class="fab fa-twitter"></i> twitter </a>
                 <a href="https://www.instagram.com/__itsarya/" target="_blank"> <i class="fab fa-instagram"></i> instagram </a>
                 <a href="https://www.linkedin.com/in/arya-khosravi" target="_blank"> <i class="fab fa-linkedin"></i> linkedin </a>
                 <a href="https://pinterest.com"> <i class="fab fa-pinterest" target="_blank"></i> pinterest </a>
            </div>

        </div>
    
        <div class="credit"> created by <span>Arya Khosravirad</span> | student of the University of Messina </div>
    
    </section>

</div>

<!-- footer section ends -->


















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>