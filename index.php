<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brylle Minas' Profile</title> 
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
   
    <header class="header">
        <a href="#" class="logo">Brylle's Personal Website</a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <nav class="navbar" id="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Me</a>
            <a href="skills.php">Skills</a>
            <a href="certifications.php">Certifications</a>
            <a href="contact.php">Feedbacks & Concerns</a>
        </nav>        
    </header>

    <section id="home" class="profile-section">
        <div class="home-content">
            <h3>Hello, I'm</h3>
            <h1>Brylle Justin Minas</h1>
            <h3 id="role" class="blink"></h3>
            <p>This is my Personal Website. Freely navigate through my profile. Thanks!</p>
            <div class="social-media">
                <a href="https://facebook.com/brylle.minas/"><i class='bx bxl-facebook'></i></a>
                <a href="mailto: minasbc1@students.nu-fairview.edu.ph"><i class='bx bx-envelope'></i></a>
                <a href="https://www.instagram.com/Brylle.Justin/?hl=en"><i class='bx bxl-instagram-alt'></i></a>
            </div>
        </div>

        <div class="home-img">
            <img src="ehkaso.png" alt="Brylle Justin Minas">
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showSection('home');
            animateRole();
        });

        function showSection(sectionId) {
            var sections = document.querySelectorAll('.profile-section');
            sections.forEach(function (section) {
                section.style.display = 'none';
            });

            var selectedSection = document.getElementById(sectionId);
            selectedSection.style.display = 'block';
        }

        function animateRole() {
            const roles = ["IT STUDENT", "FUTURE WEB DEVELOPER", "COLLEGE STUDENT", "FROM IT224"];
            let roleIndex = 0;
            let textElement = document.getElementById('role');
            let text = roles[roleIndex];
            let index = 0;

            function type() {
                if (index < text.length) {
                    textElement.textContent += text.charAt(index);
                    index++;
                    setTimeout(type, 200); // Adjust typing speed here
                } else {
                    setTimeout(erase, 1000); // Delay before erasing text
                }
            }

            function erase() {
                if (index >= 0) {
                    textElement.textContent = text.substring(0, index - 1);
                    index--;
                    setTimeout(erase, 100); // Adjust erasing speed here
                } else {
                    roleIndex = (roleIndex + 1) % roles.length;
                    text = roles[roleIndex];
                    setTimeout(type, 500); // Delay before typing next text
                }
            }

            type(); // Start typing animation
        }

        var menuIcon = document.getElementById('menu-icon');
        var navbar = document.getElementById('navbar');

        menuIcon.addEventListener('click', function() {
            navbar.classList.toggle('active');
        });

    </script>
</body>
</html>
