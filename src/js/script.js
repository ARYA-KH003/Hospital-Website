document.addEventListener("DOMContentLoaded", function() {
    document.title = document.title + " | Loaded";
});

document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll("a");
    
    links.forEach(function(link) {
        link.setAttribute("title", "You are hovering over a link!");
    });
});
