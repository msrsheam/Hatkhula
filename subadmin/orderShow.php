<?php 
  session_start();
  if ( $_SESSION['userType'] != 'subadmin' ) {
    header("Location: ../login.php");
  }
  include '../config.php';
  $userType = $_SESSION['userType'];
  $userName = $_SESSION['userName'];
  $sqlForUserName ="select name,image from $userType where userName = '$userName'";
  $queryForUserName = mysqli_query($con,$sqlForUserName);
  $resultForUserName = mysqli_fetch_array($queryForUserName);

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

  <?php include 'menu.php'; ?>

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
                        ,orders.size,orders.quantity,orders.tType,orders.tNo,orders.price,orders.oDate,customer.name,customer.phone,shipping.sName,shipping.sPhone,shipping.sAddress,shipping.sCity from orders inner join customer on customer.cId = orders.cId inner join shipping on customer.email = shipping.cEmail inner join product on orders.productId = product.productId where oStatus = 0 and postedBy = 'admin'";
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
