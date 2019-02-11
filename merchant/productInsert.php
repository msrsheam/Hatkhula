

<?php
  session_start();
  if ( $_SESSION['userType'] !='merchant'){
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  $sql = "select image,userName from $userType where userName = '$userName'" ;
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query);

  //insert product
  $productMessage = "";
  if (isset($_POST['productPost'])) {
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];
    $productName = $_POST['productName'];
    $price = doubleval($_POST['price']);
    $discount =  doubleval($_POST['discount']);
    $company = $_POST['company'];
    $discription = $_POST['discription'];
    if($discount == ""){
      $productDiscount = 0;
    }
    else{
      $productDiscount = $discount;
    }
    //iamge-1
    $image1 = $_FILES['image1']['name'];
    $temp1 = explode(".",$_FILES["image1"]["name"]);
    $newfilename1 = uniqid('', true).'.' . end($temp1);
    $target1 = "../products/".$newfilename1;
    $size1 = $_FILES['image1']['size'];
    $type1 = $_FILES['image1']['type'];
    if( ($type1 == 'image/png') ||($type1 == 'image/jpg') ||($type1 == 'image/gif') ||($type1 == 'image/jpeg') ){
      if($size1 > 2000000){
        echo '<script>alert("image is too large")</script>';
      }
      else{
        move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
      }
    }
    else{
      echo '<script>alert("Only image is allow")</script>';
    }
    //image-2
    $image2 = $_FILES['image2']['name'];
    $temp2 = explode(".",$_FILES["image2"]["name"]);
    $newfilename2 = uniqid('', true).'.' . end($temp2);
    $target2 = "../products/".$newfilename2;
    $size2 = $_FILES['image2']['size'];
    $type2 = $_FILES['image2']['type'];
    if( ($type2 == 'image/png') ||($type2 == 'image/jpg') ||($type2 == 'image/gif') ||($type2 == 'image/jpeg') ){
      if($size2 > 2000000){
        echo '<script>alert("image is too large")</script>';
      }
      else{
        move_uploaded_file($_FILES['image2']['tmp_name'], $target2);
      }
    }
    else{
      echo '<script>alert("Only image is allow")</script>';
    }


     //image-3
      $image3 = $_FILES['image3']['name'];
      $temp3 = explode(".",$_FILES["image3"]["name"]);
      $newfilename3 = uniqid('', true).'.' . end($temp3);
      $target3 = "../products/".$newfilename3;
      $size3 = $_FILES['image3']['size'];
      $type3 = $_FILES['image3']['type'];
      if( ($type3 == 'image/png') ||($type3 == 'image/jpg') ||($type3 == 'image/gif') ||($type3 == 'image/jpeg') ){
        if($size2 > 2000000){
          echo '<script>alert("image is too large")</script>';
        }
        else{
          move_uploaded_file($_FILES['image3']['tmp_name'], $target3);
        }
      }
      else{
        echo '<script>alert("Only image is allow")</script>';
      }
    //insert into database
    $sqlForProductInsert = " insert into product (productName,status,price,discount,postedBy,company,discription,subCategory,category,image1,image2,image3) values ('$productName',0,$price,$productDiscount,'$userName','$company','$discription','$subCategory','$category','$newfilename1','$newfilename2','$newfilename3') ";
    $queryForProductInsert = mysqli_query($con,$sqlForProductInsert);

    if ($queryForProductInsert) {
      $productMessage = '<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Product Insert Successful!</strong>
    </div>';
    }else echo $category;
  }

  //New Orders
    $sqlForNewOrder = "select oId from orders inner join product on orders.productId = product.productId where oStatus = 0 and postedBy = '$userName'";
    $queryForNewOrder = mysqli_query($con,$sqlForNewOrder);
    $countForNewOrder = mysqli_num_rows($queryForNewOrder);

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hatkhula | Insert/Post</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hatkhula</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="profile.php">
              <!-- <img src="image/M SR SHEAM.jpg" class="user-image" alt="User Image"> -->
              <?php $img = "image/".$result['image']; echo "<img src='$img' class='user-image' >"; ?>
              <span class="hidden-xs"><?php echo $_SESSION['userName']; ?></span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="../logout.php" class="btn btn-flat"><i class="fa fa-sign-out"></i>Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class=" menu">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="productInsert.php"><i class="fa fa-circle-o"></i> Post/Insert</a></li>
            <li><a href="viewOwnProduct.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>


         <li class="  menu">
          <a href="orderShow.php">
            <i class="fa fa-shopping-cart"></i> <span>Order</span>&nbsp;&nbsp;&nbsp;<span class="label label-danger"><?php if($countForNewOrder>0){echo $countForNewOrder;} ?></span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        product
        <small>Post/insert</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Product insert</li>
      </ol>
    </section>

<script language="javascript" type="text/javascript">
	    function dynamicdropdown(listindex)
	    {
	        switch (listindex)
	        {
	        case "Mens Wear" :
	            document.getElementById("subCategory").options[0]=new Option("Shirts","Shirts");
	            document.getElementById("subCategory").options[1]=new Option("T-shirts","T-shirts");
	            document.getElementById("subCategory").options[2]=new Option("Pant","Pant");
	            document.getElementById("subCategory").options[3]=new Option("Blazer","Blazer");
	            document.getElementById("subCategory").options[4]=new Option("Sunglasses","Sunglasses");
	            document.getElementById("subCategory").options[5]=new Option("Shoes/Footwear","Shoes/Footwear");
	            document.getElementById("subCategory").options[6]=new Option("Clothing","Clothing");
	            document.getElementById("subCategory").options[7]=new Option("Watches","Watches");
	            document.getElementById("subCategory").options[8]=new Option("Bags","Bags");
	            break;
	        case "Womens Wear" :
	            document.getElementById("subCategory").options[0]=new Option("Sharee","Sharee");
	            document.getElementById("subCategory").options[1]=new Option("Salwar Kameez","Salwar Kameez");
	            document.getElementById("subCategory").options[2]=new Option("Lehenga","Lehenga");
	            document.getElementById("subCategory").options[3]=new Option("Clothing","Clothing");
	            document.getElementById("subCategory").options[4]=new Option("Jewellery","Jewellery");
	            document.getElementById("subCategory").options[5]=new Option("Sunglasses","Sunglasses");
	            document.getElementById("subCategory").options[6]=new Option("Watches","Watches");
	            document.getElementById("subCategory").options[7]=new Option("Shoes/Footwear","Shoes/Footwear");
	            document.getElementById("subCategory").options[8]=new Option("Bags","Bags");
	            break;
	        case "Baby Care" :
	            document.getElementById("subCategory").options[0]=new Option("Diapers and Wipes","Diapers and Wipes");
	            document.getElementById("subCategory").options[1]=new Option("Feeders","Feeders");
	            document.getElementById("subCategory").options[2]=new Option("Fooding","Fooding");
	            document.getElementById("subCategory").options[3]=new Option("Bath and Skincare","Bath and Skincare");
	            document.getElementById("subCategory").options[4]=new Option("Baby Accessories","Baby Accessories");
	            document.getElementById("subCategory").options[5]=new Option("Baby Oral Care","Baby Oral Care");
	            break;
            case "Grocers Shop" :
	            document.getElementById("subCategory").options[0]=new Option("Fruits and Vegetables","Fruits and Vegetables");
	            document.getElementById("subCategory").options[1]=new Option("Breakfast","Breakfast");
	            document.getElementById("subCategory").options[2]=new Option("Beverages","Beverages");
	            document.getElementById("subCategory").options[3]=new Option("Meat and Fish","Meat and Fish");
	            document.getElementById("subCategory").options[4]=new Option("Snacks","Snacks");
	            document.getElementById("subCategory").options[5]=new Option("Dairy","Dairy");
	            document.getElementById("subCategory").options[6]=new Option("Frozen and Canned","Frozen and Canned");
	            document.getElementById("subCategory").options[7]=new Option("Bread and Bakery","Bread and Bakery");
	            document.getElementById("subCategory").options[8]=new Option("Baking Needs","Baking Needs");
	            document.getElementById("subCategory").options[9]=new Option("Cooking","Cooking");
	        break;
	        case "Home Decorator" :
	            document.getElementById("subCategory").options[0]=new Option("Bed Sheet and Cover","Bed Sheet and Cover");
	            document.getElementById("subCategory").options[1]=new Option("Furniture","Furniture");
	            document.getElementById("subCategory").options[2]=new Option("Pillow and Cushion","Pillow and Cushion");
	            document.getElementById("subCategory").options[3]=new Option("Curtain","Curtain");
	            document.getElementById("subCategory").options[4]=new Option("Nokshi Kantha","Nokshi Kantha");
	            document.getElementById("subCategory").options[5]=new Option("Wall Hanging","Wall Hanging");
	            document.getElementById("subCategory").options[6]=new Option("Table Cloth/ Mat","Table Cloth/ Mat");
	            document.getElementById("subCategory").options[7]=new Option("Door Mat/ Floor Mat","Door Mat/ Floor Mat");
	            document.getElementById("subCategory").options[8]=new Option("LED Light","LED Light");
	            document.getElementById("subCategory").options[9]=new Option("Chandelier","Chandelier");
	            document.getElementById("subCategory").options[10]=new Option("Painting","Painting");
	            document.getElementById("subCategory").options[11]=new Option("Decoration Lamp and Shade","Decoration Lamp and Shade");
	            document.getElementById("subCategory").options[12]=new Option("Photo Frame","Photo Frame");
	            break;
            case "Kitchen and Dining" :
				document.getElementById("subCategory").options[0]=new Option("Refrigerator/ Freezer","Refrigerator/ Freezer");
	            document.getElementById("subCategory").options[1]=new Option("Crockeries","Crockeries");
	            document.getElementById("subCategory").options[2]=new Option("Knife, Scissors and Spoon","Knife, Scissors and Spoon");
	            document.getElementById("subCategory").options[3]=new Option("Roti/ Noodles/ Biscuit Maker","Roti/ Noodles/ Biscuit Maker");
	            document.getElementById("subCategory").options[4]=new Option("Oven","Oven");
	            document.getElementById("subCategory").options[5]=new Option("Pressure Cooker/ Rice Cooker","Pressure Cooker/ Rice Cooker");
	            document.getElementById("subCategory").options[6]=new Option("Cookware Set","Cookware Set");
	            document.getElementById("subCategory").options[7]=new Option("Barbecue Grill","Barbecue Grill");
	            document.getElementById("subCategory").options[8]=new Option("Induction Cooker/ Fryer","Induction Cooker/ Fryer");
	            document.getElementById("subCategory").options[9]=new Option("Multicooker","Multicooker");
	            document.getElementById("subCategory").options[10]=new Option("Mixer and Grinder","Mixer and Grinder");
	            document.getElementById("subCategory").options[11]=new Option("Blender and Juice Maker","Blender and Juice Maker");
	            document.getElementById("subCategory").options[12]=new Option("Frying Pan","Frying Pan");
	        break;
	        case "Sports and Travel" :
	            document.getElementById("subCategory").options[0]=new Option("Exercise and Fitness","Exercise and Fitness");
	            document.getElementById("subCategory").options[1]=new Option("Strength and Traing Equipment","Strength and Traing Equipment");
	            document.getElementById("subCategory").options[2]=new Option("Racket Sport","Racket Sport");
	            document.getElementById("subCategory").options[3]=new Option("Team Sports","Team Sports");
	            document.getElementById("subCategory").options[4]=new Option("Outdoor Activities","Outdoor Activities");
	            document.getElementById("subCategory").options[5]=new Option("Shoes and Clothing","Shoes and Clothing");
	            document.getElementById("subCategory").options[6]=new Option("Fitness Accessories","Fitness Accessories");
	            document.getElementById("subCategory").options[7]=new Option("Sports and Fitness Gadgets","Sports and Fitness Gadgets");
	            document.getElementById("subCategory").options[8]=new Option("Indoor Activities","Indoor Activities");
	            document.getElementById("subCategory").options[9]=new Option("Sports Bage and Accessories","Sports Bage and Accessories");
	            document.getElementById("subCategory").options[10]=new Option("Travel","Travel");
	            document.getElementById("subCategory").options[11]=new Option("Luggage","Luggage");
	            document.getElementById("subCategory").options[12]=new Option("Travel Accessories","Travel Accessories");
	        break;
	        case "Electronics" :
	        	document.getElementById("subCategory").options[0]=new Option("Mobile","Mobile");
	        	document.getElementById("subCategory").options[1]=new Option("Mobile Accessories","Mobile Accessories");
	        	document.getElementById("subCategory").options[2]=new Option("Computer and Laptop / Accessories","Computer and Laptop / Accessories");
	        	document.getElementById("subCategory").options[3]=new Option("Computer Accessories","Computer Accessories");
	        	document.getElementById("subCategory").options[4]=new Option("Camera and Parts","Camera and Parts");
	        	document.getElementById("subCategory").options[5]=new Option("Television","Television");
	        	document.getElementById("subCategory").options[6]=new Option("Air Conditioner","Air Conditioner");
	        	document.getElementById("subCategory").options[7]=new Option("Speaker","Speaker");
	        	document.getElementById("subCategory").options[8]=new Option("Iron","Iron");
	        	document.getElementById("subCategory").options[9]=new Option("Money Checker/ Counting Machine","Money Checker/ Counting Machine");
	        	document.getElementById("subCategory").options[10]=new Option("Parts and Components","Parts and Components");
	        	document.getElementById("subCategory").options[11]=new Option("Android TV Box","Android TV Box");
	        break;
	        case "Beauty and Health" :
	        	document.getElementById("subCategory").options[0]=new Option("Makeup","Makeup");
	        	document.getElementById("subCategory").options[1]=new Option("Personal Care","Personal Care");
	        	document.getElementById("subCategory").options[2]=new Option("Men's Grooming","Men's Grooming");
	        	document.getElementById("subCategory").options[3]=new Option("Skin Care","Skin Care");
	        	document.getElementById("subCategory").options[4]=new Option("Hair Care","Hair Care");
	        	document.getElementById("subCategory").options[5]=new Option("Beauty Services","Beauty Services");
	        	document.getElementById("subCategory").options[6]=new Option("Health and Wellness","Health and Wellness");
	        	document.getElementById("subCategory").options[7]=new Option("Fragrance","Fragrance");
	        	document.getElementById("subCategory").options[8]=new Option("Quick Links","Quick Links");
	        	document.getElementById("subCategory").options[9]=new Option("D-mart","D-mart");
	        break;
	        case "Pet Care" :
	        	document.getElementById("subCategory").options[0]=new Option("Kitten Food","Kitten Food");
	        	document.getElementById("subCategory").options[1]=new Option("Cat Food","Cat Food");
	        	document.getElementById("subCategory").options[2]=new Option("Dog Food","Dog Food");
	        	document.getElementById("subCategory").options[3]=new Option("Other Pet Foods","Other Pet Foods");
	        	document.getElementById("subCategory").options[4]=new Option("Pet Accessories","Pet Accessories");
	        break;
	        case "House Hold" :
	        	document.getElementById("subCategory").options[0]=new Option("Home Appliances","Home Appliances");
	        	document.getElementById("subCategory").options[1]=new Option("Furniture","Furniture");
	        	document.getElementById("subCategory").options[2]=new Option("Tools and Machinery","Tools and Machinery");
	        	document.getElementById("subCategory").options[3]=new Option("Toilet Accessories","Toilet Accessories");
	        	document.getElementById("subCategory").options[4]=new Option("Essentials","Essentials");
	        	document.getElementById("subCategory").options[5]=new Option("Fan","Fan");
	        break;
	        case "Watch and Clock" :
	        	document.getElementById("subCategory").options[0]=new Option("Watch and Clock","Watch and Clock");
	        	break;
	        case "Gift Item" :
	        	document.getElementById("subCategory").options[0]=new Option("Gift Item","Gift Item");
	        break;
	        case "Books" :
	        	document.getElementById("subCategory").options[0]=new Option("Books","Books");
	        break;

	        }
	        return true;
	    }
    </script>

    <!-- Main content -->

    <section class="content">
      <div class="row" >
      	<div class="col-md-10 col-md-offset-1">
          <span><?php echo $productMessage; ?></span>
      		<form action="" method="POST" enctype="multipart/form-data">
	    		<div class="form-group selectpicker category_div" id="category_div"><label>Category:</label>
			        <select class="form-control" data-size="5" id="category" name="category" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);" required>
				        <option value="">Select Category</option>
				        <option value="Mens Wear">Men's Wear</option>
				        <option value="Womens Wear">Women's Wear</option>
				        <option value="Baby Care">Baby Care</option>
				        <option value="Grocers Shop">Grocer’s Shop</option>
				        <option value="Home Decorator">Home Decorator</option>
				        <option value="Kitchen and Dining">Kitchen and Dining</option>
				        <option value="Sports and Travel">Sports and Travel</option>
				        <option value="Electronics">Electronics</option>
				        <option value="Beauty and Health">Beauty and Health</option>
				        <option value="Pet Care">Pet Care</option>
				        <option value="House Hold">House Hold</option>
				        <option value="Watch and Clock">Watch and Clock</option>
				        <option value="Gift Item">Gift Item</option>
				        <option value="Books">Books</option>
			        </select>
			    </div>
			    <div class="form-group selectpicker sub_category_div" id="sub_category_div"><label>Sub-category:</label>
			        <script type="text/javascript" language="JavaScript">
			        document.write('<select class="form-control" name="subCategory" id="subCategory" required><option value="">Select Sub-category</option></select>')
			        </script>
			    </div>
          <input type="hidden" name="size" value="100000000">
	    		<div class="form-group">
	    			<label for="productName">Product Name:</label>
	    			<input id="productName" class="form-control" type="text" name="productName" placeholder="Product Name" required>
	    		</div>
	    		<div class="form-group">
	    			<label>Price:</label>
	    			<input class="form-control" type="text" name="price" placeholder="Price" required>
	    		</div>
	    		<div class="form-group">
	    			<label>Discount:</label>
	    			<input class="form-control" type="text" name="discount" placeholder="Discount">
	    		</div>
	    		<div class="form-group">
	    			<label>Company / Brand:</label>
	    			<input class="form-control" type="text" name="company" placeholder="Company / Brand">
	    		</div>
	    		<div class="form-group">
				  <label >Discription:</label>
				  <textarea class="form-control" name="discription" rows="4" required></textarea>
				</div>
	    		<div class="form-group">
            <h4 class="text-danger">Image size must be ... Height: <span style="font-weight: bold;">291</span> pixels and Width: <span style="font-weight: bold;">255</span> pixels.</h4>
	    			<label>Image1:</label>
	    			<input class="form-control-file" type="file" name="image1" required>
	    		</div>
	    		<div class="form-group">
	    			<label>Image2:</label>
	    			<input class="form-control-file" type="file" name="image2" required>
	    		</div>
	    		<div class="form-group">
	    			<label>Image3:</label>
	    			<input class="form-control-file" type="file" name="image3" required>
	    		</div>
	    		<div class="form-group">
	    			<input class="btn btn-success btn-lg" type="submit" name="productPost" value="Post/Insert Product">
	    		</div>

    		</form>
      </div>
  </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-right">
    <strong> &copy; 2018 SoftCare IT. All rights resereved.</strong><a href="http://www.softcareit.com/"  target="_blank"> SoftCare IT </a>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>



	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->