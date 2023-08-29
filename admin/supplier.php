
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
    $name='';
    $fname='';
    $cont='';
    $address='';
    $message='';

?>
    <?php
   
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        
        $qry="SELECT * FROM supplier WHERE id='$id'";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
            $name=$row['name'];
             $fname=$row['fname'];
             $cont=$row['cont'];
             $address=$row['address'];
            }
        }
        
    }
    ?>
    <?php
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $fname=$_POST['fname'];
        $cont=$_POST['cont'];
        $address=$_POST['address'];
    
    $qry="UPDATE supplier  SET name='$name',fname='$fname',cont='$cont',address='$address' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    
       $message='<div class="alert alert-warning">Recored has been updated successfly!</div>';
        
        
    }
     else if(isset($_POST['id']) && $_POST['id']==0 &&  !empty($_POST['address'])){
          
        
    
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $contact=$_POST['cont'];
    $address=$_POST['address'];
    
    
    
  
    
    $qry="INSERT INTO supplier(name,fname,cont,address)VALUES(' $name','$fname','$contact','$address')";
    

         
    $result=mysqli_query($con,$qry);
     if($result>0){
        $message='<div class="alert alert-success">Recored has been save!</div>';
     }
         else{
             $message='<div class="alert alert-danger">error!</div>';
         }
        

       $name='';
    $fname='';
    $contact='';
    $address='';
    
    
    
    
     }
    
    
    ?>

    
  
<div class="col-md-12 float-left p-0">

        
 <div class=" col-md-6 mx-auto" id="kk999" data-offset="34" data-sf="sdf34">
    <div class="text">
        <h1  class="center pading">Add Supplier</h1>
       
        </div>
         <?php  
   echo $message;
    ?> 
        <form method="POST" >
            <input  type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group ">
            <label style="font-weight:bold;">Name</label>
              <input class="form-control"  type="text" name="name" value="<?php echo $name; ?>" placeholder="Name">  
            </div>
            <div class="form-group ">
            <label style="font-weight:bold;">Father's Name</label>
              <input class="form-control"  type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Father Name">                </div>
            <div class="form-group ">
            <label style="font-weight:bold;">Contact</label> 
            <input class="form-control"  type="text" name="cont" value="<?php echo $cont; ?>" placeholder="contact">    
            </div>
            <div class="form-group "> 
            <label style="font-weight:bold;">Address</label>
            <input class="form-control"  type="text" value="<?php echo $address; ?>" name="address" placeholder="Address">    
            </div>
            <?php
            if($update==true):
            ?>
            <input class="btn btn-info  btn-block" name="update" type="submit" value="update">
            <?php else:  ?>
            <input class="btn btn-primary btn-block mybutton" type="submit" value="Add">
            <?php endif; ?>
        </form>
    </div>
    
       </div>
    
    
    </div>  
    
  
<?php


include 'footer.php';
?>


