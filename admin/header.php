<?php
session_start();
include'function.php';

if(!isset($_SESSION['email'])){
    header('location:login.php');
    exit;
}





?>



<html>
<head>
     <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    
     <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="adstyle.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    
</head>
<body class="bg-white">
   <header class="header">
          <nav class="navbar navbar-toggleable-md navbar-light py-2  ">
           
             
          
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown messages-menu">
                 
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    
                </div>
              </li>
              <li class="nav-item dropdown notifications-menu">
             
                 <a class="btn btn-danger" href="<?php echo site_url?>/action.php?logout=logout"><i class="fa fa-power-off"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  
                </div>
              </li>
              
              <li class="nav-item dropdown  user-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                </a>
                
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="main">
        
          <div class="sidebar left float-left">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="admin.png" width="350px" height="350px">
                <h5 class="text-white mt-2 ml-1">Admin</h5></i>
              </div>
              <div class="pull-left info">
               
              </div>
            </div>
            <ul class="list-sidebar bg-defoult">
             <li> <a href="<?php echo site_url ?>/index.php"  class="collapsed active" >
              <i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> <span class="fa fa-chevron-left pull-right"></span> </a>
            
          </li>
            
             <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="fa fa-user"></i> <span class="nav-label">Supplier</span> <span class="fa fa-chevron-left pull-right"></span> </a>
            <ul class="sub-menu collapse" id="products">
              <li class="active"><a href="<?php echo site_url ?>/supplier.php">Add Supplier</a></li>
                  <li class="active"><a href="<?php echo site_url ?>/supplier_data_view.php">supplier info</a></li>
                    <li><a href="<?php echo site_url?>/payment_supplier.php">Supplier Payment</a></li>
                  <li><a href="<?php echo site_url?>/supplier_payment_view.php">Payment Details</a></li>
            </ul>
          </li>
              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> Qoila </span> <span class="fa fa-chevron-left pull-right"></span> </a>
              <ul class="sub-menu collapse" id="dashboard">
                <li><a href="<?php echo site_url?>/buy_qoila.php">Buy Qoila</a></li>
                  <li><a href="<?php echo site_url?>/qoila_details.php">Qoila Details</a></li>
              </ul>
            </li>
            
           
         
          <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fa fa-table"></i> <span class="nav-label">
          Stock</span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="tables" >
            <li><a href="<?php echo site_url?>/add_stock.php"> Add Stock</a></li>
            <li><a href="<?php echo site_url ?>/stock_details.php"> Stock Details</a></li>
             <li><a href="<?php echo site_url ?>/remaining_stock.php">Remaining Stock</a></li>
          </ul>
        </li>
        
        
        
        
        <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" ><i class="fa fa-shopping-cart"></i> <span class="nav-label">Customer</span><span class="fa fa-chevron-left pull-right"></span></a>
        <ul  class="sub-menu collapse" id="e-commerce" >
          <li><a href="<?php echo site_url ?>/add_customer.php">Add customer</a></li>
          <li><a href="<?php echo site_url ?>/customer_details.php"> Customer Details</a></li>
        </ul>
      </li>
      
      
        <li> <a href="#" data-toggle="collapse" data-target="#e-sale" class="collapsed active" ><i class="fa fa-money"></i> <span class="nav-label">Sale</span><span class="fa fa-chevron-left pull-right"></span></a>
        <ul  class="sub-menu collapse" id="e-sale" >
          <li><a href="<?php echo site_url ?>/sale_bricks.php">Sale Brick</a></li>
          <li><a href="<?php echo site_url ?>/sale_details.php">Sale Details</a></li>
        </ul>
      </li>
      
      <li> <a href="<?php echo site_url ?>/add_customer_rate.php?edit=1" class="collapsed active">
      <i class="fa fa-money"></i> <span class="nav-label">Customer Rate</span>
      <span class="fa fa-chevron-left pull-right"></span></a>
        
      </li>
      
       <li> <a href="#" data-toggle="collapse" data-target="#e-orders" class="collapsed active" >
       <i class="fa fa-money"></i> <span class="nav-label">Orders</span><span class="fa fa-chevron-left pull-right"></span></a>
        <ul  class="sub-menu collapse" id="e-orders" >
          <li><a href="<?php echo site_url ?>/all_order.php">All Orders</a></li>
          <li><a href="<?php echo site_url ?>/aprove_order.php">Aprove Orders</a></li>
          <li><a href="<?php echo site_url ?>/panding_order.php">Panding Orders</a></li>
        </ul>
      </li>
      
        
      <li> <a href="<?php echo site_url ?>/feed.php" class="collapsed active">
      <i class="fa fa-money"></i> <span class="nav-label">Feeedback</span>
      <span class="fa fa-chevron-left pull-right"></span></a>
        
      </li>
     
    </ul>
    
    </div>
            

    <div class="float-right col-md-9 col-sm-12" >