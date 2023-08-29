<?php 
include 'header.php';
 include 'config.php';

$message='';
if(isset($_GET['delete'])){
            
        $id=$_GET['delete'];
        
        $qry="DELETE FROM customer WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
           
            $message='<div class="alert alert-danger">Data deleted succesfuly!</div>';
        }
        
?>

    <div class="mx-auto col-md-12 col-sm-12" >
    <h2 class="text-center text-primary">Customer details </h2f>
         <?php
        echo $message;
        
        
        
        ?>
    <table class="table border table-striped">
    <tr class="bg-danger text-white">  
        <th>ID</th>
        <th>Name</th>
        <td>Father Name</td>
        <td>Contact</td>
         <td>Emial</td>
          <td>Password</td>
        <td>Address</td>
        <td>Action</td>
        
        </tr>
        
        
        
        
        <?php
       
        
        
        
      $qry="SELECT * FROM customer";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
        ?>        
        <tr>
            <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['fname']; ?></td>
             <td><?php echo $row['contact']; ?></td>
              <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['address']; ?></td>
             <td><a href="customer_details.php?delete=<?php echo $row['id'];  ?>"><span class="text-danger fa fa-trash-o"></span></a>
            <a href="add_customer.php?edit=<?php echo $row['id'];  ?>"><span class="text-success px-4 fa fa-pencil"></span></a></td>
             
        
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