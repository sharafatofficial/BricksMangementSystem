<?php
include'function.php';
?>
<?php 
$logout=false;
session_start();
if(isset($_SESSION['id'])){
	$logout=true;
	 $id=$_SESSION['id'];
	
	}
//echo $logout;

?>


<html>
<head>
     <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    
     <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    
</head>
<body class="bg-white">

     <nav class="navbar navbar-expand-lg navbar-light bg-danger py-0">
  <a class="navbar-brand text-white" href="#"><img src="logo.jpg" width="100px" height="40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link text-white px-3" href="<?php echo site_url?>/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white px-3" href="<?php echo site_url?>/order.php">Place Order</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link text-white px-3" href="<?php echo site_url?>/about.php">About Us</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white px-3" href="<?php echo site_url?>/contact_us.php">Contact Us</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-white px-3" href="<?php echo site_url?>/all_order.php">Your Order</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-white px-3" href="<?php echo site_url?>/complain.php">Complain</a>
      </li>
    </ul>
    <?php if($logout==true){ ?>
    <a class="btn btn-primary" onClick="swal('Yor Are Logout','success' )" href="<?php echo site_url?>/action.php?logout=logout"><i class="fa fa-power-off"></i></a>
     <?php }else{ ?>
    <a class="btn btn-light m-1"  href="<?php echo site_url?>/registration.php">Sign Up </a>
    <a class="btn btn-light"  href="<?php echo site_url?>/login.php">Login </a>
    <?php }?>
  </div>
</nav>
            

   