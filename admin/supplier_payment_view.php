 <?php 
include 'header.php';
 include 'config.php';

 
        $message='';
        if(isset($_GET['delete'])){
            
        $id=$_GET['delete'];
        
        $qry="DELETE FROM payment_supplier WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
          
            $message='<div class="alert alert-danger mt-2"> Recored has been deleted!</div>';
            
        }
        ?>


   
        
      <div class="col-md-12 float-left">
      <h2 class="text-center text-primary">Payment To Supplier</h2>
    <?php 
        echo $message;
        
        ?>
        
    <table id="pagenation" class="table border table-striped">
         
        
        <thead>
        
    <tr class="text-white bg-danger">  
            <th>ID</th>
            <th>Date</th>
            <th>Supplier</th>
            <th>Amount</th>
            <th>Action</th>
            
        
        </tr>
        </thead>
        <tbody>
        
        
        <?php
       
        $recored_per_page=8;
        $page='';
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
            
        ?>        
       </tbody>
    
    </table>
     </div>
        <?php 
        $qry="SELECT tps.*,ts.name FROM payment_supplier tps, supplier ts WHERE tps.supplier=ts.id ";
        $check=mysqli_query($con,$qry);
        $total_recored=mysqli_num_rows($check);
        $total_pages=ceil($total_recored/$recored_per_page);
        
        for($i=1; $i<=$total_pages;$i++){
            
            ?>
        
        <li class=" btn btn-secondary  ml-3 float-left mt-1 px-2 py-1  zz" data-id="<?php echo $i?>" ><?php echo $i?></li>
       
    <?php    
        }
        
        ?>
         
        
        
   
   <script>
$(document).ready(function(){
   
    
    $(document).on('click','.zz',function(e){
       
        e.preventDefault();
        var page= $(this).attr("data-id");
        var data = 'action=paymentview&page='+page;
        
        $.ajax({
					type: "POST",
					url: 'ajax.php',
					data: data,
					cache: false,
					beforeSend: function()
					{
                        //$('.class').append('<img src="">')
					},
					success: function (response)
					{	
						//alert(response)
                    $('#pagenation tbody').html(response);
                        
					},
					error: function (xhr, ajaxOptions, thrownError)
					{
						
					}
				});
		return false;	
    })
    
})//doc


</script>



<?php 
include 'footer.php';
 


?>