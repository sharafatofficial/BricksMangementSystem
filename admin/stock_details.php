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
    <h2 class="text-center text-primary">Stock Details</h2>
         <?php
        echo $message;
        
        
        
        ?>
    <table class="table border table-striped">
    <tr class="bg-danger text-white">  
        <th>ID</th>
        <th>Date</th>
        <td>Bricks</td>
        <td>Action</td>
        
        </tr>
        
        
        
        
        <?php
       
        
        
        
      $qry="SELECT * FROM stock";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
        ?>        
        <tr>
            <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['bricks']; ?></td>
            
             <td><a href="stock_details.php?delete=<?php echo $row['id'];  ?>"><span class="text-danger fa fa-trash-o"></span></a>
            <a href="add_stock.php?edit=<?php echo $row['id'];  ?>"><span class="text-success px-4 fa fa-pencil"></span></a></td>
             
        
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