<?php 
session_start(); 
include("connect.php");

$owner=$_SESSION['hostel_owner'];
$query = "SELECT * FROM hostel_owner WHERE o_email='$owner'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        
        $h_id = $row['h_id'];
        $o_name=$row['o_name'];
        $o_email = $row['o_email'];
        $o_mob = $row['o_contactNo'];
        $o_add = $row['h_add'];
        $o_pass = $row['h_pass'];
        $h_name = $row['h_name'];
        $h_price = $row['h_seat_price'];
        $h_desc = $row['h_desc'];
        $h_add = $row['h_add'];
        $h_request = $row['h_request'];




    }
    // Free the result set
    //mysqli_free_result($result);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Owner Profile Page</title>
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
                <li class=""  ><a href="h_owner_dash.php" style="color: #072791!important;">Dashboard</a></li>

                <li class=""  ><a href="index.php" style="color: #072791!important;">Home</a></li>
                <li class=""  ><a href="hostels.php" style="color: #072791!important;">Hostels</a></li>
                    <li><a href="o_view_booking.php" style="color: #072791!important;">View Bookings</a></li>
                    <li><a href="o_view_customer.php" style="color: #072791!important;">View Customers</a></li>
                    <li><a href="owner_profile.php" style="color: #072791!important;">View Profile</a></li>
                   
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
       <label for="u_name"><b>Hostel Id:</b><?php echo $h_id;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Owner Name:</b><?php echo $o_name;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b> Mobile Number:</b><?php echo $o_mob;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Email:</b><?php echo $o_email;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Owner Address:</b><?php echo $o_add;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Password:</b><?php echo $o_pass;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hostel Name:</b><?php echo $h_name;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hostel Price:</b><?php echo $h_price;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hostel Description:</b><?php echo $h_desc;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>Hostel Address:</b><?php echo $h_add;?></label>
     </div>
     <div class="form-element">
       <label for="u_name"><b>HostelStatus:</b><?php echo $h_request;?></label>
     </div>
     
     
</div>
</form>
  </div>
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