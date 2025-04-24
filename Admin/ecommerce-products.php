<?php
include 'middleware/middlware.php'
?>

<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/ecommerce-add-new-products.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 03:55:15 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="../img/icons8-slack-16.ico" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Alertfi Css -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />


	<title>Cafetria</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
			<div style="margin-top: 20px;   display: block; margin-left: auto; margin-right: auto; width: 50%;">
				<a href="index.php"><img src="../img/logo.png" style = "height:80px; width:80px" class="logo" alt=""></a>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
    <!-- Dashboard -->
    <li style="margin-top: 20px;">
        <a href="../Admin/dashboard.php">
            <div class="parent-icon">
                <i class='bx bx-home-alt' style="color: navy;"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>

    <!-- Products Section -->
    <li>
        <a href="ecommerce-products.php">
            <div class="parent-icon">
                <i class='bx bx-shopping-bag' style="color: navy;"></i>
            </div>
            <div class="menu-title">Products</div>
        </a>
    </li>
    <li>
        <a href="ecommerce-add-new-products.php">
            <div class="parent-icon">
                <i class='bx bx-plus-circle' style="color: navy;"></i>
            </div>
            <div class="menu-title">Add New Products</div>
        </a>
    </li>

    <!-- Categories Section -->
    <li>
        <a href="category.php">
            <div class="parent-icon">
                <i class='bx bx-grid' style="color: navy;"></i>
            </div>
            <div class="menu-title">Categories</div>
        </a>
    </li>
    <li>
        <a href="add_category.php">
            <div class="parent-icon">
                <i class='bx bx-folder-plus' style="color: navy;"></i>
            </div>
            <div class="menu-title">Add Category</div>
        </a>
    </li>

    <!-- Customers Section -->
    <li>
        <a href="customers.php">
            <div class="parent-icon">
                <i class='bx bx-user' style="color: navy;"></i>
            </div>
            <div class="menu-title">Customers</div>
        </a>
    </li>

    <!-- Table Section -->
    <li>
        <a href="table.php">
            <div class="parent-icon">
                <i class='bx bx-table' style="color: navy;"></i>
            </div>
            <div class="menu-title">Table</div>
        </a>
    </li>

    <!-- Reporting Section -->
    <li class="menu-title" style="margin-top: 20px;">Reporting</li>
    <hr>
    <li style="margin-bottom: 20px;">
        <a href="ecommerce-orders.php">
            <div class="parent-icon">
                <i class='bx bx-cart' style="color: navy;"></i>
            </div>
            <div class="menu-title">Orders</div>
        </a>
    </li>

    <!-- Log Out -->
    <li style="margin-top: 80px;">
        <a href="logout.php">
            <div class="parent-icon">
                <i class='bx bx-log-out' style="color: red;"></i>
            </div>
            <div class="menu-title">Log Out</div>
        </a>
    </li>
</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">

							<li class="nav-item dropdown dropdown-app">
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
										<div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/slack.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/behance.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/google-drive.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/outlook.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/github.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/stack-overflow.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/figma.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/twitter.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/google-calendar.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/spotify.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/google-photos.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/pinterest.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/linkedin.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/dribble.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/youtube.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/google.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/envato.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>
											<div class="col">
												<a href="javascript:;">
													<div class="app-box text-center">
														<div class="app-icon">
															<img src="assets/images/app/safari.png" width="30" alt="">
														</div>

													</div>
												</a>
											</div>

										</div><!--end row-->

									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">

									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">dc
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success">
													<img src="assets/images/app/outlook.png" width="25" alt="user avatar">
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">Ss
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>

											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary">
													<img src="assets/images/app/github.png" width="25" alt="user avatar">

												</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>

											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">

									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/11.png" class="" alt="product image">
													</div>
												</div>


												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>


									</div>
							</li>
						</ul>
					</div>
					<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
						<div class="user-info">
							<p class="user-name mb-0"><?php echo $_SESSION['name']; ?></p>
							<p class="designattion mb-0"><?php echo $_SESSION['role']; ?></p>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
						</li>
						<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
						</li>
						<li>
							<div class="dropdown-divider mb-0"></div>
						</li>
						<li><a class="dropdown-item d-flex align-items-center" href="./logout.php"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<!--end header -->
		<div style="background-image: url(../img/banner/3.png); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
      </div>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 text-white">Cafetria</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;" class="text-white">
                        <i class="bx bx-home-alt text-white"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body" id="products_table">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Image</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$products = getAll("products");

											if (mysqli_num_rows($products) > 0) {
												foreach ($products as $item) {
											?>
													<tr>
														<td>
															<h6><?= $item['id']; ?></h6>
														</td>
														<td>
															<h6><?= $item['name']; ?></h6>
														</td>
														<td>
															<img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
														</td>
														<td>
															<a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm radius-30 px-4">Edit</a>
														</td>
														<td>
															<button type="button" class="btn btn-danger btn-sm radius-30 px-4 delete_product_btn" value="<?= $item['id']; ?>">Delete</button>
														</td>
													</tr>
											<?php
												}
											} else {
												echo "No record found";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!--end page wrapper -->
	<!--start overlay-->
	<div class="overlay toggle-icon"></div>
	<!--end overlay-->
	<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	<!--End Back To Top Button-->
	<footer class="page-footer">
		<p class="mb-0">Copyright © 2023. All right reserved.</p>
	</footer>
	</div>
	<!--end wrapper-->


	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="assets/js/custom.js"></script>


	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<!-- Alertify Js -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script>
		<?php if (isset($_SESSION['message'])) { ?>
			alertify.set('notifier', 'position', 'top-right');
			alertify.success('<?= $_SESSION['message']; ?>');
		<?php
			unset($_SESSION['message']);
		}
		?>
	</script>
</body>


<!-- Mirrored from codervent.com/syndron/demo/vertical/ecommerce-add-new-products.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 03:55:15 GMT -->

</html>