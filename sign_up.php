<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';

?>
<section id="header">
    <div class="logo-1">
        <a href="index.php"><img src="./img/logo.png" style = "height:70px; width:70px" class="logo" alt=""></a>
    </div>
    <div>
        <ul id="navbar" class="mt-2">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
            <?php
            if (isset($_SESSION['auth'])) {
            ?>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="white me-2"><?= $_SESSION['auth_user'][''] ?></button>
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

<section id="form-details" class="w-50 mx-auto shadow-lg border-0 rounded-4">
    <form class="mx-auto mb-5" action="functions/authcode.php" method="POST" autocomplete="off" class="sign-in-form">
        <h2 class="mx-auto fw-bold">Login</h2>
        <input type="text" name="name" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Name">
        <input type="email" name="email" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Eamil">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <input type="password" name="password" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Password">
                </div>
                <div class="col-md-6">
                    <input type="password" name="cpassword" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Confirm Password">
                </div>
            </div>
        </div>
        <input type="text" name="address" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Address">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="cont" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Contact">
                </div>
                <div class="col-md-6">
                    <input type="text" name="cont2" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Contact 2">
                </div>
            </div>
        </div>
        <button class="normal w-100" name="register_btn" style="height: 40px;">Sign Up</button><br>
            <h6>Allready Have an account? <a href="sign_in.php" class="text-dark fw-bold"><small>Sign In</small></a></h6>
        </div>
    </form>
</section>

<?php
include 'includes/footer.php'
?>