<?php 
include("connect.php");
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">

</head>
<body style="background-color: #ffffff; margin: 0%;">

<div class="nav">
    <ul>
        <!--<li class="logo"><img src="css/logo2.jpg" alt=""></li>-->
      <li class="account"><a class="active"  href="account.php">Account</a></li>
      
      
      <li><a href="hostels.php">Hostels & Services</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>

  <div class="img1" >
<img src="css/login_svg.jpg"/>

  </div>
<div class="popup" id="popup">


<!--Admin login popup-->

<div class="login" id="login-class">
<form action="#" method="post">
<div class="top-btn">
  <a style="background-color: #0097e6">Admin</a>
  <a href="h_owner_login.php">Hostel Owner</a>
  <a href="Customer_login.php">Customer</a>

</div>
<div class="form">
  <h2>Log in</h2>
  
  <div class="form-element">
    <label for="user_email">Email</label>
    <input type="text" id="user_email" name="user_email" required placeholder="Enter email">

  </div>
  <div class="form-element">
    <label for="user_password">Password</label>
    <input type="password" id="user_password"name="user_password"  required placeholder="Enter password">
  </div>

  <div class="form-element">
  
    <button name="user_login">Login</button>
  </div>
  
     
</div>
</form>
</div>


</body>
</html>
<?php 
if(isset($_POST["user_login"])){
       
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  $user_email = stripcslashes($user_email);  
  $user_password = stripcslashes($user_password);  
  $user_email = mysqli_real_escape_string($conn, $user_email);  
  $user_password = mysqli_real_escape_string($conn, $user_password);
 $sql = "SELECT * FROM admin WHERE a_email='$user_email' AND a_pass='$user_password'";  
 $query = mysqli_query($conn, $sql);
    
  
  $count = mysqli_num_rows($query);  
  
  if($count==1){ 

    $_SESSION["admin"]=$user_email;
    header("Location: admin_dash.php", true, 301);  
    exit();
  }else{?>
  <script>alert("Invalid Email and Password");</script><?php

  }
}
?>