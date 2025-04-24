<?php
session_start();
include("includes/header.php");

include("Functions/userfunctions.php");

include("authenticate.php");

$ad = $_SESSION['auth_user']['name'];

$query = "SELECT * FROM users WHERE name = '$ad'";

$res = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($res)) {
    $username = $row['name'];
}
?>


<section id="header">
    <div class="logo-1">
    <a href="index.php"><img src="./img/logo.png" style = "height:70px; width:70px" class="logo" alt=""></a>
    </div>
    <div>
        <ul id="navbar" class="mt-2">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="categories.php">Collections</a></li>
            <li><a href="contact.php">Contact</a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
            <?php
            if (isset($_SESSION['auth'])) {
            ?>
            <li><a href="my-orders.php">My Orders</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="white me-2"></button>
                        <p><small>Hello <?= $_SESSION['auth_user']['name']; ?></small></p>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="profile.php"><i class="bx bx-log-in-circle fs-5"></i><span>Profile</span></a> </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class='bx bxs-user-plus'></i><span>Logout</span></a> </li>
                    </ul>
                </div>
            <?php
            } else {
            ?>
                <li class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="sign_in.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a> </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="sign_up.php"><i class='bx bxs-user-plus'></i><span>Register</span></a> </li>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<div class="container">
    <div class="col-md-12">
        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <?php
                                if (isset($_POST['update'])) {
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();

                                    $old = mysqli_query($con, "SELECT * FROM users WHERE name = '$ad'");

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];

                                    if (empty($old_pass)) {
                                        $error['p'] = "Enter Your Current Password";
                                    } else if (empty($new_pass)) {
                                        $error['p'] = "Enter New Password";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Enter Confirm Password";
                                    } else if ($old_pass != $pass) {
                                        $error['p'] = "Invalid Current Password";
                                    } else if ($new_pass != $con_pass) {
                                        $error['p'] = "Both Password Does not match";
                                    }

                                    if (count($error) == 0) {
                                        $query = "UPDATE users SET password = '$new_pass' WHERE name= '$ad'";

                                        mysqli_query($con, $query);
                                    }
                                }

                                if (isset($error['p'])) {
                                    $e = $error['p'];

                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                } else {
                                    $show = "";
                                }
                                ?>
                                <form method="post">
                                    <h5 class="text-center my-4">Change Password</h5>
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <input type="password" name="old_pass" class="form-control" placeholder="Current Password">
                                        <br>
                                        <input type="password" name="new_pass" class="form-control" placeholder="Password">
                                        <br>
                                        <input type="password" name="con_pass" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


