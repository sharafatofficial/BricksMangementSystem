<?php
   session_start();
   include'config.php';
    
        if(isset($_POST['pass'])){        
    $name =mysqli_real_escape_string($con,$_POST['name']);
    $password=mysqli_real_escape_string($con,$_POST['pass']);
           
        
            
             
$qry="SELECT name,pass FROM admin WHERE name='$name' AND  pass='$password' ";
     $result=mysqli_query($con,$qry);

   
    if(mysqli_num_rows($result)==1)
    { 
        If(isset($_POST['check'])){
            $rem=mysqli_real_escape_string($con,$_POST['check']); 
           $name1="user";
            $pass="security";
            
            setcookie($name1,$name,time() +(86400 * 30));
            setcookie($pass,$password,time() +(86400 * 30));
        }
        
     //  echo '<pre>';  print_r ($name);echo '</pre>';
       // echo '<pre>';  print_r ($_COOKIE);echo '</pre>';
    // echo '<pre>';  print_r ($_COOKIE);echo '</pre>';
       // die();
      ?>
<?php
       $_SESSION['email']=$name;
      header('location:index.php');
        
    }
    else{
         echo 'invalid name or pa';
    }
        }


?>

  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    
     <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="adstyle.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <body>
<div class="main">
<div class="container">
 <div class="form px-1 bg-light">
    <div class="text">
        <h1  class="center pading">LOG IN</h1>
        
        </div>
        <form method="post">
        <div class="form-group">
         <label for="exampleInputEmail1">User Name</label>
        <input class="form-control"  type="text" name="name" value="<?php if(isset($_COOKIE['user'])){ echo $_COOKIE["user"]; }; ?>"
         placeholder="User Name">    </div>
        <div class="form-group"> 
         <label for="exampleInputEmail1">Password</label>
        <input class="form-control"  type="password" name="pass" value="<?php if(isset($_COOKIE['security'])){  echo $_COOKIE["security"]; };?>"         			        placeholder="Password">    </div>
            <input class=""  type="checkbox" name="check">   Remember Me
        <input class="btn btn-primary mt-3 col-md-12" type="submit" value="login" >
            
        </form>
    </div>
    
       </div>
    
    
    </div>  
     
        
    </body>
</html>

  