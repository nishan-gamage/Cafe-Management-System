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
            <li><a href="about.php" class="active">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
            <?php
            if (isset($_SESSION['auth'])) {
            ?>
            <li><a href="my-orders.php">My Orders</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="white me-2"><?= $_SESSION['auth_user']['name'] ?? 'Guest'; ?></button>
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

<section>
    <img src="img/4.png" class="d-block w-100" style="height: 800px;" alt="...">
</section>

<section id="about-head" class="section-p1">
    <img src="img/Us.jpg" alt="">
    <div>
        <h2>Who We Are?</h2>
        <p>Cafetria is a venture by Sarathchandra Textile, located amidst the stunning landscape of Sabaragamuwa province, The restaurant started its service in 2018 focusing on Ceylonese fusion inspired fast food serving some of the best burgers, sandwiches, wraps, drinks and desserts out of Colombo.<br><br>

Cafe 007 strongly believes in maintaining high standards of quality, environmental sustainability and community wellbeing, therefore using gold standard industrial equipment that works with precision and safe for food preparation, strict health & hygiene protocols, sourcing fresh ingredients from local farmers, maximized use of organic ingredients are some of the key areas that we actively focused on. The restaurant’s operational consultancy was carried out by Homacon International Pvt Ltd, a well-established hospitality management consultancy firm based in Sri Lanka. The Culinary consultancy is carried out by the well experienced and upcoming chef, Sudheera Bandara.</p>

    </div>
</section>

<!--scroll Top -->
<div id="goTop">
    <a href="#" class="cm" id="goTopBtn"><i class="p-3 bi bi-arrow-up-circle-fill"></i></a>
</div>
<!-- End scroll Top -->

<script>
    let goTopBtn = document.getElementById("goTopBtn");
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
            goTopBtn.style.display = "flex";
        } else {
            goTopBtn.style.display = "none";
        }
    }
</script>
<?php
include 'includes/footer.php'
?>