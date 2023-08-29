
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
    $date='';
    $bricks='';
   $itan='';
    $message='';

?>
    <?php
   
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        
        $qry="SELECT * FROM stock WHERE id='$id'";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
            $id=$row['id'];
             $date=$row['date'];
             $itan=$row['bricks'];
              
			  
            }
        }
        
    }
    ?>
    <?php
	$bricks='';
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $date=$_POST['date'];
        $bricks=$_POST['count'];
		
		    
    $qry="UPDATE stock  SET date='$date',bricks='$bricks' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    
       $message='<div class="alert alert-warning">Recored has been updated successfly!</div>';
        
        
    }
     else if(isset($_POST['id']) && $_POST['id']==0 &&  !empty($_POST['date'])){
          
        
    
    $date=$_POST['date'];
    $bricks=$_POST['count'];
    
    
    
  
    
    $qry="INSERT INTO stock(date,bricks)VALUES(' $date','$bricks')";
    

         
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
            
            <div class="form-group ">  <input class="form-control"  type="date" name="date" value="<?php echo $date; ?>" placeholder="">  
            </div>
            <div class="form-group ">  <input class="form-control"  type="text" name="count" value="<?php echo $itan; ?>" placeholder="Enter Stock">                </div>
            <?php
            if($update==true):
            ?>
            <input class="btn btn-warnig btn-block" name="update" type="submit" value="update">
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


