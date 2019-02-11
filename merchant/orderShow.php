<?php
  session_start();
  if ( $_SESSION['userType'] !='merchant'  ){
    header("Location: ../login.php");
  }
  include '../config.php';
  $userType = $_SESSION['userType'];
  $userName = $_SESSION['userName'];
  $sql = "select name,image from $userType ";
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query);

  $sql2 = "select productId from product where postedBy = '$userName' ";
  $query2 = mysqli_query($con,$sql2);
  $countProduct = mysqli_num_rows($query2);

  //for total merchant
  $sqlForMerchant = "select mId from merchant";
  $queryForMerchant = mysqli_query($con,$sqlForMerchant);
  $countForMerchant = mysqli_num_rows($queryForMerchant);
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
  <title>Hatkhula | Admin List</title>
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

        <li class=" active menu">
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
                <h1 class="box-title"> Sub Admin List </h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: auto;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product ID</th>
                        <th>Size</th>
                        <th>QTY</th>
                        <th>Transition Type</th>
                        <th>Transition NO</th>
                        <th>Price</th>
                        <th>Customer Details</th>
                        <th>Shipping Details</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   		<?php
                        
                        $sqlForViewSubAdmin ="select orders.oStatus,orders.oId,orders.productName,orders.productId
                        ,orders.size,orders.quantity,orders.tType,orders.tNo,orders.price,orders.oDate,customer.name,customer.phone,shipping.sName,shipping.sPhone,shipping.sAddress,shipping.sCity from orders inner join customer on customer.cId = orders.cId inner join shipping on customer.email = shipping.cEmail inner join product on orders.productId = product.productId where oStatus = 0 and postedBy = '$userName'";
                        $queryForViewSubAdmin = mysqli_query($con,$sqlForViewSubAdmin);
                        while($info = mysqli_fetch_array($queryForViewSubAdmin)) {
                        ?>
                        <tr>
                        
                        <td><?php echo $info['oId'];?></td>
                        <td><?php echo $info['productName'];?></td>
                        <td><?php echo $info['productId'];?></td>
                        <td><?php echo $info['size'];?></td>
                        <td><?php echo $info['quantity'];?></td>
                        <td><?php echo $info['tType'];?></td>
                        <td><?php echo $info['tNo'];?></td>
                        <td><?php echo $info['price'];?></td>
                        <td><?php echo 'Name: '.$info['name'].'<br>'.'Phone: '.$info['phone'];?></td>
                        <td><?php echo 'Name: '.$info['sName'].'<br>'.'Phone: '.$info['sPhone'].'<br>'.'Address: '.$info['sAddress'].'<br>'.'City: '.$info['sCity'];?></td>
                        <td><?php echo $info['oDate']; ?></td>
                        <td>
                          <a href="orderStatus.php?&oId=<?php echo $info['oId'];?>&status=<?php echo $info['oStatus'];?>" class="btn btn-info btn">Sold/Delivered</a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product ID</th>
                        <th>Size</th>
                        <th>QTY</th>
                        <th>Transition Type</th>
                        <th>Transition NO</th>
                        <th>Price</th>
                        <th>Customer Details</th>
                        <th>Shipping Details</th>
                        <th>Date</th>
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
