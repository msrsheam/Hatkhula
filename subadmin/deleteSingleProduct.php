<?php
  session_start();
  if ( $_SESSION['userType'] != 'subadmin' ) {
    header("Location: ../login.php");
  }
  include '../config.php';
 $productId = $_REQUEST['productId'];
 $merchantName = $_REQUEST['merchantName'];
  $sqlForDelete = "delete from product where productId = $productId ";
  $queryForDelete = mysqli_query($con,$sqlForDelete);
  if ($queryForDelete) {
    header("Location: viewMerchant.php");
  }


  ?>