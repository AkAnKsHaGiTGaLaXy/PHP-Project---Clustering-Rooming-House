
<?php 
session_start(); 
include("connect.php");
$CustomerCount=0;
$HallsCount=0;
$NotVerifiedCount=0;
$query = "SELECT COUNT(*) as count FROM customer";
$result = mysqli_query($conn, $query);
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $CustomerCount = $row['count'];
  // Display the count
} 

$query = "SELECT COUNT(*) as count FROM hostel_owner WHERE h_request='Verified'";
$result = mysqli_query($conn, $query);
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $HallsCount = $row['count'];
  // Display the count
} 

$query = "SELECT COUNT(*) as count FROM hostel_owner WHERE h_request='Not Verified'";
$result = mysqli_query($conn, $query);
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $NotVerifiedCount = $row['count'];
  // Display the count
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Remove Hostel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet"href="css/dash_main.css">
	<link rel="stylesheet"href="css/dash_resp.css">
  <link rel="stylesheet" href="css\admin_index.css" type="text/css">

	<link rel="stylesheet" href="css/table_admin.css">
    </head>
    
    
    
    <body>
        
    <form action="" method="post">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="header_div">
            <img class="image_class" src="css/logo2.jpeg">
            
            <div class="container-fluid" style="float:right; margin-top: 10px; border: none;">
                  
                <ul class="nav navbar-nav" style="color: #072791!important;">
                <li class=""  ><a href="admin_dash.php" style="color: #072791!important;">Dashboard</a></li>

                <li class=""  ><a href="index.php" style="color: #072791!important;">Home</a></li>
                <li class=""  ><a href="hostels.php" style="color: #072791!important;">Hostels</a></li>
                    <li><a href="remove_hostel.php" style="color: #072791!important;">Remove Hostels</a></li>
                    <li><a href="a_view_customer.php" style="color: #072791!important;">View Customers</a></li>
                    <li><a href="admin_profile.php" style="color: #072791!important;">View Profile</a></li>
                   
                    <li><button class="header_button" type="submit" name="submit" value="Logout"><b>Logout</b></button></li>
                    
                </ul>
                
            </div>
            
          </div>
                
        </nav></form>
        <br>    <br>    <br>    <br>    
        
        <div class="main">

			

			
			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Remove Hostels</h1>
					
				</div>

					<div class="report-body">
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>HOstel Id</th>
            <th>Owner Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Hostel Name</th>
			<th>Hostel Price</th>
			<th>Hostel Address</th>
			<th>Status</th>
			<th>Remove</th>



        </tr>
        </thead>
					
						
					<?php
    $query = "SELECT * FROM hostel_owner WHERE h_request='Verified'ORDER BY h_id DESC";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?><form action="#" method="POST">
					<tbody>
                    <tr>
							<td><?php echo $row['h_id'];?></td>
							<td><?php echo $row['o_name'];?></td>
							<td><?php echo $row['o_contactNo'];?></td>
							<td><?php echo $row['o_email'];?></td>
							<td><?php echo $row['h_name'];?></td>
							<td><?php echo $row['h_seat_price'];?></td>

							<td><?php echo $row['h_add'];?></td>
							<td><?php echo $row['h_request'];?></td>

							<input type="text" name="h_id" value="<?php echo $row['h_id'];?>" style="display:none;cursor:pointer;"><h3 class="t-op-nextlvl"></h3></input>
							<td><input type="submit" value="Remove Account" name="submit" style="background:red;margin-right:-15%; border:1px solid black;" val><h3 class="t-op-nextlvl"></h3></input></td>
						    
			<!--<h3 class="t-op-nextlvl label-tag">Published</h3>-->
		</tr></tbody></form>
						<?php }}
						if(isset($_POST['submit'])){
							$hr_id=$_POST['h_id'];

							
								$query = "DELETE FROM hostel_owner WHERE h_id ='$hr_id'";
								$result1 = mysqli_query($conn, $query);
								 //echo $result;
							   if ($result1) {?><script>alert("Account Deleted!!");
							                    window.location.href ="remove_hostel.php";
												</script><?php

							 }else
							{
								echo '<script>alert("Something Went Wrong");</script>';
								echo '<script> window.location.href ="manage_hall.php";</script>';
							}
							}
						?>

					</div>
				</div>
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