<html>
    <?php
    include 'header.php';
      include'config.php';
    $id=0;
    $update=false;
    $amount=0;
   $message='';
   $sup='';

?>
    <?php
   
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        
        $qry="SELECT * FROM payment_supplier WHERE id='$id'";
        $check=mysqli_query($con,$qry);
        $res=mysqli_num_rows($check);
        
        if($res>0){
            while($row=mysqli_fetch_assoc($check)){
            $date=$row['date'];
             $supplier=$row['supplier'];
             $amount=$row['amount'];
                 print_r($amount);
                      }
                        }
        
                        }
    ?>
    <?php
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $sup=$_POST['supplier'];
        $amount=$_POST['amount'];
   
    
    
    
    $qry="UPDATE payment_supplier  SET supplier='$sup',amount='$amount' WHERE id='$id' ";
    
    $result=mysqli_query($con,$qry);
    
       $message='<div class="alert alert-warning ">Recored has been updated successfly</div>';
        
        
    }
     else if(isset($_POST['id']) && $_POST['id']==0 &&  !empty($_POST['amount'])){
    
    $date=$_POST['date'];
    $supplier=$_POST['supplier'];
    $amount=$_POST['amount'];
    
    $qry="INSERT INTO payment_supplier(date,supplier,amount)VALUES(' $date','$supplier','$amount')";
         
    $result=mysqli_query($con,$qry);
         if($result>0){
     
       $message='<div class="alert alert-success mt-2">Amount has been payed</div>';
         }
         else{
             $message='<div class="alert alert-danger mt-2">Amount not saved</div>';
            
         }
         
     
    }
    ?>

<div class="col-md-12 float-left">
   
    
 <div class="col-md-6 mx-auto">
    <div class="text">
        <h3 class="text-center pb-4">Payment to Supplier</h3>
        
        </div>
          <?php
        echo $message;
        ?>
        <form action="" method="post">
             <div class="form-group">
                <label class="" style=" font-weight:900;">Date</label>
              <input class="form-control"  type="date" value="<?php echo $date; ?>" name="date" placeholder="date">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
        <div  class="form-group">
        <label class="text-bold" style=" font-weight:900;">Supplier</label>
            <select class="form-control" name="supplier">
            <option value="">Select supplier</option>
                <?php   $qry="SELECT * FROM supplier";
                $check=mysqli_query($con,$qry);
                $res=mysqli_num_rows($check);
                if($res>0){
                    while($row=mysqli_fetch_assoc($check))
                    {
                         ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
                 } }
                ?>
            </select> </div>
            
            <div  class="form-group">
            <label class="text-bold" style=" font-weight:900;">Amount</label>
            <input class="form-control"  type="text" name="amount" value="<?php echo $amount ?>" placeholder="amount">    </div>
            <?php
            if($update==true):
            ?>
            <input class="btn btn-info btn-block" name="update" type="submit" value="update">
            <?php else:  ?>
            <input class="btn btn-primary btn-block" type="submit" value="Pay">
            <?php endif; ?>
        </form>
    </div>
    
       </div>
    
      
    
    
    
<?php


include 'footer.php';
?>


