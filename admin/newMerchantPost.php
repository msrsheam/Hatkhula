<?php
  session_start();
  if ( $_SESSION['userType'] != 'masteradmin' ) {
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  $sql = "select image from $userType ";
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query);



 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hatkhula | Nwe Merchant List</title>
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
                <h1 class="box-title"> New Merchant List </h1>
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
                        $sqlForProduct = "select * from product where status = 0 ";
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
                          <?php if($info['status'] == 0){ ?>
                              <a href="productStatus.php?productid=<?php echo $info['productId'];?>&status=<?php echo $info['status'];?>" class="btn btn-success btn"><i class="fa fa-check-circle" style="font-size:30px;color:white;"></i></a>
                          <?php } ?>
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
