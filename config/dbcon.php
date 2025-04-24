

<?php
    $host = "127.0.0.1"; // Use '127.0.0.1' for direct connection.
    $username = "root";
    $password = ""; // Use the correct password for 'root', if set.
    $database = "cafetria";
    $port = 3307; // Update this to match your MySQL port if changed.

    // Create database connection
    $con = mysqli_connect($host, $username, $password, $database, $port);

    // Check database connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } 
?>
