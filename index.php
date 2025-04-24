<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';
?>
<body>

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
            ?>
            <li><a href="my-orders.php">My Orders</a></li>
            <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <button class="white me-2"></button><p><small>Hello <?= $_SESSION['auth_user']['name']; ?></small></p>
                       
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

<div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/1.png" class="d-block w-100" style="height: 900px;" alt="...">
            <div class="carousel-caption" style="margin-right: 500px;">
                <button class="normal" style="" onclick="window.location.href='shop.php';">Order Now</button>
            </div>
        </div>
</div>

<!-- Chatbot Icon -->
<div class="chat-icon" onclick="toggleChatbot()">💬</div>

<!-- Chatbot Popup -->
<div class="chatbot-popup" id="chatbotPopup">
    <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/ab3961fa-712f-4323-aa17-ff03b34109e2"></iframe>
</div>

<script>
    // Toggle chatbot visibility
    function toggleChatbot() {
        const chatbotPopup = document.getElementById('chatbotPopup');
        chatbotPopup.style.display = chatbotPopup.style.display === 'block' ? 'none' : 'block';
    }
</script>

<style>
    /* Chat Icon Styling */
    .chat-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #007bff;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Chatbot Popup Styling */
    .chatbot-popup {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 350px;
        height: 430px;
        display: none; /* Initially hidden */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        background-color: white;
    }
</style>

<?php include 'includes/footer.php'; ?>
</body>
