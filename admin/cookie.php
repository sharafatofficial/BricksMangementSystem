<?php
$name="user";
$value="ali";

setcookie($name,$value,time() +(3600),"/");



echo $_COOKIE[$name];



?>