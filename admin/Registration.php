<html>
    <?php
      include'config.php';
    
    if(isset($_POST['pass'])&& !empty($_POST['pass'])){
    
   $name=$_POST['name'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
     $repass=$_POST['repass'];
    
    
  
    
    $qry="INSERT INTO tbl_reg(name,lname,email,pass,repass)VALUES('$name','$lname','$email','$pass','$repass')";
    
    
    $result=mysqli_query($con,$qry);
    if($result>0){
        echo'    you are Registered successfuly';
    }
    else{
        echo 'error';
    }
    }


?>
<head>
     <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    
     <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
   
    <link rel="stylesheet" href="style.css">
    </head>
<body>
<div class="main">
<div class="container">
 <div class="form">
    <div class="text">
        <h1  class="center pading">Raw Material</h1>
        
        </div>
        <form action="" method="post">
        <div class="row1"><span class="fa fa-user icon "> </span> <input class="input1"  type="text" name="name" placeholder="User Name">    </div>
         <div class="row1"><span class="fa fa-user icon "> </span> <input class="input1"  type="text" name="lname" placeholder="Last Name">    </div>
             <div class="row1"><span class="fa fa-envelope icon "> </span> <input class="input1"  type="text" name="email" placeholder="  Your Email ">    </div>
             <div class="row1"><span class="fa fa-lock icon "> </span> <input class="input1"  type="password" name="pass" placeholder="Password">    </div>
             <div class="row1"><span class="fa fa-lock icon "> </span> <input class="input1"  type="password" name="repass" placeholder="Retype password">    </div>
            
            <input class="register" type="submit" value="Register">
            
        </form>
    </div>
    
       </div>
    
    
    </div>  
    
    
    
    </body>
</html>