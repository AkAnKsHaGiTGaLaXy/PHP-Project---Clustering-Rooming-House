<?php
include("connect.php");
session_start();
if(isset($_SESSION["admin"])){
    header("Location: admin_dash.php", true, 301);  
    exit();
}else if(isset($_SESSION["customer"])){
    header("Location: customer_dash.php", true, 301);  
    exit();
}else if(isset($_SESSION["hostel_owner"])){
    header("Location: h_owner_dash.php", true, 301);  
    exit();
}else{
    header("Location: login.php", true, 301);  
    exit();
}
?>