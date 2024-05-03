
<?php 
session_start(); 
include("connect.php");
$customerCount=0;
$cid=0;

//for destroy sesion
/*session_unset();
session_destroy();*/
//echo $_SESSION["hall_owner"];
$owner_email=$_SESSION['hostel_owner'];
$query = "SELECT * FROM hostel_owner WHERE o_email='$owner_email'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $h_id = $row['h_id'];
        $h_price=$row['h_seat_price'];
        $h_seat=$row['h_seat'];
    }
    // Free the result set
    //mysqli_free_result($result);
}
$query = "SELECT * FROM booking WHERE h_id='$h_id'";
$result = mysqli_query($conn, $query);
//echo $result;
if ($result) {
    // Fetch the hall ID from the query result
    while ($row = mysqli_fetch_assoc($result)) {
      if($cid==$row['c_id']){

	  }else{
		$customerCount=$customerCount+1;
	  }
		$cid=$row['c_id'];
    }
    // Free the result set
    //mysqli_free_result($result);
}
$query = "SELECT COUNT(*) as count FROM booking WHERE h_id='$h_id'";
// Execute the query
$result = mysqli_query($conn, $query);
// Check if the query was successful
if ($result) {
  // Fetch the row containing the count
  $row = mysqli_fetch_assoc($result);
  // Retrieve the count value
  $bookingCount = $row['count'];
  // Display the count

} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Hostel Owner Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css\bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css\admin_index.css" type="text/css">
        <link rel="stylesheet"href="css/dash_main.css">
	<link rel="stylesheet"href="css/dash_resp.css">
        <link rel="stylesheet" href="..\css\font-awesome-4.7.0\css\font-awesome.min.css">
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

			

			<div class="box-container" style="margin-top:15%;">

				<div class="box box1">
					<div class="text">
						<h2 class="topic-heading"><?php echo $customerCount;?></h2>
						<h2 class="topic">Total Customers</h2>
					</div>

					<img src=
"css/img/people.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading"><?php echo $bookingCount;?></h2>
						<h2 class="topic">Total Bookings</h2>
					</div>

					<img src=
"css/img/t_bookings.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading"><?php echo $h_price.'Rs';?></h2>
						<h2 class="topic">Hostel Seat Price</h2>
					</div>

					<img src=
"css/img/best-price.png"
						alt="comments">
				</div>
                <div class="box box3">
					<div class="text">
						<h2 class="topic-heading"><?php echo $h_seat;?></h2>
						<h2 class="topic">Total Seats</h2>
					</div>

					<img src=
"css/img/bed.png"
						alt="comments">
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