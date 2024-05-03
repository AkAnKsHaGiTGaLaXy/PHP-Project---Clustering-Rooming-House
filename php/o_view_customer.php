
<?php 
session_start(); 
include("connect.php");
 

//for destroy sesion
/*session_unset();
session_destroy();*/
//echo $_SESSION["hall_owner"];
$owner_email=$_SESSION['hostel_owner'];
$query = "SELECT h_id FROM hostel_owner WHERE o_email='$owner_email'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $h_id = $row['h_id'];
       
    }
    // Free the result set
    //mysqli_free_result($result);
}

    
    // Free the result set
    //mysqli_free_result($result);

?>
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Customers</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css\bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css\admin_index.css" type="text/css">
        <link rel="stylesheet"href="css/dash_main.css">
	<link rel="stylesheet"href="css/dash_resp.css">
	<link rel="stylesheet" href="css/table_admin.css">
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

			

                

				<div class="report-body">
                <div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">My Customers</h1>
					
				</div>

					<div class="report-body">
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Customer Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>Aadhar No</th>
            <th>Pan No</th>
			



        </tr>
        </thead>
					<!--<div class="report-topic-heading"><th>
						<h3 class="t-op">Hall Id</h3>
						<h3 class="t-op">Owner Name</h3>
						<h3 class="t-op">Mobile</h3>
						<h3 class="t-op">Email</h3>
						<h3 class="t-op">Hall Name</h3>
						<h3 class="t-op">Hall Price</h3>
						<h3 class="t-op">Hall Address</h3>
						<h3 class="t-op">Status</h3>
						<h3 class="t-op">Remove</h3>


</div>
					<div class="items">-->
						
					<?php
$query1 = "SELECT c_id FROM booking WHERE h_id='$h_id'";
$result1 = mysqli_query($conn, $query1);
//echo $result;
if ($result1) {
    // Fetch the hall ID from the query result
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $c_id = $row1['c_id'];


    $query2 = "SELECT * FROM customer WHERE c_id='$c_id'";
    $result2 = mysqli_query($conn, $query2);
    //echo $result;
    if ($result2) {
        // Fetch the hall ID from the query result
        while ($row2 = mysqli_fetch_assoc($result2)) {
            
        	?>
					<tbody>
                    <tr>
							<td><?php echo $row2['c_id'];?></td>
							<td><?php echo $row2['c_name'];?></td>
							<td><?php echo $row2['c_contactNo'];?></td>
							<td><?php echo $row2['c_email'];?></td>
							<td><?php echo $row2['c_add'];?></td>
                            <td><?php echo $row2['c_aadhar'];?></td>
                            <td><?php echo $row2['c_pan'];?></td>
							
		</tr></tbody>
						<?php }}}}
						
						?>

					</div>
				</div>
			</div>
		</div>
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