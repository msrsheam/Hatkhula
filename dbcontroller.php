
<?php
error_reporting(0);
//Setting session start
session_start();

$total=0;

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=hatkhula", 'root', '');		
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//get action string
$action = isset($_GET['action'])?$_GET['action']:"";

//Add to cart
if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {
	//Finding the product by code
	$query = "SELECT * FROM product WHERE productId=:productId";
	$stmt = $conn->prepare($query);
	$stmt->bindParam('productId', $_POST['productId']);
	$stmt->execute();
	$product = $stmt->fetch();

	$size = $_POST['size'];

	$currentQty = $_SESSION['product'][$_POST['productId']]['qty']+$_POST['qty']; //Incrementing the product qty in cart
	$_SESSION['product'][$_POST['productId']] =array('qty'=>$currentQty,'productName'=>$product['productName'],'image'=>$product['image1'],'price'=>$product['price']-$product['discount'],'size'=>$size,'productId'=>$_POST['productId']);
	
	$product='';
	// header("Location:index.php");
}

//Empty All
if($action=='emptyall') {
	$_SESSION['product'] =array();
	// header("Location:index.php");	
}

//Empty one by one
if($action=='empty') {
	$sku = $_GET['productId'];
	$products = $_SESSION['product'];
	unset($products[$sku]);
	$_SESSION['product']= $products;
	header("Location:viewCart.php");	
}
?>