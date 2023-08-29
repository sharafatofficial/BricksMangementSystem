<?php
include 'config.php';



if(isset($_POST['view']) && $_POST['view']=='buyqoila'){
    
    $recored_per_page=5;
        $page='';
        if(isset($_POST['page'])){
            $page=$_POST['page'];
        }
        else{
            $page=1;
        }
        $start=($page - 1) * $recored_per_page;
        
        
      $qry = "SELECT q.*,s.name FROM buy_qoila q, supplier s WHERE s.id=q.supplier LIMIT $start,$recored_per_page";
      //$qry="SELECT * FROM buy_qoila LIMIT $start,$recored_per_page";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
        ?>        
        <tr>
            <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['total']; ?></td>
             <td><a href="qoila_details.php?delete=<?php echo $row['id'];  ?>"><span class="text-danger fa fa-trash-o"></span></a>
            <a href="buy_qoila.php?edit=<?php echo $row['id'];  ?>"><span class="text-success px-4 fa fa-pencil"></span></a></td>
             
        
        </tr>
    
    

<?php
                
                
                
            }}}



?>

<?php


if(isset($_POST['action']) && $_POST['action']=='paymentview'){
    
    
    $recored_per_page=7;
        $page='';
        $output='';
        if(isset($_POST['page'])){
            $page=$_POST['page'];
        }
        else{
            $page=1;
        }
        $start=($page - 1) * $recored_per_page;
    
    $qry="SELECT tps.*,ts.name FROM payment_supplier tps, supplier ts WHERE tps.supplier=ts.id LIMIT $start ,$recored_per_page";
        $res=mysqli_query($con,$qry);
        $ab=mysqli_num_rows($res);
        
        if($ab>0){
            
            while($row=mysqli_fetch_assoc($res)){
        ?>        
        <tr>
            <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['amount']; ?></td>
             
             <td><a href="supplier_payment_view.php?delete=<?php echo $row['id'];  ?>"><span class="text-danger fa fa-trash-o"></span></a>
            <a href="payment_supplier.php?edit=<?php echo $row['id'];  ?>"><span class="text-success px-4 fa fa-pencil"></span></a></td>
             
        
        </tr>
    <?php 
            }
        }
}

?>