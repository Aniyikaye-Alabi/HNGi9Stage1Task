<?php

    $servername = "db4free.net";
    $username = "davepro123";
    $password = "Dave@123";
    $db_name = "hngi9db";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";

?>
