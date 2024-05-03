<?php session_start();
include("connect.php");
$bookingCount=0;
$owner_email=$_SESSION['customer'];
$query = "SELECT c_id FROM customer WHERE c_email='$owner_email'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $c_id = $row['c_id'];
       
    }
    // Free the result set
    //mysqli_free_result($result);
}

$query = "SELECT * FROM booking WHERE c_id='$c_id'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hostel ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $bookingCount=$bookingCount+1;}}
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

			

<div class="box-container" >

    <div class="box box1">
        <div class="text">
            <h2 class="topic-heading"><?php echo $bookingCount;?></h2>
            <h2 class="topic">My Bookings</h2>
        </div>

        <img src=
        "css/img/t_bookings.png"
            alt="Views">
    </div>

    
</div>

<div class="report-body">
                <div class="report-container" style="margin-left:15%;">
				<div class="report-header">
					<h1 class="recent-Articles">My Bookings</h1>
					
				</div>

					<div class="report-body">
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Booking Id</th>
            <th>Hostel id</th>
            <th>Check In Date</th>
            <th>Check Out Date</th>
            <th>Leaving Days</th>
            <th>Total Bill</th>
            <th>Booking Date</th>
			



        </tr>
        </thead>
					
						
					<?php
$query2 = "SELECT * FROM booking WHERE c_id='$c_id'";
$result2 = mysqli_query($conn, $query2);
//echo $result;
if ($result2) {
    // Fetch the hostel ID from the query result
    while ($row2 = mysqli_fetch_assoc($result2)) {
        
            
        	?>
					<tbody>
                    <tr>
							<td><?php echo $row2['b_id'];?></td>
							<td><?php echo $row2['h_id'];?></td>
							<td><?php echo $row2['check_in_date'];?></td>
							<td><?php echo $row2['check_out_date'];?></td>
							<td><?php echo $row2['b_days'];?></td>
                            <td><?php echo $row2['total_bill'];?></td>
                            <td><?php echo $row2['b_date'];?></td>
							
		</tr></tbody>
						<?php }}
						
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