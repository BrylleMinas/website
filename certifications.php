<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certifications</title> 
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
            <a href="#">Certifications</a>
            <a href="contact.php">Feedbacks & Concerns</a>
        </nav>        
    </header>

<section id="certifications" class="profile-section">
        <h2 class="heading">My <span>Certificates</span></h2>
    <div class="certifications">
        <div class="certification-box">
            <img src="oci.png" alt="Oracle Certified Foundations Associate" class="certification-img">
            <div class="certification-layer">
                <h4>Oracle Certified Foundations Associate</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="pptessential.png" alt="LinkedIn Learning PowerPoint Essential Training" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning PowerPoint Essential Training</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="ppttips.png" alt="LinkedIn Learning PowerPoint Tips and Tricks" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning PowerPoint Tips and Tricks</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="work.png" alt="LinkedIn Learning PowerPoint Tips and Tricks" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning Working With Computers and Devices</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="wordtip.png" alt="LinkedIn Learning PowerPoint Tips and Tricks" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning Word Tips and Tricks</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="wordessential.png" alt="LinkedIn Learning PowerPoint Tips and Tricks" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning Word Essential Training</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="exceltip.png" alt="LinkedIn Learning PowerPoint Tips and Tricks" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning Excel Tips and Tricks</h4>
            </div>
        </div>
        <div class="certification-box">
            <img src="excelessential.png" alt="LinkedIn Learning PowerPoint Tips and Tricks" class="certification-img">
            <div class="certification-layer">
                <h4>LinkedIn Learning Excel Essential Training</h4>
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showSection('certifications');
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