<?php include('db.php'); ?>

<?php //print_r($_SESSION['cart']); 
?>
<?php date_default_timezone_set('Asia/Manila'); ?>

<main>
			<!-- Page Banner -->
			<div class="page-banner container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="banner-content">
						<h3>Cart</h3>
						<p>our vision is to be Earth's most customer centric company</p>
					</div>
					<ol class="breadcrumb">
						<li><a href="index.html" title="Home">Home</a></li>							
						<li class="active">Cart</li>
					</ol>
				</div><!-- Container /- -->
			</div><!-- Page Banner /- -->
			<!-- Cart -->
			<div class="woocommerce-cart container-fluid no-left-padding no-right-padding">
				<!-- Container -->
				<div class="container">
					<!-- Cart Table -->
					<div class="col-md-12 col-sm-12 col-xs-12 cart-table">
						<form>
					
							<?php
								if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
									echo ' 
									
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th class="product-id">Id</th>
										<th class="product-thumbnail">Item</th>
										<th class="product-name">Product Name</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-unit-price">Unit Price</th>
										<th class="product-subtotal">Total</th>
										<th class="product-remove">Remove</th>
									</tr>
								</thead> ';
								$i = 0;
                            $tong = 0;
                            foreach ($_SESSION['giohang'] as $item) {
                                $tt = $item[3] * $item[4];
                                $thue = (12 / 100) * $tt;
                                $tong += $tt - $thue; 
								$tien=$item[3];
								$sl=$item[4];
									echo'
								<tbody>
									<tr class="cart_item">
										<td data-title="id-name" class="product-id">'.$item[0].'</td>
										<td data-title="Item" class="product-thumbnail"><a href="#"><img src="uploaded/'.$item[2].'" width="80px""  /></a></td>
										<td data-title="Product Name" class="product-name"><a href="#">'.$item[1].'</a></td>
									
										<td data-title="Quantity" class="product-quantity">'.$item[4].'</td>
										<td data-title="Unit Price" class="product-unit-price">'.$item[3].'</td>
										<td data-title="Total" class="product-subtotal">$'. number_format($tt, 2) .'</td>
										<td data-title="Remove" class="product-remove"><a href="index.php?act=delcart&i='.$i.'"><i class="icon icon-Delete"></i></a></td>
									</tr>
								
								</tbody> ';
								 
								$i++;
							}
								echo'	
								<tr>
									<td class="action" colspan="6">
										<a href="index.php?act=shop" title="Continue shopping">Continue shopping</a>
										<a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal">Check out</a>
										<a href="index.php?act=xoa">xóa</a>
										
									</td>
								</tr>';
								echo'
							</table> ';
							}
							?>;
							 
						</form>
					</div><!-- Cart Table /- -->
					<!-- Coupon -->
					<div class="col-md-offset-4 col-md-4 col-sm-6 col-xs-6 coupon">
						<div class="coupon-box">
							<h4>coupon code</h4>
							<h6>If You Have A Coupon Code Enter Here</h6>
							<form>
								<input type="text" class="form-control" placeholder="Coupon Code" />
								<input type="submit" value="apply code" />
							</form>
						</div>
					</div><!-- Coupon /- -->
					<div class="col-md-4 col-sm-6 col-xs-6 cart-collaterals">
						<div class="cart_totals">
							<h3>cart totals</h3>
							<table>
								<tr>
									<th>Sub Total</th>
									<td>$550</td>
								</tr>
								<tr>
									<th>Shipping</th>
									<td>Free</td>
								</tr>
								<tr>
									<th>Grand Total</th>
									<td>$550</td>
								</tr>
							</table>
							<div class="wc-proceed-to-checkout">		
								<a href="#" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
							</div>
						</div>
					</div>
				</div><!-- Container /- -->
			</div><!-- Cart /- -->
			
		</main>
		<script src="js/bootstrap.min.js"></script>
		<?php include('modal.php'); ?>
		