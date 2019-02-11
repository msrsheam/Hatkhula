<?php 
	session_start();
	if ( $_SESSION['userType'] != 'masteradmin' ) {
	header("Location: ../login.php");
	}
	include '../config.php';
	$userId = $_REQUEST['userid'];
	$status = $_REQUEST['status'];

	if($status==0) {
	    $user_status = 1;
	}
	$sql = "update merchant set status =$user_status where mId= $userId";
	$query = mysqli_query($con, $sql);
	header("Location: newMerchantRequest.php");

?>