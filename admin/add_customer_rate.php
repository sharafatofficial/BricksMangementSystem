
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
  $price='';
    $message='';

?>
    <?php
   
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        
        $qry="SELECT * FROM bricks_rate WHERE id='$id'";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
            $id=$row['id'];
             
             $price=$row['price'];
              
			  
            }
        }
        
    }
    ?>
    <?php
	if(isset($_POST['update'])){
        $id=$_POST['id'];
         $price=$_POST['price'];		
        
    
    
    
    $qry="UPDATE bricks_rate SET price='$price' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    if($result>0){
       $message='<div class="alert alert-warning ">Recored has been updated successfly!</div>';
    }
        else{
            $message='<div class="alert alert-warning ">error!</div>';
        }
        
    }
	//print_r($_POST['rate']); 
   
     else if(isset($_POST['rate'])){
          
        
    
    
    $rate=$_POST['rate'];
    
    
    
  
    
    $qry="INSERT INTO bricks_rate(price)VALUES('$rate')";
    

         
    $result=mysqli_query($con,$qry);
     if($result>0){
        $message='<div class="alert alert-success">Recored has been save!</div>';
     }
         else{
             $message='<div class="alert alert-danger">error!</div>';
         }
        

       $date='';
    $bricks='';
    
    
    
    
     }
    
    
    ?>

    
  
<div class="col-md-9 float-left p-0">

<div class="col-md-10 p-0 float-right">
        
 <div class="justify-content-center" id="kk999" data-offset="34" data-sf="sdf34">
    <div class="text">
        <h1  class="center pading">Add Stock</h1>
       
        </div>
         <?php  
   echo $message;
    ?> 
        <form method="POST" >
            <input  type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Enter Brick Rate</label>
            <div class="form-group ">  <input class="form-control"  type="text" name="price" value="<?php echo $price; ?>" placeholder="Enter Rate">  
            </div>
          
            <?php
            if($update==true):
            ?>
            <input class="btn btn-danger  btn-block" name="update" type="submit" value="update">
            <?php else:  ?>
            <input class="btn btn-primary  float-right  mybutton btn-block" type="submit" value="Add">
            <?php endif; ?>
        </form>
    </div>
    
       </div>
    
    
    </div>  
    
  
<?php


include 'footer.php';
?>


