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
            <li><a href="index.php" >Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
            <?php if (isset($_SESSION['auth'])) { ?>
                <li><a href="my-orders.php">My Orders</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="white me-2">
                            <?= htmlspecialchars($_SESSION['auth_user']['name'] ?? 'User') ?>
                        </button>
                        <p><small>Hello <?= htmlspecialchars($_SESSION['auth_user']['name'] ?? 'User'); ?></small></p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="profile.php"><i class="bx bx-log-in-circle fs-5"></i><span>Profile</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bx bxs-user-plus"></i><span>Logout</span></a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <li class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="sign_in.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="sign_up.php"><i class="bx bxs-user-plus"></i><span>Register</span></a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<section>
    <img src="img/5.png" class="d-block w-100" style="height: 800px;" alt="...">
</section>

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>
            <li><i class="fal fa-map"></i><p>Muddiyansage Wattha Thalalla Gandara</p></li>
            <li><i class="far fa-envelope"></i><p>contact@example.com</p></li>
            <li><i class="fas fa-phone-alt"></i><p>076-7878581</p></li>
            <li><i class="far fa-clock"></i><p>Monday to Saturday: 9.00am to 4.00pm</p></li>
        </div>
    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.808802525475!2d-1.2565554843351678!3d51.75481970040356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c6a9ef8c485b%3A0xd2ff1883a001afed!2sUniversity%20of%20Oxford!5e0!3m2!1sen!2slk!4v1676759299222!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<section id="form-details">
    <form action="form">
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" placeholder="Your Name">
        <input type="text" placeholder="E-mail">
        <input type="text" placeholder="Subject">
        <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
        <button class="normal">Submit</button>
    </form>
    <div class="people">
        <!-- Team details -->
    </div>
</section>

<div id="goTop">
    <a href="#" class="cm" id="goTopBtn"><i class="p-3 bi bi-arrow-up-circle-fill"></i></a>
</div>

<script>
    let goTopBtn = document.getElementById("goTopBtn");
    window.onscroll = function() {
        goTopBtn.style.display = document.documentElement.scrollTop > 800 ? "flex" : "none";
    };
</script>

<?php include 'includes/footer.php'; ?>
