// Smooth Scroll to Edit Section on Page Load fo edition and deletion in adiministration
document.addEventListener("DOMContentLoaded", function() {
    if (window.location.hash && document.querySelector(window.location.hash)) {
        document.querySelector(window.location.hash).scrollIntoView({ behavior: 'smooth' });
    }
});


