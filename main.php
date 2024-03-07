<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Feedbacks & Concerns Page!</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if feedback is submitted
            if(isset($_POST['subject']) && !empty($_POST['subject'])) {
                echo '<p class="text-success">Thank you for your feedback. It has been submitted successfully.</p>';
            } else {
                echo '<p class="text-danger">Feedback cannot be empty. Please enter your feedback and submit again.</p>';
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="subject" class="form-label">Freely state your feedbacks and concerns here:</label>
            <textarea id="subject" name="subject" class="form-control" rows="5"></textarea>
            <input type="submit" value="Submit" class="btn btn-primary mt-3">
        </form>
        <a href="logout.php" class="btn btn-warning mt-3">Logout</a>
    </div>
</body>
</html>
