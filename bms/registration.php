
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
    $name='';
    $fname='';
    $cont='';
    $address='';
    $message='';
    $icon='';
?>
   
    <?php
	
	//print_r($_POST);
   
      if(isset($_POST['address'])){
          
        
    
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
    
    
    
  
    
    $qry="INSERT INTO customer(name,fname,contact,email,password,address)VALUES(' $name','$fname','$contact','$email','$pass','$address')";
    

         
    $result=mysqli_query($con,$qry);
     if($result>0){
         $_SESSION['status']='You Are Registered Successfuly';
		  $_SESSION['code']='success';
		 // header('location: index.php');
     }
         else{
                $_SESSION['status']='You Are NOt Registered ';
		        $_SESSION['code']='error';
				//header('location: registration.php');
         }
        

       $name='';
    $fname='';
    $contact='';
    $address='';
    
    
    
    
     }
    
    
    ?>
    <div class="col-md-12 float-left p-0 position-relative">
    <img src="images/4.jpg" width="100%" height="516px" >
<div class="container position-absolute " style="opacity:0.8; top:0; right:440px; ">

<?php 
//echo $message;
?>




<div class="card bg-light pb-0">
<article class="card-body mx-auto py-0" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full Name" type="text" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="fname" class="form-control" placeholder="Father Name" type="text"  required="required">
    </div> <!-- form-group// -->
      <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		
    	<input name="contact" class="form-control" placeholder="Phone number" type="text"  required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email"  required="required">
    </div> <!-- form-group// -->
  
  
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Create Password" type="password"  required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-address-card"></i> </span>
		</div>
        <input class="form-control" placeholder="Address"  name="address" type="text"  required="required">
    </div> <!-- form-group// -->
                                       
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a  class="btn btn-danger"href="<?php echo site_url?>/login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
</div>




  <script src="sweetalert.min.js"></script>
<?php
include'footer.php';
?>