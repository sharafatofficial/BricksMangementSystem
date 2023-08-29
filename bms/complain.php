
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
   
      if(isset($_POST['name'])){
          
        
    
    $name=$_POST['name'];
   
	$email=$_POST['email'];
	$dis=$_POST['dis'];
	
    
    
    
  
    
    $qry="INSERT INTO contact(name,email,dis)VALUES(' $name','$email','$dis')";
    

         
    $result=mysqli_query($con,$qry);
     if($result>0){
         $_SESSION['status']='Thank You For Contact Us';
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
	<h4 class="card-title mt-3 text-center">Contact Us</h4>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full Name" type="text" required="required">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email"  required="required">
    </div> <!-- form-group// -->
  
  
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-address-card"></i> </span>
		</div>
        <textarea class="form-control" name="dis"  required="required" ></textarea>
    </div> <!-- form-group// -->
    
                                       
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Send</button>
    </div> <!-- form-group// -->      
                                                                     
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