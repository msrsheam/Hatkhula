<?php 
	include 'config.php';
	$error = "";
	$urlProductId=$_REQUEST['productId'];
  if (isset($_POST['rsubmit'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];
    $sqlForInsertt = "insert into review (name,email,message,productId) values ('$name','$email','$message',$urlProductId)";
    $queryt= mysqli_query($con,$sqlForInsertt);

    if($queryt){
		$error = '<div class="alert alert-success alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Review Send Successfuly!</strong>
		</div>';
    }else{
	     $error = '<div class="alert alert-danger alert-dismissible fade in">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Some Thing Wrong.</strong>
	  	</div>';
	}
  } ?>

<?php include 'dbcontroller.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/11.png" type="image/gif" sizes="16x16">
<title>Hatkhula | Single View</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- //tags -->

<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //for bootstrap working -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link rel="stylesheet" type="text/css" href="css/menu.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
	<?php include 'header.php'; ?>
 <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	<!---728x90--->
	<!--/slider_owl-->
	<?php
		$urlProductId=$_REQUEST['productId'];
		$query = "SELECT * FROM product where productId = $urlProductId";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$products = $stmt->fetchAll();
	?>

	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
				<?php foreach($products as $product):?>
					<ul class="slides">
						<li data-thumb="<?php echo 'products/'.$product["image2"]; ?>">
							<div class="thumb-image"> <img src="<?php echo 'products/'.$product["image2"]; ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="<?php echo 'products/'.$product["image1"]; ?>">
							<div class="thumb-image"> <img src="<?php echo 'products/'.$product["image1"]; ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="<?php echo 'products/'.$product["image3"]; ?>">
							<div class="thumb-image"> <img src="<?php echo 'products/'.$product["image3"]; ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
				<?php endforeach;?>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<script type="text/javascript">
	      	$(document).ready(function() { 
	      		var c = '<?php echo $_REQUEST['subCategory']; ?>';
	      		switch (c){
	      			case "Shirts" :
	      			case "T-shirts" :
	      			case "Pant" : 
	      			case "Blazer" : 
	      			case "Shoes/Footwear" : 
	      			case  "Clothing" :
	      			case "Lehenga" :
			            $('#sizeQuantity').slideDown(500);
			            $('#quantity').hide();
			            break;
			    	default :
			        	$('#quantity').slideDown(500);
			        	$('#sizeQuantity').hide();
			        	break;
		        }
	      	});
	    </script>

	    <!--shart,t-shart,pant,shoes,blazar,colthing //// php code here -->
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
			<h3><?php echo $product["productName"]; ?></h3>
			<p><span class="item_price">&#2547;<?php $newPrice = $product["price"]-$product["discount"]; echo $newPrice; ?></span> <del><?php if($product["discount"]!=0){echo '&#2547;'.$product["price"];} ?></del></p>
			<h4>Product Code: <?php echo $product["productId"]; ?></h4>
			<br>
			<!--Size & Quantity//shart,t-shart,pant,shoes,blazar,colthing-->
			<div id="sizeQuantity">
				<form method="post" action="?action=addcart&subCategory=<?php echo $product["subCategory"]; ?>">
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Size :</h5>
							<input type="text" name="size" placeholder="Size" required>
							<h5>Quantity :</h5>
							<input type="text" name="qty" value="1">
							<div class="description">
								<fieldset>
									<input type="submit" value="Order Now" class="button" />
								</fieldset>
							</div>
						</div>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
							<fieldset>
								<input type="hidden" name="productId" value="<?php echo $product["productId"]; ?>" />
								<input type="submit" value="Add to cart" class="button" />
							</fieldset>
						</div>
					</div>
				</form>
			</div>
			<!--Quantity//Sunglasses,watches,bage, -->
			<div id="quantity">
				<form method="post" action="?action=addcart&subCategory=<?php echo $product["subCategory"]; ?>">
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quantity :</h5>
							<input type="text" name="qty" value="1">
							<div class="description">
								<fieldset>
									<input type="submit" value="Order Now" class="button" />
								</fieldset>
							</div>
						</div>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
							<fieldset>
								<input type="hidden" name="productId" value="<?php echo $product["productId"]; ?>" />
								<input type="submit" value="Add to cart" class="button" />
							</fieldset>
						</div>
					</div>
				</form>
			</div>
			<br>
		</div>   
	 	<div class="clearfix"> </div>
		<!---728x90--->
	<div class="responsive_tabs_agileits"> 
		<div id="horizontalTab">
		<ul class="resp-tabs-list">
			<li>Description</li>
			<li>Reviews</li>
			<li>Delivery Information</li>
		</ul>
		<div class="resp-tabs-container">
		<!--/tab_one-->
		   <div class="tab1">
				<div class="single_page_agile_its_w3ls">
				   <h4><?php echo $product["discription"]; ?></h4>
				</div>
			</div>
			<!--//tab_one-->
			<div class="tab2">
				<div class="single_page_agile_its_w3ls">
					<div class="bootstrap-tab-text-grids">
						<div class="add-review">
							<form method="POST" action="">
								<span class="" style="color: white; text-align: center;"><?php echo $error; ?></span>
								<input type="text" name="Name" placeholder="Name">
								<input type="email" name="Email" placeholder="Email"> 
								<textarea name="Message" required="" placeholder="Message"></textarea>
								<input type="submit" name="rsubmit" value="SEND">
							</form>
						</div>
						<?php
							$urlProductId=$_REQUEST['productId'];
							$query = "SELECT * FROM review where productId = $urlProductId ORDER BY id DESC LIMIT 8";
							$stmt = $conn->prepare($query);
							$stmt->execute();
							$products = $stmt->fetchAll();
						?>
						<?php foreach($products as $product):?>
							<div class="single_page_agile_its_w3ls">
							   <h4><?php echo $product["name"]; ?></h4>
							   <br>
							   <h5>&nbsp;&nbsp;-><?php echo $product["message"]; ?></h5>
							</div>
						<?php endforeach;?>
					 </div>
					 <!--show all review-->
				 </div>
			 </div>
			   <div class="tab3">

				<div class="single_page_agile_its_w3ls">
				  <div class="">
					<h1 class="text-success" align="center">Price Range</h1>
					<div class="table-responsive" style="overflow: auto;">
						<table class="table table-bordered">
							<h3>Single Point (Pick) solution</h3>
							<h4 align="center">(Inside Dhaka Delivery)</h4>
						    <thead>
						      <tr>
						        <th>Orders</th>
						        <th>Timing</th>
						        <th>Inside Dhaka City(Below 500gm)</th>
						        <th>Inside Dhaka City (Up to 1Kg)</th>
						        <th>Inside Dhaka City (Up to 2Kg)</th>
						      </tr>
						    </thead>
						    <tbody>
							    <tr>
							      <td rowspan="3">50 to 300 parcels (in a month)</td>
							      <td>Next Day (24- 48H)</td>
							      <td>60 TK</td>
							      <td>75 TK</td>
							      <td>100 TK</td>
							    </tr>
							    <tr>
							    	<td>Next Day (24H guaranteed delivery)</td>
							    	<td>75 TK</td>
							    	<td>90 TK</td>
							    	<td>120 TK</td>
							    </tr>
							    <tr>
							    	<td>Same Day (8H)</td>
							    	<td>120 TK</td>
							    	<td>150 TK</td>
							    	<td>200 TK</td>
							    </tr>
							    <tr>
							      <td rowspan="3">300+ parcels (in a month)</td>
							      <td>Next Day (24- 48H)</td>
							      <td>55 TK</td>
							      <td>70 TK</td>
							      <td>90 TK</td>
							    </tr>
							    <tr>
							    	<td>Next Day (24H guaranteed delivery)</td>
							    	<td>70 TK</td>
							    	<td>85 TK</td>
							    	<td>100 TK</td>
							    </tr>
							    <tr>
							    	<td>Same Day (8H)</td>
							    	<td>120 TK</td>
							    	<td>150 TK</td>
							    	<td>200 TK</td>
							    </tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<h3>Off day Service</h3>
							<h4 align="center">(Govt. Holiday & Weekends)*</h4>
						    <thead>
						      <tr>
						        <th>Timing</th>
						        <th>Inside Dhaka City(Below 500gm)</th>
						        <th>Inside Dhaka City (Up to 1Kg)</th>
						        <th>Inside Dhaka City (Up to 2Kg)</th>
						      </tr>
						    </thead>
						    <tbody>
							    <tr>
							      <td>Next Day (24- 48H)</td>
							      <td>85 TK</td>
							      <td>120 TK</td>
							      <td>150 TK</td>
							    </tr>
							</tbody>
						</table>
						<table class="table table-bordered">
							<h3>Fixed Timing Delivery</h3>
						    <thead>
						      <tr>
						        <th>Anytime</th>
						        <th>12 PM</th>
						        <th>3 PM</th>
						        <th>6 PM</th>
						      </tr>
						    </thead>
						    <tbody>
							    <tr>
							      <td>0 TK</td>
							      <td>85 TK</td>
							      <td>85 TK</td>
							      <td>85 TK</td>
							    </tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<h3>Outside Dhaka Delivery</h3>
						    <thead>
						      <tr>
						        <th>Timing</th>
						        <th>Outside Dhaka City(Below 500gm)</th>
						        <th>Outside Dhaka City (Up to 1Kg)</th>
						        <th>Outside Dhaka City (Up to 2Kg)</th>
						      </tr>
						    </thead>
						    <tbody>
							    <tr>
							      <td>Next Day (48-72hr) - Condition</td>
							      <td>120 TK</td>
							      <td>150 TK</td>
							      <td>180 TK</td>
							    </tr>
							    <tr>
							    	<td>Next Day (48-72hr) -Home delivery*</td>
							    	<td>150 TK</td>
							    	<td>180 TK</td>
							    	<td>280 TK</td>
							    </tr>
							</tbody>
						</table>
					</div>
					<h4>Outside Dhaka City: Jatrabari, Narayanganj, Gazipur, Tangi, Savar, Ashulia, Uttar/Dakkhin Khan</h4>
					<h4>** For Cash on delivery service: 10tk added for each 1000tk Parcel (Both Inside and outside Dhaka)</h4>
					<h4>** Same charge will be application for Cancel product return to Merchant</h4>
					<h4>** Home Delivery Area: Selected area only.</h4>
				</div>
				</div>
			</div>
		</div>
		</div>	
	</div>
</div>
 </div>
<!--//single_page-->
<!---728x90--->
	<?php include 'footer.php'; ?>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
<!-- Custom-JavaScript-File-Links --> 
<!-- single -->
<script src="js/imagezoom.js"></script>
<!-- single -->
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
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
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

<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/20-06-2017/elite_shoppy-demo_Free/143933984/web/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Mar 2018 05:06:10 GMT -->
</html>
