<?php

session_start();
include('../config/dbcon.php');



if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $cont = mysqli_real_escape_string($con,$_POST['cont']);
    $cont2 = mysqli_real_escape_string($con,$_POST['cont2']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);


    // check if email already register
    $cechk_email_query = "SELECT email FROM users WHERE email='$email'";
    $cechk_email_query_run = mysqli_query($con,$cechk_email_query);

    if(mysqli_num_rows($cechk_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email already register";
        header(('Location: ../sign_up.php'));
    }
    else
    {
        if($password == $cpassword)
        {
        // Insert user data
        $insert_query = "INSERT INTO users (name,email,password,address,contact,contact2) VALUES ('$name','$email','$password','$address','$cont','$cont2')";
        $insert_query_run = mysqli_query($con,$insert_query);

        if($insert_query_run)
        {
            $_SESSION['message'] = "Registerd Success";
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['message'] = "Someyhing went wrong";
            header('Location: ../sign_up.php');
        }
        }
        else
        {
            $_SESSION['message'] = "Password do not match";
            header('Location: ../sign_up.php');
        }
    }

}
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $user_id = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];

        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'name' => $username,
            'email' => $useremail
        ];

        header('Location: ../index.php');

    }
    else
    {
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ../sign_in.php');

    }

}



?>