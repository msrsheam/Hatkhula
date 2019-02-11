  <?php

   include '../config.php';
  $userType = $_SESSION['userType'];
  $sql = "select * from $userType ";
  $sql1 = "select name,type from subadmin";
  $query = mysqli_query($con,$sql);
  $query1 = mysqli_query($con,$sql1);
  $result = mysqli_fetch_array($query);

  $countSubadmin = mysqli_num_rows($query1);

  $sql2 = "select productId from product where postedBy = 'admin' ";
  $query2 = mysqli_query($con,$sql2);
  $countProduct = mysqli_num_rows($query2);

  //for total merchant
  $sqlForMerchant = "select mId from merchant";
  $queryForMerchant = mysqli_query($con,$sqlForMerchant);
  $countForMerchant = mysqli_num_rows($queryForMerchant);
    //for registration notification
    $sqlForNewMerchant = "select mId from merchant where status = 0 ";
    $queryForNewMerchant = mysqli_query($con,$sqlForNewMerchant);
    $countForNewMerchant = mysqli_num_rows($queryForNewMerchant);
    //for New product notification
    $sqlForNewProduct = "select productId from product where status = 0 ";
    $queryForNewProduct = mysqli_query($con,$sqlForNewProduct);
    $countForNewProduct = mysqli_num_rows($queryForNewProduct);
    //users message
    $sqlForContact = "select * from contact";
    $queryForContact = mysqli_query($con,$sqlForContact);
    $countForContact = mysqli_num_rows($queryForContact);
    //New Orders
    $sqlForNewOrder = "select oId from orders inner join odetails on orders.oId = odetails.oId inner join product on odetails.productId = product.productId where oStatus = 0 and postedBy = 'admin'";
    $queryForNewOrder = mysqli_query($con,$sqlForNewOrder);
    $countForNewOrder = mysqli_num_rows($queryForNewOrder);
  ?>
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
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="profile.php">
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

         <li class="menu">
          <a href="addAdmin.php">
            <i class="fa fa-user-plus"></i> <span>Create Admin</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Own Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="productInsert.php"><i class="fa fa-circle-o"></i> Post/Insert</a></li>
            <li><a href="viewOwnProduct.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-check-circle"></i>
            <span>Approve</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-danger pull-right"><?php if(($countForNewMerchant+$countForNewProduct)>0){echo $countForNewMerchant+$countForNewProduct;} ?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="newMerchantPost.php"><i class="fa fa-circle-o"></i> Merchant Post &nbsp;&nbsp;<span class="label label-danger"><?php if($countForNewProduct>0){echo $countForNewProduct;} ?></span></a></li>
            <li><a href="newMerchantRequest.php"><i class="fa fa-circle-o"></i> New Merchant &nbsp;&nbsp;<span class="label label-danger"><?php if($countForNewMerchant>0){echo $countForNewMerchant;} ?></span></a></li>
          </ul>
        </li>

        <li class="treeview ">
          <a href="#">
            <i class="fa fa-trash"></i>
            <span>Delete</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="deleteMerchant.php"><i class="fa fa-circle-o"></i> Merchant User</a></li>
          </ul>
        </li>

        <li class="menu">
          <a href="ad.php">
            <i class="fa fa-audio-description"></i> <span>Advertisement Panel</span>
          </a>
        </li>

        <li class="menu">
          <a href="homeEdit.php">
            <i class="fa fa-edit"></i> <span>Home Edit Panel</span>
          </a>
        </li>


         <!-- <li class="menu">
          <a href="orderShow.php">
            <i class="fa fa-shopping-cart"></i> <span>Order</span>&nbsp;&nbsp;&nbsp;<span class="label label-danger"><?php if($countForNewOrder>0){echo $countForNewOrder;} ?></span>
          </a>
        </li> -->

        <li class="menu">
          <a href="messageShow.php">
            <i class="fa fa-envelope"></i> <span>Messages &nbsp;&nbsp;&nbsp;<span class="label label-danger"><?php if($countForContact>0){echo $countForContact;} ?></span></span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
