document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded event listener triggered');
    
    let sections = document.querySelectorAll('section');
    let navLinks = document.querySelectorAll('header .navbar a[href^="#"]');
    let menuIcon = document.getElementById('menu-icon');
    let navbar = document.querySelector('.navbar');

    // Event listener for the menu icon
    menuIcon.addEventListener('click', function() {
        console.log('Menu icon clicked');
        navbar.classList.toggle('active');
    });

    // Event listener for scroll
    window.addEventListener('scroll', function() {
        console.log('Scroll event listener triggered');
        
        let top = window.scrollY;

        sections.forEach(sec => {
            let offset = sec.offsetTop - 150;
            let height = sec.offsetHeight;
            let id = sec.getAttribute('id');

            if (top >= offset && top < offset + height) {
                // Remove the active class from all links
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Add the active class to the current link
                document.querySelector('header .navbar a[href="#' + id + '"]').classList.add('active');
            }
        });
    });
});
