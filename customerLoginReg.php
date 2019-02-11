<?php
$message="";
	include 'config.php';
	session_start();
	if (!empty($_SESSION['cEmail'])){
		header("Location: shippingDetails.php");
	}
	if (isset($_POST['signup'])) { 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = md5($_POST['pwd']);
		$phone = $_POST['phone'];
		$sql = " insert into customer (name,email,phone,password) values ('$name','$email','$phone','$password') ";
    	$query = mysqli_query($con,$sql);
    	if($query){
    		$_SESSION['cEmail'] = $email;
    		// header("Location : shippingDetails.php");
    		header("Location: shippingDetails.php");
    	}
    	else{
    		$message = '<div class="alert alert-danger alert-dismissible fade in">
		    <strong>Email or Phone Already exists...!</strong>
		    </div>';
    	}
	}
	if (isset($_POST['login'])) {
		
		$email = $_POST['email'];
		$password = md5($_POST['pwd']);
		
		$sql = " select email,password from customer where email = '$email' and password = '$password' ";
    	$query = mysqli_query($con,$sql);
    	$cunt = mysqli_num_rows($query);
    	if($cunt==1){
    		$_SESSION['cEmail'] = $email;
    		header("Location: shippingDetails.php");
    	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/11.png" type="image/gif" sizes="16x16">
<title>Hatkhula | Customer login and Registration</title>
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
	<div class="col-md-10 col-md-offset-1">
		<div class="col-md-4  panel panel-default">
			<br>
			<div class="well well-sm"><h4 class="text-success">Login Your Account</h4></div>
			<form action="" method="POST">
				<div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
			    </div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Password" required>
				</div>
				<div class="form-group">
				  <input type="submit" class="btn btn-primary" name="login" value="Login">
				</div>
			</form>
		</div>
		<div class="col-md-1"><br><h2 class="text-danger">-OR-</h2><br></div>
		<div class="col-md-7 panel panel-default">
			<br>
			<div class="well well-sm"><h4 class="text-success">New User Signup !</h4></div>
			<div class="col-md-12"><?php  echo $message; ?></div><br>
			<form action="" method="POST">
				<div class="form-group">
			      <label for="fullName">Full Name:</label>
			      <input type="text" class="form-control" name="name" id="fullName" placeholder="Full Name" required>
			    </div>
			    <div class="form-group">
				  <label for="email">Email:</label>
				  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
				</div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Password" required>
				</div>
				<div class="form-group">
			      <label for="phone">Phone No:</label>
			      <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone No" required>
			    </div>
			    <div class="form-group">
				  <input type="submit" class="btn btn-primary" name="signup" value="Signup">
				</div>
			</form>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
