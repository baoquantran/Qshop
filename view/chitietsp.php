<main>
	<!-- Page Banner -->
	<div class="page-banner container-fluid no-padding">
		<!-- Container -->
		<div class="container">
			<div class="banner-content">
				<h3>Shop Single</h3>
				<p>our vision is to be Earth's most customer centric company</p>
			</div>
			<ol class="breadcrumb">
				<li><a href="index.html" title="Home">Home</a></li>
				<li class="active">Shop</li>
			</ol>
		</div><!-- Container /- -->
	</div><!-- Page Banner /- -->

	<!-- Shop Single -->
	<div class="shop-single container-fluid no-padding">
		<!-- Container -->
		<div class="container">
			<div class="product-views">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="carousel-item">
						<?php
						showimg($dsdetail);
						?>
					</div>
				</div>
				<!-- Entry Summary -->
				<div class="col-md-6 col-sm-6 col-xs-12 entry-summary">
					<h3 class="product_title"><?= $kq[0]['tensp'] ?></h3>
					<div class="product-rating">
						<div class="star-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<a href="#review-link" class="review-link">20 reviews</a>
					</div>
					<p class="stock in-stock"><span>Availablity:</span> in stock</p>
					<div>
						<p>So this is the tale of our castaways they're here for a long long time. They'll have to make the best of things its an uphill climb. Now were up in the big leagues getting' our turn at bat.</p>
					</div>
					<span class="price"><del><?= $kq[0]['giacu'] ?></del><?= $kq[0]['gia'] ?></span>
					<form action="index.php?act=addcart" method="post">
						<div class="product-attribute">
							<div class="select">
								<select>
									<option>Color *</option>
									<option>Black</option>
									<option>Green</option>
									<option>Blue</option>
								</select>
							</div>
							<div class="select">
								<select>
									<option>Size *</option>
									<option>L</option>
									<option>M</option>
									<option>XL</option>
									<option>XXL</option>
								</select>
							</div>
						</div>
						<div class="product-quantity" data-title="Quantity">
							<input type="button" value="-" class="qtyminus btn" data-field="quantity1">
							<input type="text" name="quantity1" value="0" class="qty btn">
							<input type="button" value="+" class="qtyplus btn" data-field="quantity1">
						</div>
						<form>
							<input type="hidden" value="<?= $kq[0]['id'] ?>" name="id">
							<input type="hidden" value="<?= $kq[0]['tensp'] ?>" name="tensp">
							<input type="hidden" value="<?= $kq[0]['img'] ?>" name="img">
							<input type="hidden" value="<?= $kq[0]['gia'] ?>" name="gia">
							<input type="hidden" value="<?= $kq[0]['giacu'] ?>" name="giacu">
							<input type="submit" name="addtocart" value="Add to cart" title="Add To Cart">
						</form>

					</form>
					<div class="product_meta">
						<span class="posted_in">
							<a href="#"><i class="fa fa-heart"></i></a>
							<a href="#"><i class="fa fa-retweet"></i></a>
							<a href="#"><i class="fa fa-envelope-o"></i></a>
						</span>
						<ul class="social">
							<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
							<li><a href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a></li>
						</ul>
					</div>
				</div><!-- Entry Summary /- -->

			</div>

			<?php

			include "./model/binhluan.php";
			if (isset($_SESSION['id']) && ($_SESSION['id'] > 0)) {

				if (isset($_SESSION['username']) && ($_SESSION['username'] != 0)) {
					$username = $_SESSION['username'];
				} else {
					$username = "";
				}

				if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
					//
					$username = $_POST['username'];
					$binhluan = $_POST['binhluan'];
					$id_sanpham = $_POST['idsp'];
					$id_user = $_SESSION['id'];
					//
					thembl($username, $binhluan, $id_user, $id_sanpham);
					//
				}
				$dsbl = showbl();

			?>
				<!-- cmt -->
<style>
	.user{
		font-weight: bold;
		padding-left: 2%;
		padding-top: -1%;
	}
	.binhluan{
		padding-left: 5%;
	}
	.container-bl{
		background-color: #f5f5f5;
	}
</style>
				<div style="display:none">
					<iframe src="binhluan.php?id=<?= $_GET['id'] ?>"></iframe>
				</div>


				<?php if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) { ?>
					<div class="well">
						<h4>Viết Bình luận ... <span class="glyphicon glyphicon-pencil"></span></h4>
						<form action="" method="post" role="form">
							<form action="binhluan.php" method="post">
								<input type="text" name="username" value="<?= $_SESSION['username'] ?>">
								<input type="hidden" name="idsp" value="<?= $_GET['id'] ?>">
								<div class="form-group">
									<textarea class="form-control" name="binhluan" rows="3"></textarea>
								</div>
								<input type="submit" value="gửi bình luận" name="guibinhluan">
							</form>
					</div>
				<?php } ?>
				<?php
				foreach ($dsbl as $bl) {
					echo  '  <hr>  <form class="container-bl">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> 
                    <label class="user">'. $bl['username']. ' </label><br>'.'<label class="binhluan">'.$bl['binhluan'].'</label>'."<br> 
                    </form>";
				}
				?>


			<?php } else {
				echo "<a href='index.php?act=dangnhap' target='_parent'>Bạn vui lòng đăng nhập!</a>";
			} ?>
			
			

		


			<!-- Product Section -->
			<div class="product-section container-fluid no-padding">
				<!-- Section Header -->
				<div class="section-header">
					<h3>Related Products</h3>
					<p>our vision is to be Earth's most customer centric company</p>
					<img src="view/images/section-seprator.png" alt="section-seprator" />
				</div><!-- Section Header /- -->
				<!-- Products -->
				<ul class="products">
					<!-- Product -->
					<li class="product">
						<a href="#">
							<img src="view/images/product-1.jpg" alt="Product" />
							<h5>Stylish Chair</h5>
							<span class="price"><del>$200</del>$139</span>
						</a>
						<div class="wishlist-box">
							<a href="#"><i class="fa fa-arrows-alt"></i></a>
							<a href="#"><i class="fa fa-heart-o"></i></a>
							<a href="#"><i class="fa fa-search"></i></a>
						</div>
						<a href="#" class="addto-cart" title="Add To Cart">Add To Cart</a>
					</li><!-- Product /- -->

					<!-- Product -->
					<li class="product">
						<a href="#">
							<img src="view/images/product-2.jpg" alt="Product" />
							<h5>men's casual shoes</h5>
							<span class="price"><del>$150</del>$85</span>
						</a>
						<div class="wishlist-box">
							<a href="#"><i class="fa fa-arrows-alt"></i></a>
							<a href="#"><i class="fa fa-heart-o"></i></a>
							<a href="#"><i class="fa fa-search"></i></a>
						</div>
						<a href="#" class="addto-cart" title="Add To Cart">Add To Cart</a>
					</li><!-- Product /- -->

					<!-- Product -->
					<li class="product">
						<a href="#">
							<img src="view/images/product-3.jpg" alt="Product" />
							<h5>Sun glass</h5>
							<span class="price"><del>$100</del>$35</span>
						</a>
						<div class="wishlist-box">
							<a href="#"><i class="fa fa-arrows-alt"></i></a>
							<a href="#"><i class="fa fa-heart-o"></i></a>
							<a href="#"><i class="fa fa-search"></i></a>
						</div>
						<a href="#" class="addto-cart" title="Add To Cart">Add To Cart</a>
					</li><!-- Product /- -->

					<!-- Product -->
					<li class="product">
						<a href="#">
							<img src="view/images/product-4.jpg" alt="Product" />
							<h5>tourist bags</h5>
							<span class="price"><del>$350</del>$279</span>
						</a>
						<div class="wishlist-box">
							<a href="#"><i class="fa fa-arrows-alt"></i></a>
							<a href="#"><i class="fa fa-heart-o"></i></a>
							<a href="#"><i class="fa fa-search"></i></a>
						</div>
						<a href="#" class="addto-cart" title="Add To Cart">Add To Cart</a>
					</li><!-- Product /- -->
				</ul><!-- Products /- -->
			</div><!-- Product Section /- -->
			<nav class="ow-pagination">
				<ul class="pager">
					<li class="number"><a href="#">4</a></li>
					<li class="load-more"><a href="#">Load More</a></li>
					<li class="previous"><a href="#"><i class="fa fa-angle-right"></i></a></li>
					<li class="next"><a href="#"><i class="fa fa-angle-left"></i></a></li>
				</ul>
			</nav>
		</div><!-- Container /- -->
	</div><!-- Shop Single /- -->
</main>