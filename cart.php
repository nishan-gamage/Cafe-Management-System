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
            <?php if (isset($_SESSION['auth'])): ?>
                <li><a href="my-orders.php">My Orders</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="white me-2"><?= $_SESSION['auth_user']['name'] ?? 'Guest'; ?></button>
                        <p><small>Hello <?= $_SESSION['auth_user']['name'] ?? 'Guest'; ?></small></p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="profile.php"><i class="bx bx-log-in-circle fs-5"></i><span>Profile</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class='bx bxs-user-plus'></i><span>Logout</span></a></li>
                    </ul>
                </div>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php"><i class='bx bxs-user-plus'></i><span>Register</span></a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<div class="py-3">
    <div class="container">
        <a href="index.php" class="text-black nav-link">Home</a>
        <a href="" class="disabled nav-link mx-1">/</a>
        <a href="Categories.php" class="text-black nav-link mx-1">Cart</a>
    </div>
</div>

<div class="py-5">
    <div class="container justify-content-center">
        <div class="table table-light text-center shadow">
            <div class="row">
                <div class="col-md-12">
                    <?php $items = getCartItems(); ?>
                    <?php if (mysqli_num_rows($items) > 0): ?>
                        <div class="row align-items-center">
                            <div class="col-md-2"><h6>Product</h6></div>
                            <div class="col-md-2"><h6>Name</h6></div>
                            <div class="col-md-2"><h6>Price</h6></div>
                            <div class="col-md-2"><h6>Quantity</h6></div>
                            <div class="col-md-2"><h6>Subtotal</h6></div>
                            <div class="col-md-2"><h6>Action</h6></div>
                        </div>
                        <?php foreach ($items as $citem): ?>
                            <?php $sub_total = $citem['selling_price'] * $citem['prod_qty']; ?>
                            <div class="table product_data mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2"><img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px"></div>
                                    <div class="col-md-2"><h5><?= $citem['name'] ?></h5></div>
                                    <div class="col-md-2"><h5>Rs<?= $citem['selling_price'] ?></h5></div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                        <div class="input-group mb-3" style="width:130px;">
                                            <button class="input-group-text decrement updateQty">-</button>
                                            <input type="text" class="form-control text-center bg-white qty" value="<?= $citem['prod_qty'] ?>" disabled>
                                            <button class="input-group-text increment updateQty">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><h5>Rs<?= $sub_total ?></h5></div>
                                    <div class="col-md-2">
                                        <button class="deleteitem border-0" value="<?= $citem['cid'] ?>"><i class="bi bi-x-circle-fill mx-5 text-danger"></i></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="card card-body border-0 shadow">
                            <h4 class="py-3">Your cart is empty</h4>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="cart-add" class="section-p1">
    <div id="coupon"></div>
    <div id="subtotal">
        <a href="checkout.php" class="nav-link w-50 text-center fw-bold normal">Proceed to Checkout</a>
    </div>
</section>

<div id="goTop">
    <a href="#" class="cm" id="goTopBtn"><i class="p-3 bi bi-arrow-up-circle-fill"></i></a>
</div>

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

<?php include 'includes/footer.php'; ?>
