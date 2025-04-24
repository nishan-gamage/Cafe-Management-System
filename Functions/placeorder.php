<?php
session_start();
include('../config/db_con.php');

if (isset($_SESSION['auth'])) 
{
    if (isset($_POST['place_order'])) 
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['cont']);
        $pincode = mysqli_real_escape_string($con, $_POST['pt_code']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") 
        {
            $_SESSION['message'] = "All fields are mandatory";
            header('Location: ../checkout.php');
            exit(0);
        }

        $userId = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id = p.id AND c.user_id = '$userId' ORDER BY c.id DESC";
        $query_run = mysqli_query($con, $query);

        $total = 0;
        foreach ($query_run as $citem) {
            $total += $citem['selling_price'] * $citem['prod_qty'];
        }

        $insert_query = "INSERT INTO orders (user_id,name,email,contact,payment_mode,payment_id,postal_code,address,price) VALUES ('$userId','$name','$email','$phone','$payment_mode','$payment_id','$pincode','$address','$total')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) 
        {
            $order_id = mysqli_insert_id($con);
            foreach ($query_run as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];
                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ('$order_id', '$prod_id','$prod_qty','$price')";
                $insert_items_query_run = mysqli_query($con, $insert_items_query);
            }

            $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$userId'";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);

            $_SESSION['message'] = "Order Placed Successfully";
            header('Location: ../my-orders.php');
            die();
        }
    }
} 
else 
{
    header('Location: ../index.php');
}
