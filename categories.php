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
            <li><a href="categories.php" class="active">Categories</a></li>
            <li><a href="about.php">About</a></li>
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

<section>
    <img src="img/3.png" class="d-block w-100" style="height: 800px;" alt="...">
</section>


<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold fs-1">Our Collections</h2>
                <hr class="mb-5">
                <div class="row">
                    <?php
                    $category = getAllActive("categories");

                    if (mysqli_num_rows($category) > 0) {
                        foreach ($category as $item) {
                    ?>
                            <div data-aos="fade-up" class="col-md-3 mb-4">
                                <a class="nav-link" href="product.php?category=<?= $item['slug'] ?>">
                                    <div class="card shadow border-0 rounded-5" style="">
                                        <div class="card-body">
                                            <img src="./uploads/<?= $item['image']; ?>" alt="Category Image" style="height: 300px;" class="w-100 rounded-5">
                                        </div>
                                        <h4 class="text-center"><?= $item['name']; ?></h4>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No data availabel";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
include 'includes/footer.php'
?>