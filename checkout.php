<?php
include 'Functions/userfunctions.php';
include 'includes/header.php';
include './authenticate.php';
?>

<section id="header">
    <div class="logo-1">
    <a href="index.php"><img src="./img/logo.png" style = "height:70px; width:70px" class="logo" alt=""></a>
    </div>
    <div>
        <ul id="navbar" class="mt-2">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="categories.php">Categories</a></li>
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
                        <button class="white me-2"><?= $_SESSION['auth_user']['name'] ?? 'Guest' ?></button>
                        <p><small>Hello <?= $_SESSION['auth_user']['name'] ?? 'Guest'; ?></small></p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="profile.php">
                                <i class="bx bx-log-in-circle fs-5"></i><span>Profile</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="logout.php">
                                <i class='bx bxs-user-plus'></i><span>Logout</span></a></li>
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
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php">
                                <i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php">
                                <i class='bx bxs-user-plus'></i><span>Register</span></a></li>
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

<div class="py-3">
    <div class="container">
        <a href="index.php" class="text-black nav-link">
            Home
            <a href="" class="disabled nav-link mx-1">/</a>
        </a>
        <a href="Categories.php" class="text-black nav-link mx-1">
            Checkout
        </a>
    </div>
</div>

<div class="py-5">
    <div class="container justify-content-center">
        <div class="card border-0 text-center shadow">
            <div class="card-body shadow">
                <form action="Functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Order Details</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Name</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Quantity</h6>
                                </div>
                            </div>
                            <?php
                            $items = getCartItems();
                            $total = 0;
                            foreach ($items as $citem) {
                            ?>
                                <div class="card border-0 product_data mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                                        </div>
                                        <div class="col-md-4">
                                            <h5><?= $citem['name'] ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['selling_price'] ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>X <?= $citem['prod_qty'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $total += $citem['selling_price'] * $citem['prod_qty'];
                            }
                            ?>
                        </div>
                        <div class="col-md-5">
                            <h5>Shiping Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" required placeholder="First Name" name="name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" required placeholder="Email" name="email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" required placeholder="Contact" name="cont" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" required placeholder="Postal Code" name="pt_code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea required placeholder="Address" name="address" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Total Price: <span class="float-end"><?= $total ?></span></h5>
                            </div>
                            <div class="row">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="place_order" class="normal">Confirm Order | COD</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scroll Top -->
<div id="goTop">
    <a href="#" class="cm" id="goTopBtn"><i class="p-3 bi bi-arrow-up-circle-fill"></i></a>
</div>
<!-- End Scroll Top -->

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
include 'includes/footer.php';
?>
