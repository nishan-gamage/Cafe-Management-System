<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getslugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>

        <section id="header">
            <div class="logo-1">
                <a href="index.php"><img src="./img/logo.png" style="height:70px; width:70px" class="logo" alt=""></a>
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
                        $authName = $_SESSION['auth_user']['name'] ?? 'User'; // Fallback value
                    ?>
                        <li><a href="my-orders.php">My Orders</a></li>
                        <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                        <div class="nav-item dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <button class="white me-2"><?= htmlspecialchars($authName, ENT_QUOTES, 'UTF-8'); ?></button>
                                <p><small>Hello <?= htmlspecialchars($authName, ENT_QUOTES, 'UTF-8'); ?></small></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item d-flex align-items-center" href="profile.php"><i class="bx bx-log-in-circle fs-5"></i><span>Profile</span></a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class='bx bxs-user-plus'></i><span>Logout</span></a></li>
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
                                <li><a class="dropdown-item d-flex align-items-center" href="sign_in.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="sign_up.php"><i class='bx bxs-user-plus'></i><span>Register</span></a></li>
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
                <a href="index.php" class="text-black  nav-link">Home</a>
                <a href="" class="disabled nav-link mx-1">/</a>
                <a href="Categories.php" class="text-black nav-link mx-1">Collection</a>
                <a href="" class="disabled nav-link mx-1">/</a>
                <a href="#" class="nav-link disabled"><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></a>
            </div>
        </div>
        <div class="bg-light py-3">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="rounded-4 px-3">
                            <img src="./uploads/<?= htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Product Image" class="w-100 rounded-5">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>
                            <span class="float-end text-danger">
                                <?php if ($product['trending']) echo "Trending"; ?>
                            </span>
                        </h4>
                        <hr>
                        <div class="col-md-12">
                            <h6>Product Description:</h6>
                            <p><small><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></small></p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5>Rs <s class="text-danger"><?= htmlspecialchars($product['original_price'], ENT_QUOTES, 'UTF-8') ?></s></h5>
                                <h6>Rs <span class="fw-bold"><?= htmlspecialchars($product['selling_price'], ENT_QUOTES, 'UTF-8') ?></span></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:130px;">
                                    <button class="input-group-text decrement">-</button>
                                    <input type="text" class="form-control text-center bg-white qty" value="1" disabled>
                                    <button class="input-group-text increment">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6">
                                <button class="btn btn-success rounded-5 addtocartBtn px-4 mb-2" value="<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?>">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "Something went wrong.";
}
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $product = getAllActive("products");

                    if (mysqli_num_rows($product) > 0) {
                        foreach ($product as $item) {
                    ?>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a class="nav-link" href="product-view.php?product=<?= htmlspecialchars($item['slug'], ENT_QUOTES, 'UTF-8') ?>">
                                    <div class="card shadow border-0 w-100 rounded-5">
                                        <div class="card-body">
                                            <img src="./uploads/<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Category Image" style="height: 300px;" class="w-100 rounded-5">
                                        </div>
                                        <h4 class="text-center"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h4>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No data available";
                    }
                    ?>
                </div>
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
    };
</script>

<?php include 'includes/footer.php'; ?>
