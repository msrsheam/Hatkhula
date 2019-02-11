<?php
  include 'config.php';
  $message = "";
  $error = "";
  if (isset($_POST['msubmit'])) {
    $name = $_POST['Name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nId = $_POST['nid'];
    $password = md5($_POST['pwd']);
    $userName = $_POST['userName'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $cName = $_POST['cname'];
    $cType = $_POST['ctype'];
    $cAddress = $_POST['caddress'];
    $sqlForInsert = "insert into merchant (name, phone, email, nId, userName, password, address, gender, cName, cType, cAddress, status) values ('$name','$phone','$email','$nId','$userName','$password','$address','$gender','$cName','$cType','$cAddress', 0)";
    $query= mysqli_query($con,$sqlForInsert);

    if($query){
		$message = '<div class="alert alert-success alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Merchant Request Successful!</strong>
		</div>';
    }else{
	     $error = '<div class="alert alert-danger alert-dismissible fade in">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Eamil OR User Name already existed.</strong>
	  	</div>';
	}
  }

 ?>
<!DOCTYPE html>
<html>

<!-- hatkhula.com -->
<head>
<link rel="icon" href="images/11.png" type="image/gif" sizes="16x16">
<title>Hatkhula | Registration</title>
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
	<br>
	<div class="col-md-12">
		<div class="col-md-3  panel panel-default">
			<h2 class="text-center" style="margin-top: 10px;">Login</h2>
		    <form action="" method="POST">
		      <div class="form-group">
		      <input class="form-control" type="hidden" name="userType" value="merchant">
		    </div>
		      <div class="form-group has-feedback">
		        <input type="text" class="form-control" placeholder="User Name" name="userName" required>
		        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		      </div>
		      <div class="form-group has-feedback">
		        <input type="password" class="form-control" placeholder="Password" name="password" required>
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		      </div>
		      <div class="row">
		        <div class="col-xs-4 col-xs-offset-4">
		          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Log In</button>
		        </div>
		      </div>
		      <div class="row">
		        <div class="form-group has-feedback">
		          <span class="text-danger"><?php echo $error; ?></span>
		        </div>
		      </div>
		    </form>
		</div>
		<div class="col-md-1"><br><h2 class="text-danger">-OR-</h2><br></div>
		<div class="col-md-8 panel panel-default">
			<strong><h3 style="margin-top: 10px; margin-bottom: 15px; text-align: center;line-height: 40px; font-weight:bold;">Merchant Registration</h3></strong>
			<form action="" method="POST">
				<div class="col-xs-12" >
					<span class="" style="color: white; text-align: center;"><?php echo $message; ?></span>
				</div>
				<div class="col-xs-12" >
					<span class="" style="color: white; text-align: center;"><?php echo $error; ?></span>
				</div>
				<div class="container">
				<div class="col-md-4">
					<div class="form-group">
				      <label for="name">Name:</label>
				      <input type="text" class="form-control" name="Name" id="name" placeholder="Name" required>
				    </div>
				    <div class="form-group">
				      <label for="phone">Phone No:</label>
				      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone No" required>
				    </div>
				    <div class="form-group">
					  <label for="email">Email:</label>
					  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
					</div>
					<div class="form-group">
				      <label for="nid">NID No:</label>
				      <input type="tel" class="form-control" name="nid" id="nid" placeholder="NID No" required>
				    </div>
				    <div class="form-group">
					  <label for="userName">User Name:</label>
					  <input type="text" class="form-control" name="userName" id="userName"  placeholder="User Name" required>
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Password" required>
					</div>
				</div>
				<div class="col-md-4">					
				    <div class="form-group">
					  <label for="address">Address:</label>
					  <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"></textarea>
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<br>
				      	<label class="radio-inline">
						<input type="radio" name="gender" value="Male" checked>Male
						</label>
						<label class="radio-inline">
						<input type="radio" name="gender" value="Female">Female
						</label>
				    </div>
				    <div class="form-group">
				      <label for="cname">Company Name:</label>
				      <input type="text" class="form-control" name="cname" id="cname" placeholder="Company Name" required>
				    </div>
				    <div class="form-group">
				      <label for="ctype">Company Type:</label>
				      <input type="text" class="form-control" name="ctype" id="ctype" placeholder="Company Type" >
				    </div>
				    <div class="form-group">
					  <label for="caddress">Company Address:</label>
					  <textarea class="form-control" rows="2" name="caddress" id="caddress" placeholder="Company Address"></textarea>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<input class="btn btn-success btn-lg" type="submit" name="msubmit" value="Submit">
					</div>
				</div>
			</form>
			<br>
		</div>
	</div>
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
