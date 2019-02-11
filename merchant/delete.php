<?php
  session_start();
  if ( $_SESSION['userType'] != 'merchant' ) {
    header("Location: ../login.php");
	}
  //delete product
  include '../config.php';
  $productId = $_REQUEST['productId'];
  $sqlForDelete = "delete from product where productId = $productId";
  $queryForDelete = mysqli_query($con,$sqlForDelete);
  if ($queryForDelete) {
    header("Location: viewOwnProduct.php");
  }

  ?>
