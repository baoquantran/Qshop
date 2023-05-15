<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="">
<!--<![endif]-->

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">

	<title>N4SHOP - Home</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="view/images//favicon.ico" />

	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" href="view/images//apple-touch-icon-114x114-precomposed.png">

	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" href="view/images//apple-touch-icon-72x72-precomposed.png">

	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="view/images//apple-touch-icon-57x57-precomposed.png">

	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Arizonia|Crimson+Text:400,400i,600,600i,700,700i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="view/revolution/css/settings.css">

	<!-- RS5.0 Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="view/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="view/revolution/css/navigation.css">

	<!-- Library - Bootstrap v3.3.5 -->
	<link rel="stylesheet" type="text/css" href="view/libraries/lib.css">

	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="view/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="view/css/navigation-menu.css">
	<link rel="stylesheet" type="text/css" href="view/css/shortcode.css">
	<link rel="stylesheet" type="text/css" href="view/css/style.css">


	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->

</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<div class="main-container">
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="loader-inner ball-clip-rotate">
					<div></div>
				</div>
			</div>
		</div><!-- Loader /- -->

		<!-- Header -->
		<header class="header-section header-section-1 container-fluid no-padding">
			<!-- Top Header -->
			<div class="top-header top-header1 container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="col-md-7 col-sm-7 col-xs-7 dropdown-bar">
						<h5>Welcome To N4Shop</h5>
						<div class="language-dropdown dropdown">
							<button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="languages" id="language" type="button" class="btn dropdown-toggle">English <span class="caret"></span></button>
							<ul class="dropdown-menu no-padding">
								<li><a title="Danish" href="#">Danish</a></li>
								<li><a title="German" href="#">German</a></li>
								<li><a title="French" href="#">French</a></li>
							</ul>
						</div>
						<div class="language-dropdown dropdown">
							<button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="currency" id="currency" type="button" class="btn dropdown-toggle">US Dollar<span class="caret"></span></button>
							<ul class="dropdown-menu no-padding">
								<li><a title="Danish" href="#">Usd</a></li>
								<li><a title="German" href="#">Ora</a></li>
								<li><a title="French" href="#">Riyal</a></li>
							</ul>
						</div>
					</div>
					<!-- Social -->
					<div class="col-md-5 col-sm-5 col-xs-5 header-social">
						<ul>
							<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
							<li><a href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a></li>
							<li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
						</ul>
					</div><!-- Social /- -->
				</div><!-- Container /- -->
			</div><!-- Top Header /- -->

			<!-- Middel Header -->
			<div class="middel-header">
				<!-- Container -->
				<div class="container">
					<!-- Logo Block -->
					<div class="col-md-4 col-sm-6 col-xs-12 logo-block">
						<a href="index.php?act=home" class="navbar-brand">N4 <span>SHOP</span></a>
					</div><!-- Logo Block /- -->
					<!-- Search Block -->
					<div class="col-md-5 col-sm-6 col-xs-6 search-block">
						<div class="input-group">
							<input class="form-control" placeholder="Search You Wants Here . . ." type="text">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
							</span>
						</div>
					</div><!-- Search Block /- -->
					<!-- Menu Icon -->
					<div class="col-md-3 col-sm-6 col-xs-6 menu-icon">
						
						<ul class="cart">
							
							<li>
								<a aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" id="cart" class="btn dropdown-toggle" title="Add To Cart" href="#"><i class="icon icon-ShoppingCart"></i></a>
								<form>
							<?php
								if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
									$i = 0;
                           		 $tong = 0;
                            	foreach ($_SESSION['giohang'] as $item) {
                               		 $tt = $item[3] * $item[4];
                                	$thue = (12 / 100) * $tt;
                                	$tong += $tt - $thue; 
									echo ' 
								<ul class="dropdown-menu no-padding">
									<li class="mini_cart_item">
										<a title="Remove this item" class="remove" href="index.php?act=delcart&i='.$i.'">&#215;</a>
										<a href="#" class="shop-thumbnail">
											<img width="80px" class="attachment-shop_thumbnail" src="uploaded/'.$item[2].'">
										</a>
										<a>'.$item[1].'</a>
										<span class="quantity">'.$item[4].' &#215 <span class="amount">'.$item[3].'</span></span>
									</li>
									<li class="button">
										<a href="index.php?act=cart" title="View Cart">View Cart</a>
										<a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal" title="Check Out">Check out</a>
									</li>
								</ul>';
								$i++;
								}
							}
							?>
								</form>
							</li>

						</ul>
						
						<ul class="cart">
						
							<?php
								if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
									echo '<li id="uml" class="dungthu "><a href="index.php?act=userinfo" style="color:#b6795f;font-weight:bold;" class="font-menu button one"><span></span>' . $_SESSION['username'] . '</a></li>
										<li><a href="index.php?act=thoat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
										<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
									  </svg></a></li>
									';

								} else {
								?>
							<li><a href="index.php?act=dangnhap" title="User"><i class="icon icon-User"></i></a></li>

						<?php } ?>
						</ul>
						</form>
					</div><!-- Menu Icon /- -->
				</div><!-- Container /- -->
			</div><!-- Middel Header /- -->

			<!-- Menu Block -->
			<div class="container-fluid no-padding menu-block">
				<!-- Container -->
				<div class="container">
					<!-- nav -->
					<nav class="navbar navbar-default ow-navigation">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="index.php?act=home" class="navbar-brand">Max <span>shop</span></a>
						</div>
						<div class="navbar-collapse collapse" id="navbar">
							<ul class="nav navbar-nav">
								<li class="active dropdown">
									<a href="index.php?act=home" title="Home" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<!-- <ul class="dropdown-menu">
										<li><a href="index.php?act=home" title="home 1">home 1</a></li>
										<li><a href="index.php?act=home" title="home 2">home 2</a></li>
									</ul> -->
								</li>
								<li class="dropdown">
									<a href="#" title="Home" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Categories </a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
										<!-- <li><a href="index.php?act=cart" title="Cart">Cart</a></li>
										<li><a href="index.php?act=checkout" title="Checkout">Checkout</a></li>
										<li><a href="index.php?act=404" title="404">404</a></li> -->
										<?php
										foreach ($dsdm as $dm) {
											echo '<li><a href="index.php?act=product&id=' . $dm['id'] . '" target="_blank"><span></span>' . $dm['name'] . '</a></li>
                                            <li></li>';
										}
										?>
									</ul>
								</li>
								<li><a href="#product-section" title="Products">Products</a></li>
								<li class="dropdown">
									<a href="index.php?act=shop" title="Shop" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<!-- <ul class="dropdown-menu">
										<li><a href="index.php?act=shop-single" title="Shop Single">Shop Single</a></li>
									</ul> -->
								</li>
								<li class="dropdown">
									<a href="index.php?act=blog" title="Blog" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
										<li><a href="index.php?act=blog-post" title="Blog Post">Blog Post</a></li>
									</ul>
								</li>
								<li><a href="index.php?act=about" title="About Us">About Us</a></li>
								<li><a href="index.php?act=contact" title="Contact Us">Contact Us</a></li>
							</ul>
						</div>
						<!--/.nav-collapse -->
					</nav><!-- nav /- -->
				</div><!-- Container /- -->
			</div><!-- Menu Block /- -->
		</header><!-- Header /- -->





		<!-- JQuery v1.12.4 -->
		<script src="view/js/jquery.min.js"></script>

		<!-- Library - Js -->
		<script src="view/libraries/lib.js"></script>

		<script src="view/libraries/jquery.countdown.min.js"></script>

		<!-- RS5.0 Core JS Files -->
		<script type="text/javascript" src="view/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
		<script type="text/javascript" src="view/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
		<script type="text/javascript" src="view/revolution/js/extensions/revolution.extension.video.min.js"></script>
		<script type="text/javascript" src="view/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="view/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="view/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="view/revolution/js/extensions/revolution.extension.actions.min.js"></script>

		<!-- Library - Google Map API -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW40y4kdsjsz714OVTvrw7woVCpD8EbLE"></script>

		<!-- Library - Theme JS -->
		<script src="view/js/functions.js"></script>