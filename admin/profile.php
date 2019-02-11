<?php
  session_start();
  if ( $_SESSION['userType'] !='masteradmin'  ){
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  // $sql = "select * from $userType where userName = '$userName'" ;
  // $query = mysqli_query($con,$sql);
  // $result = mysqli_fetch_array($query);
  // $count = mysqli_num_rows($query);

  //Update Info
  if(isset($_POST['updateInfo'])){

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sqlForUpdate = "update $userType set name='$name',email='$email' where userName='$userName' ";
    $queryForUpdate = mysqli_query($con,$sqlForUpdate);
    if ($queryForUpdate) {
       header('Location: profile.php');
    }
  }

  if (isset($_POST['upload'])) {
    $old_image = $result['image'];
    $image = $_FILES['image']['name'];
    $temp = explode(".",$_FILES["image"]["name"]);
    $newfilename = uniqid('', true).'.' . end($temp);
    $target = "image/".$newfilename;
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];
    if( ($type == 'image/png') ||($type == 'image/jpg') ||($type == 'image/gif') ||($type == 'image/jpeg') ){
      if($size > 2000000){
        echo '<script>alert("image is too large")</script>';
      }else{
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sqlForPicUpdate = "update $userType set image = '$newfilename' where userName='$userName' ";
        $queryForPicUpdate = mysqli_query($con,$sqlForPicUpdate);
        if ($queryForPicUpdate) {
          unlink("image/".$old_image);
          header('Location: profile.php');
        }
      }
    }else{
      echo '<script>alert("Only image is allow")</script>';
    }
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hatkhula | Profile</title>
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
<body class="hold-transition skin-blue sidebar-mini" onload="load()">
<div class="wrapper">
  <?php include 'menu.php';$pass = $result['password']; ?>
  
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
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-4 col-sm-4 col-xs-12">
          <!-- <img class="img-responsive" src="image/M SR SHEAM.jpg" style="border-radius: 5px;"> -->
          <?php $img = "image/".$result['image']; echo "<img src='$img' class='img-responsive'>"; ?>
        </div>
        <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12">
          <a href="#updateInfo" onclick="show()" href="" class="btn btn-warning btn-lg" style="float: left;margin: 5px;margin-left: 0px;">Uddate Info</a>
          <a href="updatePassword.php?userName=<?php echo $userName; ?>" class="btn btn-warning btn-lg" style="margin: 5px;margin-left: 0px;">Change Password</a>
          <h3>Name: <small><?php echo $result['name']; ?></small></h3>
          <h3>User Name: <small><?php echo $result['userName']; ?></small></h3>
          <h3>Email: <small><?php echo $result['email']; ?></small></h3>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row" >
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-md-6 col-xs-6">
          <!-- <input type="hidden" name="size" value="100000000"> -->
          <div class="form-group">
              <label for="profilePic">Update Profile Pic</label>&nbsp;<span class="text-danger">* Only You Can allow up to 2 MB or less than 2MB.</span>
              <input id="profilePic" type="file" name="image" class="form-control-file btn btn-lg btn-success" required >
            </div>
             <button style="margin-left: 4px;" class="btn btn-info btn-lg btn-flat" type="submit" name="upload">Upload </button>
        </div>
      </form>
        <div class="col-md-6 col-md-offset-3 col-xs-12" id="updateInfo">
           <form method="POST" action="" >
            <h1>Update Info</h1>
            <div class="form-group has-feedback">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
              <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>" required>
                <span class="fa fa-envelope form-control-feedback"></span>
              </div>
          <button style="margin-left: 5px;" class="btn btn-info btn-lg btn-flat" type="submit" name="updateInfo">Update</button>
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
  function load() {
    $('#updateInfo').hide();
    // $('#updatePass').hide();
  }
  function show(){
    $('#updateInfo').show();
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
