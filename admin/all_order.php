<?php 
include 'header.php';
 include 'config.php';

$message='';
if(isset($_GET['aprove'])){
            
        $id=$_GET['aprove'];
		//echo $id;
        
        $qry="update tb_order SET status=1 WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
           
            $message='<div class="alert alert-success">Order Aproved Successfuly!</div>';
        }
        
?>

    <div class="mx-auto col-md-12 col-sm-12" >
    
    <h2 class="text-center my-4 text-primary">All Orders</h2>
         <?php
        echo $message;
        
        
        
        ?>
    <table class="table border table-striped">
    <tr class="bg-danger text-white">  
        <th>ID</th>
        <th>Date</th>
        <td>Customer</td>
        <td>Quantity</td>
        <td>Price per brick</td>
        <td>Total</td>
        <td>Action</td>
        
        </tr>
        
        
        
        
        <?php
       
        
        
        
      $qry="SELECT * FROM tb_order";
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
            
             <td><a class="btn btn-success" href="?aprove=<?php echo $row['id'];  ?>">Aproved</a>
           
             
        
        </tr>
        <?php
            }
        }else
            echo '';
        ?>        
       
    
    </table>
    
    </div>
  
<?php 
include 'footer.php';



?>