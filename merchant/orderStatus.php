<?php
	session_start();
	if ( $_SESSION['userType'] != 'merchant' ) {
	header("Location: ../login.php");
	}
	include '../config.php';
	$orderId = $_REQUEST['oId'];
	$status = $_REQUEST['status'];
	if($status == 0) {
	    $order_status = 1;
	}
	$sql = "update orders set oStatus = $order_status where oId = $orderId";
	$query = mysqli_query($con, $sql);
	header("Location: orderShow.php");
?>