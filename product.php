<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';

if (isset($_GET['category'])) {

    $category_slug = $_GET['category'];
    $category_data = getslugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

    if ($category) {


        $cid = $category['id'];

?>

        <section id="header">
            <div class="logo-1">
            <a href="index.php"><img src="./img/logo.png" style = "height:70px; width:70px" class="logo" alt=""></a>
            </div>
            <div>
                <ul id="navbar" class="mt-2">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="categories.php" class="active">Collections</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <a href="#" id="close"><i class="far fa-times"></i></a>
                    <?php
                    if (isset($_SESSION['auth'])) {
                    ?>
                        <li><a href="my-orders.php">My Orders</a></li>
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

        <div class="py-3">
            <div class="container">
                <a href="index.php" class="text-black  nav-link">
                    Home
                    <a href="" class=" disabled nav-link mx-1">/</a>
                </a>
                <a href="Categories.php" class="text-black  nav-link mx-1">
                    Collection
                    <a href="" class=" disabled nav-link mx-1">/</a>

                </a>
                <a href="#" class="nav-link disabled"><?= $category['name'] ?></a>
            </div>
        </div>



        <div class="py-3">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <h1><?= $category['name']; ?></h1>
                        <hr class="mb-5">
                        <div class="row">
                            <?php
                            $products = getProdByCategory($cid);

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-2">
                                        <a class="nav-link" href="product-view.php?product=<?= $item['slug'] ?>">
                                            <div class="card shadow border-0 rounded-5">
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
                                echo "No data available";
                            }
                            ?>
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
    } else {
        echo "Somthing went wrong";
    }
} else {
    echo "Somthing went wrong";
}
include './includes/footer.php';
?>