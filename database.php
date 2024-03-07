<?php

    $hostName = "sql302.infinityfree.com";
    $dbUser = "if0_36116431";
    $dbPassword = "KAGEHHfCystb1";
    $dbName = "if0_36116431_website_registration";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    if (!$conn) {
        die("Something went wrong");
    }

?>