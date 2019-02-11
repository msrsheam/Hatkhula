<?php 
  session_start();
  if ( $_SESSION['userType'] != 'merchant' ) {
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  $sqlForUserName ="select name,image from $userType where userName = '$userName'";
  $queryForUserName = mysqli_query($con,$sqlForUserName);
  $resultForUserName = mysqli_fetch_array($queryForUserName);

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
  <title>Hatkhula | Product</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
              <?php $img = "image/".$resultForUserName['image']; echo "<img src='$img' class='user-image' >"; ?>
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
        <li class="active menu">
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

        <li class="menu">
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
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title"> Own Product Information </h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: auto;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Discount</th>
                        <th>Company/Brand</th>
                        <th>Description</th>
                        <th>Iamge</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   		<?php
                        $serialNo = 1;
                        $sqlForProduct = "select * from product where postedBy = '$userName'";
                        $queryForProduct = mysqli_query($con,$sqlForProduct);
                        while($info = mysqli_fetch_array($queryForProduct)) {
                        ?>
                        <tr>
                        <td><?php echo $serialNo;?></td>
                        <td><?php echo $info['productName'];?></td>
                        <td><?php echo $info['price'];?></td>
                        <td><?php echo $info['discount'];?></td>
                        <td><?php echo $info['company'];?></td>
                        <td><?php echo $info['discription'];?></td>
                        <td><?php $image1 = "../products/".$info['image1'];$image2 = "../products/".$info['image2'];$image3 = "../products/".$info['image3']; echo "<img src='$image1' height='50' >";echo "<img src='$image2' height='50' >";echo "<img src='$image3' height='50' >"; ?></td>
                        <td>
                          <a href="edit.php?productId=<?php echo $info['productId'];?>" class="btn btn-success btn"><i class="fa fa-pencil" style="font-size:25px;color:white;"></i></a>&nbsp;&nbsp;
                          <a href="delete.php?productId=<?php echo $info['productId'];?>" class="btn btn-danger btn"><i class="fa fa-trash" style="font-size:25px;color:white;"></i></a>
                        </td>
                    </tr>
                    <?php $serialNo++;}?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Serial No</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Discount</th>
                        <th>Company/Brand</th>
                        <th>Description</th>
                        <th>Iamge</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
      <!-- /.row -->

      <!-- Main row -->

      <!-- /.row -->
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
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
    })
</script>
</body>
</html>
