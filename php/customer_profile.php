<?php 
session_start(); 
include("connect.php");

$customer=$_SESSION['customer'];
$query = "SELECT * FROM customer WHERE c_email='$customer'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hostel ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $c_id = $row['c_id'];
        $c_name=$row['c_name'];
        $c_email = $row['c_email'];
        $c_mob = $row['c_mob'];
        $c_add = $row['c_add'];
        $c_pass = $row['c_pass'];
        $c_aadhar = $row['c_aadhar'];
        $c_pan = $row['c_pan'];



    }
    // Free the result set
    //mysqli_free_result($result);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Customer Home Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css\bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css\admin_index.css" type="text/css">
        <link rel="stylesheet" href="..\css\font-awesome-4.7.0\css\font-awesome.min.css">
        <link rel="stylesheet"href="css/dash_main.css">
	<link rel="stylesheet"href="css/dash_resp.css">
    <link rel="stylesheet" href="css/table_admin.css">
    <link rel="stylesheet" href="css/login.css">
    
</head>
    
    
    
    <body>
        
    <form action="#" method="post">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="header_div">
            <img class="image_class" src="css/logo2.jpeg">
            
            <div class="container-fluid" style="float:right; margin-top: 10px; border: none;">
                  
                <ul class="nav navbar-nav" style="color: #072791!important;">
                <li class=""  ><a href="index.php" style="color: #072791!important;">Home</a></li>

                    <li class=""  ><a href="customer_dash.php" style="color: #072791!important;">Dashboard</a></li>
                    <li class=""  ><a href="hostels.php" style="color: #072791!important;">Book Hostel</a></li>

                    
                    <li><a href="customer_profile.php" style="color: #072791!important;">Profile</a></li>
                    
                    
                    <li><button class="header_button" type="submit" name="submit" value="Logout"><b>Logout</b></button></li>
                  
                </ul>
                
            </div>
            
          </div>
                
        </nav></form>
        <br>    <br>    <br>    <br>    
        
        <div class="main">

			

        <div class="popup" id="popup">



<!--user register popup-->


<div class="register" id="register-class">
<form action="#" method="post">

<div class="form">
<h2>My Profile</h2>
<div class="form-element">
<label for="u_name"><b>Customer Id:</b><?php echo $c_id;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Name:</b><?php echo $c_name;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Mobile Number:</b><?php echo $c_mob;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Aadhar Number:</b><?php echo $c_aadhar;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Pan Number:</b><?php echo $c_pan;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Email:</b><?php echo $c_email;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Address:</b><?php echo $c_add;?></label>
</div>
<div class="form-element">
<label for="u_name"><b>Password:</b><?php echo $c_pass;?></label>
</div>


</div>
</form>
</div>
</div> 
</body></html>
<?php if(isset($_POST['submit'])){
    session_unset();
    session_destroy();?>
    <script>
  window.location.href ="account.php";
</script>
<?php }?>