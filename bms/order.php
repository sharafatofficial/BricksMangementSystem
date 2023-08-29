    <?php
	

	
    include 'header.php';
      include'config.php';
	 // print_r($_SESSION);
	  if(!isset($_SESSION['email'])){
		  
		  
	 $_SESSION['status']='You Are Not Login ......Please Login'; 
    $_SESSION['code']='error';
	 //print_r($_SESSION);
	 ?>
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
}



?>
   
    <?php
	
	
	//print_r($_SESSION);
if(isset($_SESSION['id'])){
	
	$info=$_SESSION['id'];
	 $name=$_SESSION['name'];
	
	
	}
	  
    //$name='';
  
	
	//print_r($_POST);
   
      if(isset($_POST['date'])){
          
        
    $id=$_POST['id'];
    $date=$_POST['date'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $purpose=$_POST['purpose'];
	$quantity=$_POST['qunt'];
	$price=$_POST['price'];
	$total=$_POST['total'];
    
    
    
  
    
    $qry="INSERT INTO tb_order(cid,date,name,age,purpose,quntity,price,total)VALUES('$id','$date','$name','$age','$purpose','$quantity',' $price','$total')";
    

         
   if( $result=mysqli_query($con,$qry)){
	   
	    $qry="INSERT INTO sale(date,customer,quantity,price,total)VALUES(' $date','$name',' $quantity','  $price','$total')";
	   $result=mysqli_query($con,$qry);
	   
	   
	   
	   }

     if($result>0){
        $_SESSION['status']=' Order Confirmed';
		  $_SESSION['code']='success';
     }
         else{
             $_SESSION['status']=' Order Not Confirmed';
		  $_SESSION['code']='error';
         }
        

      
    
    
    
    
     }
//print_r($_POST);    
    
    ?>
    <div class="col-md-12 p-0 float-left position-relative">
    <img src="images/4.jpg" width="100%" height="571px" >
<div class="container position-absolute " style="opacity:0.9; top:0; right:440px; ">

<?php 
//echo $message;


$q="SELECT * FROM bricks_rate";
$res=mysqli_query($con,$q);
//print_r($res);
 $ab=mysqli_num_rows($res);
// print_r($ab);
if($ab>0){
	$p=mysqli_fetch_assoc($res);
	//print_r($p);
	 $prc=$p['price'];
	
	 
	
	
	}

?>




<div class="card bg-light pb-0">
<article class="card-body mx-auto py-0" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center text-primary" style=" font-weight:bolder" >Order Now</h4>
	<form method="post">
	<div class="form-group input-group">
		<?php // echo date('d/m/Y'); ?>
        <input name="id" class="form-control" style=" font-weight:600"  placeholder="" value="<?php echo $info;?>" type="hidden">
        <input name="date" class="form-control"  required="required" style=" font-weight:600" value="<?php echo date('d/m/Y'); ?>"  type="date">   
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		
        <input name="name" class="form-control" style=" font-weight:600" value="<?php echo $name; ?>"  placeholder="Name" type="text">
    </div> <!-- form-group// -->
      <div class="form-group input-group">
    
		
    	<input name="age" class="form-control age" style=" font-weight:600"  placeholder="Age" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	
        <input name="purpose" class="form-control" style=" font-weight:600"  placeholder="Purpose" type="text">
    </div> <!-- form-group// -->
  
  
    <div class="form-group input-group">
    	
        <input class="form-control qunt" style=" font-weight:600" name="qunt" placeholder="Quantity" type="text">
        <input type="hidden" name="price" class="price" value="<?php echo $prc; ?>" />
    </div> <!-- form-group// -->
    <div class="form-group input-group">
        <input class="form-control total" style=" font-weight:600"  placeholder="Total"  name="total" type="text">
    </div> <!-- form-group// -->
                                       
    <div class="form-group input-group">
        <button type="submit"   class="btn btn-primary btn-block co">Confirm Order</button>
    </div> <!-- form-group// -->      
    </div>
                                                                  
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
</div>
<script>
$(document).ready(function(e) {
    

	$('.qunt').keyup(function(){
	var qunt=$('.qunt').val();
	var price=$('.price').val();
   var total= parseFloat(qunt)*parseFloat(price);
   //alert(total);
   $('.total').val(total);
	
	});
	
	$('.age').keyup(function(){
	var age=$('.age').val();
	//alert(age);
	var chk=parseFloat(age);
	var con='17';
	//alert(con);
	if(chk<=con){
		$('.co').hide();
		}
		else{
			$('.co').show();
			}
		
	//alert(chk);
	});
	
	});
</script>



  <script src="sweetalert.min.js"></script>
<?php

include'footer.php';
?>