 <html>
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
    $invoice="";
    $quality='';
    $quantity="";
    $price="";
    $tat="";
    $message="";
	$customer='';
?>
    <?php
   
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        
        $qry="SELECT s.*,c.name FROM sale s, customer c WHERE c.id=s.customer";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
			//print_r($row);
            $date=$row['date'];
             $customer=$row['name'];
			
                 $quantity=$row['quantity'];
                 $price=$row['price'];
                 $tat=$row['total'];
				  
				  
            }
        }
        
    }
    ?> 
    <?php
	//print_r($_POST);
    if(isset($_POST['update'])){
    $id=$_POST['id'];
    $customer=$_POST['customer'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $total=$_POST['total'];
    
    
    
    $qry="UPDATE sale  SET customer='$customer',quantity='$quantity',price='$price',total='$total' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    if($result>0){
       $message='<div class="alert alert-warning ">Recored has been updated successfly!</div>';
    }
        else{
            $message='<div class="alert alert-warning ">error!</div>';
        }
    }
	
     else if(isset($_POST['id']) && $_POST['id']==0 &&  !empty($_POST['total'])){
          
        
    
    $date=$_POST['date'];
    $customer=$_POST['customer'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $total=$_POST['total'];
    
    
    
  
    
    $qry="INSERT INTO sale(date,customer,quantity,price,total)VALUES(' $date','$customer',' $quantity','  $price','$total')";
    

         
    $result=mysqli_query($con,$qry);
     if($result>0){
        $message='<div class="alert alert-success">Recored has been save!</div>';
    }
	else{
		 $message='<div class="alert alert-warning">error!</div>';
		}
	 }
    ?>
        
        



<div class="float-left col-md-12 ">
 <div class="col-md-7 mx-auto ">
    <div class="text"><h1  class="center pading">Sale Bricks</h1> </div>       
    
      <?php echo $message;?>
        <form action="" method="post">
        
            <div class="form-group mb-0">
            <label style=" font-weight:900;">Date</label>
            <input class="form-control" type="date" value="<?php echo $date; ?>" name="date" placeholder="date">    </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
        <div class="form-group mb-0">
          <label for="exampleInputEmail1" style=" font-weight:900;">Customer</label>
                    <select class="form-control" name="customer" value=" <?php echo $customer; ?>">
            <option value="">Select Customer</option>
                <?php   $qry="SELECT * FROM customer";
                
                $check=mysqli_query($con,$qry);
                $res=mysqli_num_rows($check);
                
                if($res>0){
                    
                    while($row=mysqli_fetch_assoc($check))
                    {
                         ?>
                
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
                 } }
                ?>
                
                
            </select> </div>
            
             <div  class="form-group mb-0">
              <label for="exampleInputEmail1" style=" font-weight:900;">Quantity</label>
             <input class="form-control qunt"   type="text" value="<?php echo $quantity; ?>" name="quantity" placeholder="Quantity">    </div>
              
            <div  class="form-group mb-0">
              <label for="exampleInputEmail1" style=" font-weight:900;">Price per Brick</label>
            <input class="form-control pri"   type="text" value="<?php echo $price; ?>" name="price" placeholder="Price per brick">    </div>
            
            <div  class="form-group mb-0">
              <label for="exampleInputEmail1" style=" font-weight:900;">Total Amount</label>
            <input class="form-control total"   type="text" value="<?php echo $tat; ?>" name="total" placeholder="Total">    </div>
            <?php
            if($update==true):
            ?>
            <input class="btn btn-info btn-block " name="update" type="submit" value="Update">
            <?php else:  ?>
            <input class="btn btn-primary btn-block" type="submit" value="Sale">
            <?php endif; ?>
        </form>
    </div>
    
       </div>
   
    
    
     <script>
    $(document).ready(function(){
	//alert()
		$('.qunt,.pri').keyup(function(){
	 var qunt = $('.qunt').val();
	 var pri = $('.pri').val();
	 var total = parseFloat(qunt)*parseFloat(pri);
	 //alert(total);
	 $('.total').val(total);
		});
		
		
	});
    
    
    
    
    
    </script>
    
    
<?php


include 'footer.php';
?>


