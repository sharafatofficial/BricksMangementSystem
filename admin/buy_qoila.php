<html>
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
    $quality='';
    $quantity="";
    $price="";
    $total="";
    $message="";
?>
    <?php
   
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        
        $qry="SELECT * FROM sale WHERE id='$id'";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
            $date=$row['date'];
             $customer=$row['customer'];
             $quality=$row['quality'];
                 $quantity=$row['quantity'];
                 $price=$row['price'];
                 $tatal=$row['total'];
            }
        }
        
    }
    ?>
    <?php
    if(isset($_POST['update'])){
        $id=$_POST['id'];
         $date=$_POST['date'];		
         $customer=$_POST['customer'];
    	$quality=$_POST['quality'];
    	$quantity=$_POST['quantity'];
    	$price=$_POST['price'];
    	$total=$_POST['total'];
    
    
    
    $qry="UPDATE sale  SET customer='$customer',date='$date',quality='$quality',quantity='$quantity',price='$price',total='$total' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    if($result>0){
       $message='<div class="alert alert-warning ">Recored has been updated successfly!';
    }
        else{
            $message='<div class="alert alert-warning ">error!';
        }
        
    }
     else if(isset($_POST['id']) && $_POST['id']==0 &&  !empty($_POST['total'])){
          
        
    
    $date=$_POST['date'];
    $supplier=$_POST['supplier'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $total=$_POST['total'];
    
    
    
  
    
    $qry="INSERT INTO buy_qoila(date,supplier,quantity,price,total)VALUES(' $date','$supplier',' $quantity','  $price','$total')";
    

         
    $result=mysqli_query($con,$qry);
       if($result>0){
        $message='<div class="alert alert-success">Recored has been save!</div>';
    }
	else{
		 $message='<div class="alert alert-warning">error!</div>';
		}
    }

    ?>
    

<div class=" col-md-8 float-right">
    
    </div>
<div class="float-left col-md-12 ">
    
        
 <div class="col-md-7 mx-auto ">
    <div class="text">
        <h1  class="center pading">Buy Quila</h1>
        
        </div>
        <?php
        echo $message;
        ?>
        <form action="" method="post">
             <div  <div class="form-group mb-0">
              <label for="exampleInputEmail1" style=" font-weight:900;">Date</label>
             <input class="form-control" type="date" value="<?php echo $date; ?>" name="date" placeholder="date">    </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
        <div class="form-group mb-0">
        <label for="exampleInputEmail1" style=" font-weight:900;">Supplier</label>
            <select class="form-control" name="supplier">
            <option value="">Select Supplier</option>
                <?php   $qry="SELECT * FROM supplier";
                
                $check=mysqli_query($con,$qry);
                $res=mysqli_num_rows($check);
                if($res>0){
                    while($row=mysqli_fetch_assoc($check))
                    {?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php } }?>
            </select> </div>
            
             <div  class="form-group mb-0">
             <label for="exampleInputEmail1" style=" font-weight:900;" class="font-weight-bolder">Qunatiy</label>
             <input class="form-control qunt"   type="text" value="<?php echo $quantity; ?>" name="quantity" placeholder="Quantity">    </div>  
            <div  class="form-group mb-0">
            <label for="exampleInputEmail1" style=" font-weight:900;">Price Per Ton</label>
            <input class="form-control pri"   type="text" value="<?php echo $price; ?>" name="price" placeholder="Price">    </div>
            <div  class="form-group mb-0">
            <label for="exampleInputEmail1" style=" font-weight:900;">Total Amount</label>
            <input class="form-control total"   type="text" value="<?php echo $total; ?>" name="total" placeholder="Total">    </div>
            <?php
            if($update==true):
            ?>
            <input class="btn btn-info mx-3 btn-block" name="update" type="submit" value="update">
            <?php else:  ?>
            <input class="btn btn-primary mx-3 btn-block my-2" type="submit" value="Buy">
            <?php endif; ?>
        </form>
    </div>
    
       </div>
    
    <script>
    $(document).ready(function(){
	
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


