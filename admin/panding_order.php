<?php 
include 'header.php';
 include 'config.php';

$message='';
if(isset($_GET['delete'])){
            
        $id=$_GET['delete'];
        
        $qry="DELETE FROM sale WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
           
            $message='<div class="alert alert-danger">Data deleted succesfuly!</div>';
        }
        
?>

    <div class="mx-auto col-md-12 col-sm-12" >
    <h2 class="text-center my-4 text-primary">Panding Orders</h2>
    
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
        
        </tr>
        
        
        
        
        <?php
       
        
        
        
      $qry="SELECT * FROM tb_order WHERE status=1";
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
          </td>
             
        
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