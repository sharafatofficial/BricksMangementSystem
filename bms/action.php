<?php
session_start();
print_r($GET);
if(isset($_GET['logout'])){
    session_destroy();
    header('location:index.php');
    
}




?>