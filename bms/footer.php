          
            
    </div>
  
    </body>
    <script>
	 <script src="sweetalert.min.js"></script>
     </script>
     <script>
    $(document).ready(function(){
   $('.button-left').click(function(){
       $('.sidebar').toggleClass('fliph');
   });
     
});
   
    
    </script>
    
    <?php 
	//print_r($_SESSION);
	if(isset($_SESSION['status']) && $_SESSION['status']!=''){
		//echo 'pakistan';
		?>
		<script> 
    swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['code']; ?>",
  button: "ok",
});
    </script>
    
        
		<?php
		unset($_SESSION['status']);
		}
	?>
    
    
   <script> 
    //swal('pakistan');
    </script>
    
    
    
    
    
</html>