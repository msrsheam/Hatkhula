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
	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
<div class="container">
	<!-- <?php echo sizeof($_SESSION['product']); ?> -->
	<?php if(!empty($_SESSION['product'])):?>
	  <nav class="navbar navbar-inverse" style="background:#04B745;">
	    <div class="container pull-left" style="width:300px;">
	      <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Shopping Cart</a> </div>
	    </div>
	    <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="viewCart.php?action=emptyall" class="btn btn-info">Empty cart <span class="glyphicon glyphicon-trash"></span></a></div>
	  </nav>
	  <div class="table-responsive" style="overflow: auto;">
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Image</th>
	        <th>Name</th>
	        <th>Qty</th>
	        <th>Price</th>
	        <th></th>
	      </tr>
	    </thead>
	    <?php foreach($_SESSION['product'] as $key=>$product):?>
	    	<tbody>
	    <tr>
	      <td><img src="products/<?php print $product['image']?>" width="50"></td>
	      <td><?php if(!empty($product['size'])) {print $product['productName'].'<br>Size:'.$product['size'];}else{print $product['productName'];}?></td>
	      <td><?php print $product['qty']?></td>
	      <td>&#2547;<?php print $product['price']?></td>
	      <td align="right"><a href="viewCart.php?action=empty&productId=<?php print $key?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></td>
	    </tr>
	    <?php $total = $total+$product['price'];?>
	    <?php endforeach;?>
	    <tr>
	    	<td colspan="3"><h4 align="right">Total :</h4></td>
	    	<td colspan="2"><h4 align="left">&#2547;<?php print $total*$product['qty']; ?></h4></td>
	    </tr>
	</tbody>
	  </table>
	  <a style="float: left;" class="btn btn-default" href="index.php">More Shopping</a>
	<a style="float: right;" class="btn btn-primary" href="
	customerLoginReg.php">Order Now <span class="glyphicon glyphicon-arrow-right"></span></a>
	</div>
	 <?php endif;?>
	<?php if(empty($_SESSION['product'])):?>
		<nav class="navbar navbar-inverse" style="background:#04B745;">
	    <div class="container pull-center" style="width:300px;">
	      <div class="navbar-header"> <a class="navbar-brand" href="index.php" style="color:#FFFFFF;">Shopping Cart Empty</a> </div>
	    </div>
	  </nav>
	<?php endif;?>
</div>
</body>
</html>