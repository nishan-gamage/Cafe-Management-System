<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $cart_id = $_POST['cart_id'];

    // Include your database connection file
    include("config/dbcon.php");

    // SQL query to delete the record
    $sql = "DELETE FROM carts WHERE id = $cart_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $con->error;
    }

    // Close the database connection
    $con->close();
} else {
    echo "Invalid request method.";
}
?>
