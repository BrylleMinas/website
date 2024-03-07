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
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
            <a href="#">Feedbacks & Concerns</a>
        </nav>        
    </header>
    <section id="contact" class="profile-section">
    <h2 class="heading">Registration For <span>Feedbacks & Concerns</span></h2>
            <?php
                //validate the submit button
            if(isset($_POST["Register"])){
                $lastName = $_POST["LastName"];
                $firstName = $_POST["FirstName"];
                $selectcountry = $_POST["country"];
                $selectprovince = $_POST["province"];
                $selectcity = $_POST["city"];
                $phone = $_POST["phone"];
                $barangay = $_POST["barangay"];
                $phase = $_POST["phase/subdivision"];
                $street = $_POST["street"];
                $lot = $_POST["lot/blk"];
                $email = $_POST["Email"];
                $password = $_POST["Password"];
                $repeatPassword = $_POST["Repeat_Password"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();
                //validate if all fields are empty
                if (empty($lastName) OR empty($firstName) OR empty($email) OR empty($password) OR empty ($repeatPassword)) {
                    array_push($errors, "All fields are required");
                }
                //validate if the email is not validated
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }
                // password should not be less than 8
                if (strlen($password)<8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }
                // check if password is the same
                if ($password != $repeatPassword) {
                    array_push($errors, "Password does not match");
                }
                require_once "database.php";
                $sql = "SELECT * FROM website_tbl WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0){
                    array_push($errors, "Email Already Exist!");
                }

                if (count($errors)>0) {
                    foreach ($errors as $error) {
                        echo "<div class = 'alert alert-danger'>$error</div>";
                        }
                    } else {
                        
                        $sql = "INSERT INTO website_tbl (Last_Name, First_Name, Country, Province, City, Phone, Barangay, Phase_Subdivision, Street, Lot_Blk, Email, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                        if ($preparestmt) {
                            mysqli_stmt_bind_param($stmt, "ssssssssssss", $lastName, $firstName, $selectcountry, $selectprovince, $selectcity, $phone, $barangay, $phase, $street, $lot, $email, $passwordHash);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'> You are Registered Successfully! </div>";
                        } else {
                            die("Something went wrong");
                        }
                    }
                }
            ?>

            <form action="contact.php" method="post">
                <div class="form-group">
                <label for="LastName">Last Name:</label>
                    <input type="text" class="form-control" name="LastName" placeholder="Last Name: ">
                </div>
                
                <div class="form-group">
                <label for="FirstName">First Name:</label>
                <input type="text" class="form-control" name="FirstName" placeholder="First Name: ">
                </div>

                <div class="select_option">
                <label for="country">Select Country:</label>
                        <select class="form-select country" aria-label="Default select example" name="country" onchange="loadStates()">
                        <option selected>Select Country</option>
                    </select>
                    <label for="province">Province:</label>
                    <select class="form-select state" aria-label="Default select example" name="province" onchange="loadCities()">
                        <option selected>Select Province</option>
                    </select>
                    <label for="city">City:</label>
                    <select class="form-select city" aria-label="Default select example" name="city">
                        <option selected>Select City</option>
                    </select>
                    </div>
                </div>

                <label for="phone">Phone:</label>
                <input id="phone" type="tel" name="phone" />
                <div class="form-group">
                <label for="barangay">Barangay:</label>
                    <input type="barangay" class="form-control" name="barangay" placeholder="Barangay: ">
                </div>
                <div class="form-group">
                <label for="phase/subdivision">Phase/Subdivision:</label>
                    <input type="phase/subdivision" class="form-control" name="phase/subdivision" placeholder="Phase/Subdivision: ">
                </div>
                <div class="form-group">
                <label for="street">Street:</label>
                    <input type="street" class="form-control" name="street" placeholder="Street: ">
                </div>
                <div class="form-group">
                <label for="lot/blk">Lot/Blk: </label>
                    <input type="lot/blk" class="form-control" name="lot/blk" placeholder="Lot/Blk: ">
                </div>
                <div class="form-group">
                <label for="Email">Email:</label>
                    <input type="email" class="form-control" name="Email" placeholder="Email: ">
                </div>
                
                <div class="form-group">
                <label for="Password">Password:</label>
                    <input type="password" class="form-control" name="Password" placeholder="Input password: ">
                </div>

                <div class="form-group">
                <label for="Repeat_Password">Repeat Password:</label>
                    <input type="password" class="form-control" name="Repeat_Password" placeholder="Repeat password: ">
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" name="Register" placeholder="Submit">
                </div>
            </form>
            <div><h3>Already registered? <a href="login.php"> Login Here</a></div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="country.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showSection('contact');
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
<script> const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });</script>
</html>
