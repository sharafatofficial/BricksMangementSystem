<?php 
include 'header.php';
 include 'config.php';

 
        $message='';
        if(isset($_GET['delete'])){
            
        $id=$_GET['delete'];
        
        $qry="DELETE FROM buy_qoila WHERE id='$id'";
            
        $check=mysqli_query($con,$qry);
          
            $message='<div class="alert alert-danger"> Recored has been deleted!</div>';
            
        }
        ?>


    
        
          <h2 class="text-center text-primary">Qoila Details</h2>
        <?php 
		
        echo $message;
        
        ?>
    
    <table class="table border" id="pagenation">
         
    
        <thead>
    <tr class="text-white bg-danger">  
            <th>ID</th>
            <th>Date</th>
            <th>Supplier</th>
            <th>Quntity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
       
        
        </tr>
        </thead>
        
        <tbody>
        
        <?php
        $recored_per_page=5;
        $page='';
        if(isset($_POST['page'])){
            $page=$_POST['page'];
        }
        else{
            $page=1;
        }
        $start=($page - 1) * $recored_per_page;
        
        
        
      $qry="SELECT q.*,s.name FROM buy_qoila q, supplier s WHERE s.id=q.supplier LIMIT $start,$recored_per_page";
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
            }
        }
        
        ?>        
       
        </tbody>
    </table>
     <?php 
        $qry="SELECT * FROM buy_qoila";
        $check=mysqli_query($con,$qry);
        $total_recored=mysqli_num_rows($check);
        $total_pages=ceil($total_recored/$recored_per_page);
        
        for($i=1; $i<=$total_pages;$i++){
            
            ?> 
        <li class=" btn btn-secondary d-inline ml-1 float-left mt-1 px-2 py-1 zz" data-id="<?php echo $i?>" ><?php echo $i?></li>

        <?php
        
        }
        
        
        
        ?>
        
    </div>
    <script>
$(document).ready(function(){
   
    
    $(document).on('click','.zz',function(e){
       
        e.preventDefault();
        var page= $(this).attr("data-id");
        var data = 'view=buyqoila&page='+page;
        
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
						//alert(response);
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