<?php
  include 'config.php';
  $message = "";
  $error = "";
  if (isset($_POST['Send'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];

	//$eMsg = 'Name'.$name."\n".'Email'.$email."\n".'Subject'.$subject."\n".'Message'.$message;
    
    $sqlForInsert = "insert into contact (name, email, subject, message) values ('$name','$email','$subject','$message')";
    $query= mysqli_query($con,$sqlForInsert);

    if($query){
    	//mail('sheamsheam09@gmail.com','simple contact',$eMsg);
		
		$message = '<div class="alert alert-success alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Thank You For Contact Us!</strong>
		</div>';
		

    }else{
	     $error = '<div class="alert alert-danger alert-dismissible fade in">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Some Thing Wrong.</strong>
	  	</div>';
	}
  }

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
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>C<span>ontact Us </span></h3>
			<!--/w3_short-->
			 <div class="services-breadcrumb">
				<div class="agile_inner_breadcrumb">
				   <ul class="w3_short">
						<li><a href="index.php">Home</a><i>|</i></li>
						<li>Contact</li>
					</ul>
				 </div>
			</div>
	   <!--//w3_short-->
	</div>
</div>
  <!--/contact-->
<div class="banner_bottom_agile_info">
    <div class="container">
	<!--728x90-->
	  	<div class="contact-grid-agile-w3s">
			<div class="col-md-4 contact-grid-agile-w3">
				<div class="contact-grid-agile-w31">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<h4>Address</h4>
					<p style="line-height: 14px">33, Kazi Nazrul Islam Avenue, Kawran Bazar, Dhaka-1215</p>
				</div>
			</div>
			<div class="col-md-4 contact-grid-agile-w3">
				<div class="contact-grid-agile-w32">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<h4>Call Us</h4>
					<p><span>+8801712324744</span></p>

				</div>
			</div>
			<div class="col-md-4 contact-grid-agile-w3">
				<div class="contact-grid-agile-w33">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<h4>Email</h4>
					<p><span><a href="mailto:>hatkhulabd@gmail.com">info@hatkhula.com</a></span></p>

				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	<!--728x90-->
   </div>
 </div>
<!--map-->
<div class="contact-w3-agile1 map" data-aos="flip-right">		
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7598678895497!2d90.38877611440813!3d23.75594109448281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a3ce69cca1%3A0xc9acfaefd4fd6f36!2s33+Kazi+Nazrul+Islam+Ave%2C+Dhaka+1215!5e0!3m2!1sen!2sbd!4v1525867731176" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!--map-->
<div class="banner_bottom_agile_info">
	<div class="container">
		<div class="agile-contact-grids">
			<div class="agile-contact-left">
				<div class="col-md-6 address-grid">

					<h4>For More <span>Information</span></h4>
					<div class="mail-agileits-w3layouts">
						<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
						<div class="contact-right">
							<p>Telephone </p><span>+8801712324744</span>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="mail-agileits-w3layouts">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<div class="contact-right">
							<p>Mail </p><a href="mailto:hatkhulabd@gmail.com">info@hatkhula.com</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="mail-agileits-w3layouts">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<div class="contact-right">
							<p>Location</p><span>33, Kazi Nazrul Islam Avenue, Kawran Bazar, <br>Dhaka-1215</span>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-6 contact-form">
					<div class="" >
						<span class="" style="color: white; text-align: center;"><?php echo $message; ?></span>
					</div>
					<div class="" >
						<span class="" style="color: white; text-align: center;"><?php echo $error; ?></span>
					</div>
					<h4 class="white-w3ls">Contact <span>Form</span></h4>
					<form action="#" method="post" id="contact">
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="Name" required="">
							<label>Name</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="email" name="Email" required=""> 
							<label>Email</label>
							<span></span>
						</div> 
						<div class="styled-input">
							<input type="text" name="Subject" required="">
							<label>Subject</label>
							<span></span>
						</div>
						<div class="styled-input">
							<textarea name="Message" required=""></textarea>
							<label>Message</label>
							<span></span>
						</div>	 
						<input type="submit" name="Send" value="SEND">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	 </div>
</div>
 <!--//contact-->
 <!--728x90-->
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
