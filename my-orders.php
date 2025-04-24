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
                <li><a href="my-orders.php" class="active">My Orders</a></li>
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
        <a href="my-orders.php" class="text-black nav-link mx-1">My Orders</a>
    </div>
</div>

<div class="py-5">
    <div class="container justify-content-center">
        <div class="table text-center">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>View</th>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getOrders();

                            if (mysqli_num_rows($orders) > 0):
                                foreach ($orders as $items):
                            ?>
                                    <tr>
                                        <td><?= $items['id']; ?></td>
                                        <td><?= $items['price']; ?></td>
                                        <td><?= $items['Date']; ?></td>
                                        <td>
                                            <a href="view-order.php?n=<?= $items['name']; ?>" class="btn btn-primary">View Details</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">No orders yet</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
    }
</script>
<?php include 'includes/footer.php'; ?>
