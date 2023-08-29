<?php
   session_start();
   include'config.php';
    
        if(isset($_POST['pass'])){        
    $email =mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['pass']);
           
        
            
             
$qry="SELECT id,name,email,password FROM customer WHERE email='$email' AND  password='$password' ";
     $result=mysqli_query($con,$qry);

   
    if(mysqli_num_rows($result)==1)
    { 
        If(isset($_POST['check'])){
            $rem=mysqli_real_escape_string($con,$_POST['check']); 
           $name1="user";
            $pass="security";
            
            setcookie($name1,$name,time() +(86400 * 30));
            setcookie($pass,$password,time() +(86400 * 30));
        }
        
		
		$id=mysqli_fetch_assoc($result);
		$info=$id['id'];
		$name=$id['name'];
		//echo $name;
		
		//exit;
     //  echo '<pre>';  print_r ($name);echo '</pre>';
       // echo '<pre>';  print_r ($_COOKIE);echo '</pre>';
    // echo '<pre>';  print_r ($_COOKIE);echo '</pre>';
       // die();
      ?>
<?php
       $_SESSION['email']=$email;
	    $_SESSION['id']=$info;
		 $_SESSION['name']=$name;
		// print_r($_SESSION);
		 //exit;
      header('location:index.php');
        
    }
    else{
          $_SESSION['status']='INVALID......... USER NAME OR PASSWORD'; 
    $_SESSION['code']='error';
    }
        }


?>

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
    <body>
    
<div class="main" style="position:reletive;">
    <img src="images/6.jpg" width="100%" height="625px">
<div class="container position-absolute " style="opacity:0.8; top:0; right:440px; "">
 <div class="form px-1 bg-light rounded">
    <div class="text">
        <h3  class="center pading text-danger">Log in</h3>
        
        </div>
        <form method="post">
        <div class="form-group ">
         <label for="exampleInputEmail1" class="">User Name</label>
        <input class="form-control"  type="text" name="email" value="" placeholder="Email">    </div>
        <div class="form-group"> 
         <label for="exampleInputEmail1" class="">Password</label>
        <input class="form-control"  type="password" name="pass" value="" placeholder="Password">    </div>
        <input class="btn btn-danger mt-3 col-md-12" type="submit" value="login" >
            
        </form>
    </div>
    
       </div>
    
    
    </div>  
    
    
    
       <script src="sweetalert.min.js"></script>
     <script> 
    swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['code']; ?>",
  button: "ok",
});
    
     
     </script>
     
	<?php  
	unset($_SESSION['status']);
	unset($_SESSION['code']);
		
	 exit;




?>
        
    </body>
</html>

  