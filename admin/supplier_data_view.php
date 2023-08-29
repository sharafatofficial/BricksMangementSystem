<?php 
include 'header.php';
 include 'config.php';

$message='';
if(isset($_GET['delete'])){
            
        $id=$_GET['delete'];
        
        $qry="DELETE FROM supplier WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
           
            $message='<div class="alert alert-danger">Data deleted succesfuly!</div>';
        }
        
?>

    <div class="mx-auto col-md-12 col-sm-12" >
    
    <h2 class="text-primary text-center"> Supplier List</h2>
         <?php
        echo $message;
        
        
        
        ?>
    <table class="table text-black border table-striped">
    <tr class="bg-danger text-white">  
        <th>ID</th>
        <th>Name</th>
        <td>Father Name</td>
        <td>Contact</td>
        <td>Address</td>
        <td>Action</td>
        
        </tr>
        
        
        
        
        <?php
       
        
        
        
      $qry="SELECT * FROM supplier";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
        ?>        
        <tr>
            <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['fname']; ?></td>
             <td><?php echo $row['cont']; ?></td>
              <td><?php echo $row['address']; ?></td>
             <td><a href="supplier_data_view.php?delete=<?php echo $row['id'];  ?>"><span class="text-danger fa fa-trash-o"></span></a>
            <a href="supplier.php?edit=<?php echo $row['id'];  ?>"><span class="text-success px-4 fa fa-pencil"></span></a></td>
             
        
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