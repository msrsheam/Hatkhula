<?php
	include '../config.php';
	session_start();
	$user_Id = $_REQUEST['adminId'];
	$sql = "delete from subadmin where id = $user_Id";
	if(mysqli_query($con,$sql)){
        header("location: viewAdmin.php");
	}
	else{
	    echo 'Delete failed...!!';
	}
?>