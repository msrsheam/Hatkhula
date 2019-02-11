<?php 
  session_start();
  if ( $_SESSION['userType'] != 'masteradmin' ) {
    header("Location: ../login.php");
  }
	include '../config.php';
	session_start();
	$user_Id = $_REQUEST['userid'];
	$sql = "delete from merchant where mId = $user_Id";
	if(mysqli_query($con,$sql)){
        header("location: newMerchantRequest.php");
	}
	else{
	    echo 'Delete failed...!!';
	}
?>