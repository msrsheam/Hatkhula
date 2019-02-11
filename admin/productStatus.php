<?php
	session_start();
	if ( $_SESSION['userType'] != 'masteradmin' ) {
	header("Location: ../login.php");
	}
	include '../config.php';
	$productId = $_REQUEST['productid'];
	$status = $_REQUEST['status'];
	if($status == 0) {
	    $product_status = 1;
	}
	$sql = "update product set status = $product_status where productId = $productId";
	$query = mysqli_query($con, $sql);
	header("Location: newMerchantPost.php");
?>