<?php 
include 'header.php';
 include 'config.php';

$message='';
if(isset($_GET['delete'])){
            
        $id=$_GET['delete'];
        
        $qry="DELETE FROM stock WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
           
            $message='<div class="alert alert-danger">Data deleted succesfuly!</div>';
        }
        
?>

    <div class="mx-auto col-md-12 col-sm-12" >
         <?php
        echo $message;
        
        
        
        ?>
    <table class="table text-black border table-striped">
    <tr class="bg-dark text-white">  
       
        </tr>
        
        
        
        
        <?php
       
        
        $all=0;
        
      $qry="SELECT * FROM  stock";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
				
				$brick=$row['bricks'];
		$all=$all+$brick;
       
		
            }
        }else
            echo '';
        ?>        
         
        <?php
       
        
        $sale=0;
        
      $qry="SELECT * FROM sale";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
				
				$quan=$row['quantity'];
		$sale=$sale+$quan;
       
		
            }
        }else
            echo '';
        ?>        
       
    
    </table>
    
    </div>
    <div class="col-md-3 bg-primary mx-auto text-white p-4">
   <h2 class="text-center ">Remaining Stock</h2>
   <h2 class="text-center"><?php echo $total= $all-$sale;?></h2>
  </div>
<?php 
include 'footer.php';



?>