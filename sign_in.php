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
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <h2 class="mx-auto fw-bold">Login</h2>
        <input type="email" name="email" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Eamil">
        <input type="password" name="password" class="rounded-5" style="height: 40px; font-size: 14px;" placeholder="Password">
        <button class="normal w-100" name="login_btn" style="height: 40px;">Sign In</button><br>
        <h6 class="mx-auto"></h6><br>
            <h6>Not Registered yet? <a href="sign_up.php" class="text-dark fw-bold"><small>Sign Up</small></a></h6>
        </div>
    </form>
</section>

<?php
include 'includes/footer.php'
?>