<?php
	session_start();
	if(empty($_SESSION['product'])){
		header("Location: index.php");
	}
	include "config.php";
	if (isset($_POST['confirm'])){
		$tType = $_POST['tType'];
		$tNo = $_POST['tNo'];
		$cEmail = $_SESSION['cEmail'];
		$sql = " select cId from customer where email = '$cEmail' ";
    	$query = mysqli_query($con,$sql);
    	$result = mysqli_fetch_array($query);
    	$cId = $result['cId'];
    	$date = date('d-m-y');
    	if (!empty($_SESSION['product'])) {

				$sqlForOrderTbl = " insert into orders (cId,tType,tNo,oDate,oStatus)
				values ('$cId','$tType','$tNo','$date',0) ";
				$queryForOrderTbl = mysqli_query($con,$sqlForOrderTbl);
				$sqlForGetOrderId = "select oId from orders ORDER BY oId DESC LIMIT 1";
				$queryForGetOrderId = mysqli_query($con,$sqlForGetOrderId);
				$result = mysqli_fetch_array($queryForGetOrderId);
				$orderId = floatval($result['oId']);

    		$tp = sizeof($_SESSION['product']);
    		for ($i=0; $i < $tp; $i++) {
    			foreach ($_SESSION['product'] as $i=>$product) {
    		 	$productId = $product['productId'];
    		 	$productName = $product['productName'];
    		 	$size = $product['size'];
    		 	$qty = floatval($product['qty']);
    		 	$price = floatval($product['price']);
					$sql = " insert into odetails (oId,productId,productName,size,quantity,price)
					values ($orderId,'$productId','$productName','$size',$qty,$price) ";
					$query = mysqli_query($con,$sql);
    		 	if($query){
    				$_SESSION['product'] =array();
		    		header("Location: index.php");
		    	}
		    	else{
		    		$message = '<div class="alert alert-danger alert-dismissible fade in">
				    <strong>Something wrong..</strong>
				    </div>';
		    	}

    		 }

    		}



			}
	}
?>
<?php
	include 'dbcontroller.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/11.png" type="image/gif" sizes="16x16">
	<title>Shopping Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
<div class="container  panel panel-default">
	<?php if(!empty($_SESSION['product'])):?>
	  <nav class="navbar navbar-inverse" style="background:#04B745;">
	    <div class="container pull-center" style="width:300px;">
	      <div class="navbar-header"> <span class="navbar-brand" style="color:#FFFFFF;">Order Confirmetion</span> </div>
	    </div>
	  </nav>
	  <span><?php echo $message; ?></span>
	  <div class="table-responsive" style="overflow: auto;">
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Image</th>
	        <th>Name</th>
	        <th>Qty</th>
	        <th>Price</th>
	      </tr>
	    </thead>
	    <?php foreach($_SESSION['product'] as $key=>$product):?>
	    <tbody>
		    <tr>
		      <td><img src="products/<?php print $product['image']?>" width="50"></td>
		      <td><?php if(!empty($product['size'])) {print $product['productName'].'<br>Size:'.$product['size'];}else{print $product['productName'];}?></td>
		      <td><?php print $product['qty']?></td>
		      <td>&#2547;<?php print $product['price']?></td>
		    </tr>
		    <?php $total = $total+$product['price'];?>
		<?php endforeach;?>
		    <tr>
		    	<td colspan="3"><h4 align="right">Total :</h4></td>
		    	<td colspan="2"><h4 align="left">&#2547;<?php print $total*$product['qty']; ?></h4></td>
		    </tr>
		</tbody>
	  </table>
	</div>
	<?php endif;?>
	<form action="" method="post">
		<input type="radio" name="tType" value="Cash On Delivery" id="Cash On Delivery" checked> <label for="Cash On Delivery">Cash On Delivery </label><br>
		<input type="radio" name="tType" value="b-kash" id="b-kash"> <label for="b-kash">b-kash </label><br>
		<input type="radio" name="tType" value="DBBL/Rocket" id="DBBL/Rocket"> <label for="DBBL/Rocket">DBBL/Rocket </label><br>
		<input id="textboxes" type="text" name="tNo" hidden="true" placeholder="Transection No"> <br>
		<input type="submit" class="btn btn-success btn-md" name="confirm" value="Confirm Order">
	</form>
	<?php if(empty($_SESSION['product'])):?>
		<nav class="navbar navbar-inverse" style="background:#04B745;">
	    <div class="container pull-center" style="width:300px;">
	      <div class="navbar-header"> <a class="navbar-brand" href="index.php" style="color:#FFFFFF;">Shopping Cart Empty</a> </div>
	    </div>
	  </nav>
	<?php endif;?>
</div>
<script type="text/javascript">
	$(function() {
	    $('input[name="tType"]').on('click', function() {
	        if ($(this).val() == 'b-kash') {
	            $('#textboxes').show();
	        }
	        else if ($(this).val() == 'DBBL/Rocket') {
	            $('#textboxes').show();
	        }
	        else {
	            $('#textboxes').hide();
	        }
	    });
	});
</script>
</body>
</html>
