<?php
	include 'dbcontroller.php';
	include 'config.php';
	$sql = "select userName from merchant";
	$query = mysqli_query($con,$sql);
	$countMerchant = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<!-- hatkhula.com -->
<head>
	<link rel="icon" href="images/11.png" type="image/gif" sizes="16x16">
<title>Hatkhula | Online Shopping in Bangladesh</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
	<?php include 'header.php'; ?>
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
					</div>
				</div>
			</div>
			<div class="item item5">
				<div class="container">
					<div class="carousel-caption">
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->
	<!---728x90-->
	<div class="banner_bottom_agile_info">
		<div class="container">
			<div class="banner_bottom_agile_info_inner_w3ls">
			   <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
			   	<a href="offers.php" target="_blank">
					<figure class="effect-roxy">
						<img src="images/bottom1.jpg" alt=" " class="img-responsive" />
						<figcaption>
						</figcaption>
					</figure></a>
				</div>
				 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
				 	<a href="offers.php" target="_blank">
					<figure class="effect-roxy">
						<img src="images/bottom2.jpg" alt=" " class="img-responsive" />
						<figcaption>
						</figcaption>
					</figure></a>
				</div>
				<div class="clearfix"></div>
			</div>
		 </div>
	</div>
	<!--728x90-->

<!-- home advertisement1 -->
<div class="container-fluid" style="margin-bottom: 25px;">
	<img src="ad/ad1.jpg" class="img-responsive">
</div>
<!-- home advertisement1 -->
	<!-- schedule-bottom //admin post system //count with database-->
	<div class="container-fluid">
		<div class="schedule-bottom">
			<div class="col-md-6  agileinfo_schedule_bottom_left">
				<img src="images/rs5994_465129591-low.jpg" alt="" class="img-responsive" />
			</div>
			<div class="col-md-6 agileits_schedule_bottom_right agileits_schedule_bottom_right1">
				<div class="w3ls_schedule_bottom_right_grid">
				<h3><span>H</span> atkhula</h3><br>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<h4>Customers</h4>
					<h5 class="counter">1100</h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-users" aria-hidden="true"></i>
					<h4>Merchants</h4>
					<h5 class="counter"><?php echo 50+$countMerchant; ?></h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					<h4>Products</h4>
					<h5 class="counter">45</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //schedule-bottom -->
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container-fluid">
	<!---728x90-->
		<h3 class="wthree_text_info">What's <span>Trending</span></h3>
		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
			<a>
			   <div class="bb-left-agileits-w3layouts-inner grid">
			   	<a href="offers.php" target="_blank">
					<figure class="effect-roxy">
						<img src="images/bb1.jpg" alt=" " class="img-responsive" />
						<figcaption>
							<!-- <h3><span>S</span>ale </h3>
							<p>Upto 55%</p -->
						</figcaption>
					</figure></a>
				</div>
			</a>
		</div>
		<div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
		   <div class="bb-middle-agileits-w3layouts grid">
		   		<a href="offers.php" target="_blank">
			   <figure class="effect-roxy">
					<img src="images/bottom3.jpg" alt=" " class="img-responsive" />
					<figcaption>
						<!-- <h3><span>S</span>ale </h3>
						<p>Upto 55%</p> -->
					</figcaption>
				</figure></a>
			</div>
			<div class="bb-middle-agileits-w3layouts forth grid">
				<a href="offers.php" target="_blank">
				<figure class="effect-roxy">
					<img src="images/bottom4.jpg" alt=" " class="img-responsive">
					<figcaption>
						<!-- <h3><span>S</span>ale </h3>
						<p>Upto 65%</p> -->
					</figcaption>
				</figure></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--/grids-->
<div class="agile_last_double_sectionw3ls">
	<div class="col-md-6 multi-gd-img multi-gd-text ">
		<a href="offers.php" target="_blank"><img src="images/bot_1.jpg" alt=" "><!-- <h4>Flat <span>50%</span> offer</h4> --></a>
	</div>
	 <div class="col-md-6 multi-gd-img multi-gd-text ">
		<a href="offers.php" target="_blank""><img src="images/bot_2.jpg" alt=" "><!-- <h4>Flat <span>50%</span> offer</h4> --></a>
	</div>
	<div class="clearfix"></div>
</div>
<!--/grids-->
<!-- home advertisement2 -->
<div class="container-fluid col-md-12" style="margin-top: 15px;margin-bottom: 15px;">
	<img src="ad/ad2.jpg" class="img-responsive">
</div>
<!-- home advertisement2 -->
<!-- /new_arrivals -->
	<div class="new_arrivals_agile_w3ls_info">
		<div class="container">
			<h3 class="wthree_text_info">New <span>Arrivals</span></h3>
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li> Men's</li>
						<li> Women's</li>
						<li> Bags</li>
						<li> Electronics</li>
					</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
						<div class="tab1">
							<?php
								$query = "SELECT * FROM product where (category = 'Mens Wear') and (status = 1) ORDER BY productId DESC LIMIT 8";
								$stmt = $conn->prepare($query);
								$stmt->execute();
								$products = $stmt->fetchAll();
							?>
							<?php foreach($products as $product):?>
							<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-front">
									<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product ">
									<h4><a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>"><?php echo $product["productName"]; ?></a></h4>
									<div class="info-product-price">
										<span class="item_price">&#2547;<?php $newPrice = $product["price"]-$product["discount"]; echo $newPrice; ?></span>
										<del><?php if($product["discount"]!=0){echo '&#2547;'.$product["price"];} ?></del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
										<form method="post" action="?action=addcart">
											<fieldset>
												<input type="hidden" name="qty" value="1">
												<input type="hidden" name="productId" value="<?php echo $product["productId"]; ?>" />
												<input type="submit" value="Add to cart" class="button" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
				      	<?php endforeach;?>

							<div class="clearfix"></div>
						</div>
						<!--//tab_one-->
						<!--/tab_two-->
						<div class="tab2">
							 <?php
								$query = "SELECT * FROM product where (category = 'Womens Wear') and (status = 1) ORDER BY productId DESC LIMIT 8";
								$stmt = $conn->prepare($query);
								$stmt->execute();
								$products = $stmt->fetchAll();
							?>
							<?php foreach($products as $product):?>
							<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-front">
									<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product ">
									<h4><a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>"><?php echo $product["productName"]; ?></a></h4>
									<div class="info-product-price">
										<span class="item_price">&#2547;<?php $newPrice = $product["price"]-$product["discount"]; echo $newPrice; ?></span>
										<del><?php if($product["discount"]!=0){echo '&#2547;'.$product["price"];} ?></del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
										<form method="post" action="?action=addcart">
											<fieldset>
												<input type="hidden" name="qty" value="1">
												<input type="hidden" name="productId" value="<?php echo $product["productId"]; ?>" />
												<input type="submit" value="Add to cart" class="button" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
				      	<?php endforeach;?>
							<div class="clearfix"></div>
						</div>
					 <!--//tab_two-->
						<div class="tab3">
							<?php
								$query = "SELECT * FROM product where (subCategory = 'Bags') and (status = 1) ORDER BY productId DESC LIMIT 8";
								$stmt = $conn->prepare($query);
								$stmt->execute();
								$products = $stmt->fetchAll();
							?>
							<?php foreach($products as $product):?>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-front">
										<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product ">
										<h4><a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>"><?php echo $product["productName"]; ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">&#2547;<?php $newPrice = $product["price"]-$product["discount"]; echo $newPrice; ?></span>
											<del><?php if($product["discount"]!=0){echo '&#2547;'.$product["price"];} ?></del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<form method="post" action="?action=addcart">
												<fieldset>
													<input type="hidden" name="qty" value="1">
													<input type="hidden" name="productId" value="<?php echo $product["productId"]; ?>" />
													<input type="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
				      		<?php endforeach;?>
							<div class="clearfix"></div>
						</div>
						<div class="tab4">
							<?php
								$query = "SELECT * FROM product where (category = 'Electronics') and (status = 1) ORDER BY productId DESC LIMIT 8";
								$stmt = $conn->prepare($query);
								$stmt->execute();
								$products = $stmt->fetchAll();
							?>
							<?php foreach($products as $product):?>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-front">
										<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product ">
										<h4><a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>"><?php echo $product["productName"]; ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">&#2547;<?php $newPrice = $product["price"]-$product["discount"]; echo $newPrice; ?></span>
											<del><?php if($product["discount"]!=0){echo '&#2547;'.$product["price"];} ?></del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<form method="post" action="?action=addcart">
												<fieldset>
													<input type="hidden" name="qty" value="1">
													<input type="hidden" name="productId" value="<?php echo $product["productId"]; ?>" />
													<input type="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
				      		<?php endforeach;?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- //new_arrivals -->
	<!-- home advertisement3 -->
	<div class="container-fluid">
		<div class="col-md-6 container" style="margin-bottom: 25px;"><img src="ad/ad3.jpg" class="img-responsive"></div>
		<div class="col-md-6 container" style="margin-bottom: 25px;"><img src="ad/ad4.jpg" class="img-responsive"></div>
	</div>
	<!-- home advertisement3 -->
	<!-- /we-offer -->
	<div class="sale-w3ls">
	</div>
	<!-- //we-offer -->
	<?php include 'footer.php'; ?>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->
	<!-- cart-js -->
	<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js -->
<!-- script for responsive tabs -->
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
	</script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
