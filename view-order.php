<?php
include 'Functions/userfunctions.php';
include 'includes/header.php';
include './authenticate.php';

if (isset($_GET['n'])) {
    $name = $_GET['n'];
    $orderData = checkNameNoValid($name);

    // Check if the query failed and handle the error
    if (!$orderData) {
        // If $orderData is false, the query failed
        echo '<h4>Something went wrong with the query.</h4>';
        die();  // Terminate the script
    }

    // Check if there are any rows returned
    if (mysqli_num_rows($orderData) <= 0) {
        // No results found
        echo '<h4>No orders found.</h4>';
        die();  // Terminate the script
    }
} else {
    echo '<h4>Something went wrong, name parameter is missing.</h4>';
    die();  // Terminate the script
}

// Fetch the order data
$data = mysqli_fetch_array($orderData);
?>

<section id="header">
    <div class="logo-1">
        <a href="index.php" class="fw-bold fs-4 mt-2 nav-link" style="font-family: 'Dancing Script', cursive; color: #AFC2FF;"><i class="bi bi-slack me-2"></i>Cafetria</a>
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
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a> </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php"><i class='bx bxs-user-plus'></i><span>Register</span></a> </li>
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
        <a href="index.php" class="text-black  nav-link">
            Home
            <a href="" class=" disabled nav-link mx-1">/</a>
        </a>
        <a href="my-orders.php" class="text-black  nav-link mx-1">
            My Orders
            <a href="" class=" disabled nav-link mx-1">/</a>
        </a>
        <a href="#" class="text-black  nav-link mx-1">
            View Orders
        </a>
    </div>
</div>

<div class="py-5">
    <div class="container justify-content-center">
        <div class="table text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            View Order
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="border p-1">
                                        <?=$data['price']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
include 'includes/footer.php';
?>
