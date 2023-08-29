<?php 
include 'header.php';
 include 'config.php';

$message='';

      
	   if(isset($_GET['aprove'])){
            
        $sid=$_GET['aprove'];
		//echo $id;
        
        $qry=" DELETE  FROM tb_order WHERE id='$sid'";
            
        $check=mysqli_query($con,$qry);
           
 $_SESSION['status']=' ORDER DELETED';
		  $_SESSION['code']='warning';     
		
		
		     }
	  
	  
	    
?>

    <div class="mx-auto col-md-12 col-sm-12" >
    
    <h2 class="text-center my-4 text-primary">YOUR ORDERS</h2>
         <?php
        echo $message;
        
        
        
        ?>
    <table class="table border table-striped">
    <tr class="bg-danger text-white">  
        <th># Order</th>
        <th>Date</th>
        <td>Customer</td>
        <td>Quantity</td>
        <td>Price per brick</td>
        <td>Total</td>
        <td>Action</td>
        
        </tr>
        
        
        
        
        <?php
		//print_r($_SESSION);
		
       if(isset($_SESSION['id'])){
            
        $id=$_SESSION['id'];
        
        
        
      $qry="SELECT * FROM tb_order WHERE cid=$id ";
        $res=mysqli_query($con,$qry);
		
        $ab=mysqli_num_rows($res);
		
       
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
				
			
        ?>        
        <tr>
            <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['quntity']; ?></td>
             <td><?php echo $row['price']; ?></td>
             <td><?php echo $row['total']; ?></td>
            
             <td><a class="btn btn-success" href="?aprove=<?php echo $row['id'];  ?>">Delete</a>
           
             
        
        </tr>
        <?php
            }
        }else
            echo '';
			
	   }
	   
	   
	   
        ?>        
       
    
    </table>
    
    </div>
   
    
     <script>
    $(document).ready(function(){
		//alert();
		var action='id=tuheedjutt';
		$.ajax({
			
			url:'ajax.php',
			type:"post",
			data:action,
			cache:false,
			 success: function(output)
			 {
				 //alert(output);
				 },
				 error: function (xhr, ajaxOptions, thrownError)
					{
						
					}
		});
		
	});
					
    </script>
    
    <script src="sweetalert.min.js"></script>

<?php 
include 'footer.php';

?>
