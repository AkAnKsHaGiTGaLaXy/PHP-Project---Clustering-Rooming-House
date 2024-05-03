
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
        <title>View Customer</title>
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
					<h1 class="recent-Articles">All Customers</h1>
					
				</div>

					<div class="report-body">
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Customer Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Pan No</th>
            <th>Aadhar No</th>
            <th>Email</th>
            <th>Address</th>
			



        </tr>
        </thead>
					
						
					<?php
    $query = "SELECT * FROM customer";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?>
					<tbody>
                    <tr>
							<td><?php echo $row['c_id'];?></td>
							<td><?php echo $row['c_name'];?></td>
							<td><?php echo $row['c_contactNo'];?></td>
                            <td><?php echo $row['c_pan'];?></td>
							<td><?php echo $row['c_aadhar'];?></td>

							<td><?php echo $row['c_email'];?></td>
							<td><?php echo $row['c_add'];?></td>
							
		</tr></tbody>
						<?php }}
						
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