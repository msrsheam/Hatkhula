<?php
  session_start();
  if ( $_SESSION['userType'] !='masteradmin'  ){
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  $sql = "select * from $userType where userName = '$userName'" ;
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query);
  $count = mysqli_num_rows($query);


  //Update Password
  $passError = "";
  $user_name = $_REQUEST['userName'];
  if(isset($_POST['updatePass'])){
  	$pass = $result['password'];
  	$newPassword = md5($_POST['newPassword']);
  	$confirmPassword = md5($_POST['confirmPassword']);
  	$oldPassword = md5($_POST['oldPassword']);
  	if($pass != $oldPassword){
  		$passError = '<div class="alert alert-danger alert-dismissible fade in">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Your password is not right please try again.</strong>
	  	</div>';
  	}
  	else{
  		$sqlForUpdate = "update $userType set password = '$confirmPassword' where userName='$userName' ";
    	$queryForUpdate = mysqli_query($con,$sqlForUpdate);
    	if ($queryForUpdate) {
       		$passError = '<div class="alert alert-success alert-dismissible fade in">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Your password change successful.</strong>
	  	</div>';
    	}
  	}
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hatkhula | Change Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li class="">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row" >
        <div class="col-md-6 col-md-offset-3 col-xs-12">
           <form method="POST" action="">
            <h1 >Cnange Password</h1>
            <span class="text-danger"><?php echo $passError; ?></span>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Enter New Password" required>
                <span class="fa fa-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Retype Password" required oninput ="Check(this)">
                <span class="fa fa-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input placeholder="current password" type="password" class="form-control" name="oldPassword" required>
                <span class="fa fa-lock form-control-feedback"></span>
              </div>
          <button style="margin-left: 5px;" class="btn btn-info btn-lg btn-flat" type="submit" name="updatePass">Change Password</button>
          </form>
        </div>

      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-right">
    <strong> &copy; 2018 SoftCare IT. All rights resereved.</strong><a href="http://www.softcareit.com/"  target="_blank"> SoftCare IT </a>
  </footer>

</div>
<!-- ./wrapper -->
<script>
  function Check(input){
    if(input.value != document.getElementById('newPassword').value){
    input.setCustomValidity('Password Must be matching');
   }
   else{
    input.setCustomValidity('');
   }
  }
</script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
