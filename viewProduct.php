<?php 
	include 'dbcontroller.php';
	$urlCategory=$_REQUEST['category'];
	$urlSubCategory=$_REQUEST['subCategory'];

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
<div class="col-md-8 sort-grid">
	<form action="" method="post">
		<div class="form-group row">
			<div class="col-xs-2" style="text-align: right;">
			    <label>Price: </label>
			 </div>
			<div class="col-xs-3">
			    <input class="form-control" name="min" type="text" placeholder="min">
			 </div>
			<div class="col-xs-3 input-group">
			    <input class="form-control" name="max" type="text" placeholder="max">
			    <div class="input-group-btn">
			      <button class="btn btn-default" name="searchmin" type="submit" >
			        <i class="glyphicon glyphicon-search"></i>
			      </button>
			    </div>
			 </div>
		</div>
	</form>
</div>
<!--advertisement1 -->
<div class="container-fluid" style="margin-top: 25px;">
	<img src="ad/ad1.jpg" class="img-responsive">
</div>
<!--advertisement1 -->
<!--products grid-->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<?php
		if(isset($_POST['searchmin'])){
	$min = floatval($_POST['min']);
	$max = floatval($_POST['max']);
	$query = "SELECT * FROM product where ( price between $min and $max) and (category = '$urlCategory') AND (subCategory = '$urlSubCategory')  ORDER BY productName ASC";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$products = $stmt->fetchAll();
}else{
			$query = "SELECT * FROM product where category = '$urlCategory' AND subCategory = '$urlSubCategory' ORDER BY productId ASC";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$products = $stmt->fetchAll();
		}?>
		<?php if(empty($products)):?>
			<nav class="navbar navbar-inverse" style="background:#04B745;">
		    <div class="container pull-center" style="width:300px;">
		      <div class="navbar-header"> <a class="navbar-brand" href="index.php" style="color:#FFFFFF;">Product not found.</a> </div>
		    </div>
		  </nav>
		<?php endif;?>
		<?php foreach($products as $product):?>
		<div class="col-md-3 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-front">
					<img src="<?php echo 'products/'.$product["image1"]; ?>" alt="" class="pro-image-back">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>" class="link-product-add-cart"  target="_blank">Quick View</a>
						</div>
					</div>
				</div>
				<div class="item-info-product ">
					<h4><a href="single.php?subCategory=<?php echo $product["subCategory"]; ?>&productId=<?php echo $product["productId"]; ?>" target="_blank"><?php echo $product["productName"]; ?></a></h4>
					<div class="info-product-price">
						<span class="item_price">&#2547;<?php $newPrice = $product["price"]-$product["discount"]; echo $newPrice; ?></span>
						<del><?php if($product["discount"]!=0){echo '&#2547;'.$product["price"];} ?></del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
						<form method="post" action="?action=addcart&subCategory=<?php echo $product["subCategory"]; ?>&category=<?php echo $product["category"]; ?>">
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
<!--products grid-->
<!--advertisement2 -->
<div class="container-fluid" style="margin-top: 25px;">
	<img src="ad/ad2.jpg" class="img-responsive">
</div>
<!--advertisement2 -->
	<?php include 'footer.php'; ?>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js --> 
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