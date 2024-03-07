<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: main.php");
        exit(); // Ensure script stops execution after redirection
    }

    if(isset($_POST["login"])) {
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        require_once "database.php";
        $sql = "SELECT * FROM website_tbl WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if(password_verify($password, $user["Password"])) {
                $_SESSION["user"] = "yes";
                header("Location: main.php");
                exit(); // Ensure script stops execution after redirection
            } else {
                echo "<div class='alert alert-danger'> Password does not match </div>";
            }
        } else {
            echo "<div class='alert alert-danger'> Email does not match </div>";
        }
    }
?>
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
<h2 class="heading">Login For <span>Feedbacks & Concerns</span></h2>
<div class="container">
    <div class="container">
        <div class="container">
            <form action="login.php" method="post"> <!-- corrected action attribute -->
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="Password" class="form-control" required>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">        
            </div>
            </form>
            <div><h3>Not Registered yet? <a href="contact.php"> Register Here</h3></p></div> <!-- Corrected closing tag for <p> -->
            <h3><a href="index.php">My Website</h3></div>
        </div>
    </div>
</body>
</html>