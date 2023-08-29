
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
        
        $qry="SELECT * FROM customer WHERE id='$id'";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
            $name=$row['name'];
             $fname=$row['fname'];
             $cont=$row['contact'];
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
        $cont=$_POST['contact'];
        $address=$_POST['address'];
    
    $qry="UPDATE customer  SET name='$name',fname='$fname',contact='$cont',address='$address' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    
       $message='<div class="alert alert-warning">Recored has been updated successfly!</div>';
        
        
    }
     else if(isset($_POST['id']) && $_POST['id']==0 &&  !empty($_POST['address'])){
          
        
    
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $contact=$_POST['contact'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
    $address=$_POST['address'];
    
    
    
  
    
    $qry="INSERT INTO customer(name,fname,contact,email,password,address)VALUES(' $name','$fname','$contact','$email','$pass','$address')";
    

         
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

    
  
<div class="col-md-9 float-left p-0">

<div class="col-md-8 mx-auto p-0 ">
        
 <div class="" id="kk999" data-offset="34" data-sf="sdf34">
    <div class="text">
        <h1  class="center pading">Add Customer</h1>
       
        </div>
         <?php  
   echo $message;
    ?> 
        <form method="POST" >
            <input  type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group ">  <input class="form-control"  type="text" name="name" value="<?php echo $name; ?>" placeholder="Name">  
            </div>
            <div class="form-group ">  <input class="form-control"  type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Father Name">                </div>
            <div class="form-group "> <input class="form-control"  type="text" name="contact" value="<?php echo $cont; ?>" placeholder="contact">    
            </div>
             <div class="form-group "> <input class="form-control"  type="text" name="email" value="<?php echo $cont; ?>" placeholder="Email">    
            </div>
             <div class="form-group "> <input class="form-control"  type="password" name="password" value="<?php echo $cont; ?>" placeholder="Password">    
            </div>
            <div class="form-group "> <input class="form-control"  type="text" value="<?php echo $address; ?>" name="address" placeholder="Address">    
            </div>
            <?php
            if($update==true):
            ?>
            <input class="btn btn-info btn-block  float-right " name="update" type="submit" value="update">
            <?php else:  ?>
            <input class="btn btn-primary btn-block  float-right  mybutton" type="submit" value="Add">
            <?php endif; ?>
        </form>
    </div>
    
       </div>
    
    
    </div>  
    
  
<?php


include 'footer.php';
?>


