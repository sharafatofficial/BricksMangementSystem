<?php
include'header.php';
include'config.php';

?>

  <div class="col-md-12 float-left">
  
        
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
       
        $allsold=0;
        $sold=0;
        $asale=0;
      $qry="SELECT * FROM sale";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
				
				$sold=$row['quantity'];
				$chash=$row['total'];
		$allsold=$allsold+$sold;
        $asale=$asale+$chash;
		
            }
        }else
            echo '';
        ?>        
        
         <?php
       
        
        $toq=0;
		$tos=0;
        
      $qry="SELECT * FROM sale WHERE date > DATE_SUB(NOW(), INTERVAL 1 DAY) ";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
				
				$toquan=$row['quantity'];
				$sale=$row['total'];
		$toq=$toq+$toquan;
        $tos=$tos+$sale; 
	  
		
            }
        }else
            echo '';
        ?>       
        
        
         <?php
       
        
        $tostock=0;
        
      $qry="SELECT * FROM stock WHERE date > DATE_SUB(NOW(), INTERVAL 1 DAY) ";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
				
			
				$sale=$row['bricks'];
		        $tostock=$tostock+$sale;
	  
		
            }
        }else
            echo '';
        ?>       
        
        
        
        
        
        
       
       
    
    
  

 <div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-success float-left text-white rounded py-4">
   <h4 class="text-center ">All Stock</h4>
   <h4 class="text-center"><?php echo $all ;?></h4>
  </div>
</div>

 <div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-danger float-left text-white rounded py-4">
   <h4 class="text-center ">Sold Bricks</h4>
   <h4 class="text-center"><?php echo $allsold ;?></h4>
  </div>
</div>

 <div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-primary float-white text-white rounded py-4">
   <h4 class="text-center ">Remaining Bricks</h4>
   <h4 class="text-center"><?php echo $total= $all-$allsold;?></h4>
  </div>
</div>

 <div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-warning float-left text-white rounded py-4">
   <h4 class="text-center ">Sale in Cash</h4>
   <h4 class="text-center">Rs: <?php echo $asale ;?></h4>
  </div>
</div>


<div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-info float-left text-white rounded py-4">
   <h4 class="text-center ">Today Sold Bricks</h4>
   <h4 class="text-center"><?php echo $toq; ?></h4>
  </div>
</div>
 
 
 <div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-secondary float-left text-white rounded py-4">
   <h4 class="text-center ">Today Sale Cash</h4>
   <h4 class="text-center">Rs: <?php echo $tos; ?></h4>
  </div>
</div>
 
 <div class="col-md-3 mt-3 p-1 float-left">
    <div class="col-md-12 bg-dark float-left text-white rounded py-4">
   <h4 class="text-center ">Today Add Bricks</h4>
   <h4 class="text-center"><?php echo $tostock; ?></h4>
  </div>
</div>
  
   </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    <?php
    include 'footer.php';
    ?>
   