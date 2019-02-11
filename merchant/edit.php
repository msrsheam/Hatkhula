<?php
  session_start();
  if ( $_SESSION['userType'] !='merchant'  ){
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  $sql = "select image,userName from $userType where userName = '$userName'" ;
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query);

  //update product
  $productId = $_REQUEST['productId'];
  $productMessage = "";
  if (isset($_POST['productPost'])) {
    $productName = $_POST['productName'];
    $price = doubleval($_POST['price']);
    $discount =  doubleval($_POST['discount']);
    $company = $_POST['company'];
    $discription = $_POST['discription'];
    if($discount == ""){
      $productDiscount = 0;
    }
    else{
      $productDiscount = $discount;
    }

    //insert into database
    $sqlForProductInsert = " update product set productName = '$productName',price = $price,discount = $productDiscount,company = '$company',discription = '$discription' where productId = $productId";
    $queryForProductInsert = mysqli_query($con,$sqlForProductInsert);

    if ($queryForProductInsert) {
      $productMessage = '<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Product update Successful!</strong>
    </div>';
    }else echo $category;
  }

  //New Orders
    $sqlForNewOrder = "select oId from orders inner join product on orders.productId = product.productId where oStatus = 0 and postedBy = '$userName'";
    $queryForNewOrder = mysqli_query($con,$sqlForNewOrder);
    $countForNewOrder = mysqli_num_rows($queryForNewOrder);

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hatkhula | Insert/Post</title>
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
  <header class="main-header">

    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hatkhula</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="profile.php">
              <?php $img = "image/".$result['image']; echo "<img src='$img' class='user-image' >"; ?>
              <span class="hidden-xs"><?php echo $_SESSION['userName']; ?></span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="../logout.php" class="btn btn-flat"><i class="fa fa-sign-out"></i>Sign Out</a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class=" menu">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="productInsert.php"><i class="fa fa-circle-o"></i> Post/Insert</a></li>
            <li><a href="viewOwnProduct.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>


         <li class="  menu">
          <a href="orderShow.php">
            <i class="fa fa-shopping-cart"></i> <span>Order</span>&nbsp;&nbsp;&nbsp;<span class="label label-danger"><?php if($countForNewOrder>0){echo $countForNewOrder;} ?></span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        product
        <small>update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Product update</li>
      </ol>
    </section>


    <!--showing update value-->
    <?php
      
      $sqlForShow = "select * from product where productId = $productId";
      $queryForShow = mysqli_query($con,$sqlForShow);
      $info = mysqli_fetch_array($queryForShow);
    ?>
    <!-- Main content -->

    <section class="content">
      <div class="row" >
      	<div class="col-md-10 col-md-offset-1">
          <span><?php echo $productMessage; ?></span>
      		<form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="size" value="100000000">
	    		<div class="form-group">
	    			<label for="productName">Product Name:</label>
	    			<input id="productName" class="form-control" type="text" name="productName" placeholder="Product Name" value="<?php echo $info['productName']; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>Price:</label>
	    			<input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $info['price']; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>Discount:</label>
	    			<input class="form-control" type="text" name="discount" placeholder="Discount" value="<?php echo $info['discount']; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>Company / Brand:</label>
	    			<input class="form-control" type="text" name="company" placeholder="Company / Brand" value="<?php echo $info['company']; ?>">
	    		</div>
	    		<div class="form-group">
				  <label >Discription:</label>
				  <textarea class="form-control" name="discription" rows="4" required ><?php echo $info['discription']; ?></textarea>
				</div>
	    		<div class="form-group">
	    			<input class="btn btn-success btn-lg" type="submit" name="productPost" value="Update">
	    		</div>

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



	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->