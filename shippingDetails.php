
<?php 
	session_start();
		include 'config.php';
	if (isset($_POST['done'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$cEmail = $_SESSION['cEmail'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$date = date('d-m-y');
		$sql = " insert into shipping (sName,sPhone,sCity,sAddress,cEmail,sDate) values ('$name','$phone','$city','$address','$cEmail','$date') ";
    	$query = mysqli_query($con,$sql);
    	if($query){   		
    		header("Location: orderConfirm.php");
    	}
    	else{
    		$message = '<div class="alert alert-danger alert-dismissible fade in">
		    <strong>Email or Phone Already exists...!</strong>
		    </div>';
    	}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/11.png" type="image/gif" sizes="16x16">
<title>Hatkhula | Shipping details</title>
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
	<div class="col-md-8 col-md-offset-2 panel panel-default">
		<br>
		<div class="well well-sm"><h4 class="text-success">Please Fillup This Form</h4><br><h5 class="text-info">Shipping Details</h5></div>
		<form action="" method="POST">
			<div class="form-group">
		      <label for="fullName">Full Name:</label>
		      <input type="text" class="form-control" name="name" id="fullName" placeholder="Full Name" required>
		    </div>
			<div class="form-group">
			  <label for="address">Address:</label>
			  <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address" required></textarea>
			</div>
			<div class="form-group">
		      <label for="city">City:</label>
		      <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
		    </div>
			<div class="form-group">
		      <label for="phone">Phone No:</label>
		      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone No" required>
		    </div>
		    <div class="form-group">
			  <button type="submit" class="btn btn-lg btn-primary" name="done">Done</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
<!-- Custom-JavaScript-File-Links --> 
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