<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title> 
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
            <a href="#">About Me</a>
            <a href="skills.php">Skills</a>
            <a href="certifications.php">Certifications</a>
            <a href="contact.php">Feedbacks & Concerns</a>
        </nav>        
    </header>

    <section id="about" class="profile-section">
        

        <div class="about-content">
            <h2 class="heading">About <span>Me</span></h2>
            <h3>IT Student</h3>
            <p>My name is Brylle Justin Chua Minas. 
                I was born on October 17 2003, I am 20 years old. 
                I am currently on 2nd Year of College taking the Course BSIT at National University Fairview. 
                I am currently residing at Trees Residences in Quezon City.</p>
            <h3>Educational Background</h3>
            <img src="ssa.jpg" alt="SSA" class="school-img">
            <div class="school-layer">
                <h4>School of Saint Anthony</h4>
            </div>
            <p>When I was in elementary, I used to study at School of Saint Anthony Lagro Quezon City. 
                I was studying there for 7 years. when I was there, 
                I studied basic knowledge and skills like reading and writing.</p>
                <img src="mercedarian.jpg" alt="mercedarian" class="school-img">
                <div class="school-layer">
                    <h4>Mercedarian School Inc.</h4>
                </div>
            <p>In Junior High School I studied at Mercedarian School until I graduated Grade 10. 
                I gained 1st place on math quiz bee when 
                I was in grade 9 and 3rd place math quiz bee when I was in Grade 10.</p>
                <img src="nu.jpg" alt="nu" class="school-img">
            <div class="school-layer">
                <h4>National University Fairview</h4>
            </div>
            <p>In my Senior High School, I studied at National University Fairview taking up STEM Strand. 
                I graduated Senior High School with High Honors. 
                And now, I am still in National University Fairview but in college taking BSIT course.</p>
            <h3>Objective</h3>
            <p>To be able to apply what I have learned, and to further develop my knowledge and skills and at the same time, 
                to provide quality service that allows me to put my talents and knowledge in good use.</p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showSection('about');
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