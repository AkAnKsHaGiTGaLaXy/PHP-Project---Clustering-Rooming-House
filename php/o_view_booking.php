
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
        <title>View Bookings</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet"href="css/dash_main.css">
	<link rel="stylesheet"href="css/dash_resp.css">
    <!--<link rel="stylesheet" href="css/nav.css">-->
    <!--<link rel="stylesheet" href="css/hostel_owner_reg.css">-->
	<link rel="stylesheet" href="css/table.css">
    </head>
    
    
    
    <body>
        
    <form action="#" method="post">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background:white;">
            <div class="header_div">
            <img class="image_class" src="css/logo2.jpeg" style="height:50px">
            
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
		<div class="box-container">
			<!--date wise show bookings-->
			<form action="" method="post">
			<h3 style="text-align:center;">Date Wise Bookings</h3>
    <div class="box" >
      
      <div class="form-element">
        <label for="date" style="color:white;"><b>Select date:</b></label>
        <input type="date" name="date" id="date" />
      </div><br>
      <div class="form-element">
        <input type="submit" value="Show Data" name="date-btn" align="center"style="color:white;border:1px solid white;">
      </div>
    </div>
  </form>
			<!--end of date wise show bookings-->
			<!--display month wise booking form-->
			<form action="" method="post">
			<h3 >Month Wise Bookings</h3>
    <div class="box" style="color:black;" >
      
      <div class="form-element">
        <label for="month"style="color:white;"><b>Choose a Month:</b></label>
        <select name="month" id="month" required>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
      </div><br>
      <div class="form-element">
        <label for="m_year"style="color:white;"><b>Enter Year:</b></label>
        <select name="m_year" id="month" required style="color:black;">
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
        </select>
      </div><br>
      <div class="form-element">
        <input type="submit" name="month-btn" value="Show Data" align="center" style="color:white;border:1px solid white;">
      </div>
    </div>
  </form>

			<!--end of month wise dispaly form-->

			<!--year wise show bookings-->
			<form action="" method="post">
			<h3 style="text-align:center;">Year Wise Bookings</h3>
    <div class="box" >
      
      <div class="form-element">
        <label for="m_year" style="color:white;"><b>Enter Year:</b></label>
        <select name="m_year" id="month" required style="color:black;">
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
        </select>
      </div><br>
      <div class="form-element">
        <input type="submit" value="Show Data" name="year-btn" align="center"style="color:white;border:1px solid white;">
      </div>
    </div>
  </form>
			<!--end of year wise show bookings-->
			
</div>
        <div class="container" style="margin-left:0px;max-width:4000px;">     
<!-- table section -->
<hr>
<div class="container1" style="max-width:4000px;margin-left:0px">
	<br>
<div class="title">Total Bookings</div><br>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><b> Booking Id</b></div>
      <div class="col col-3"><b> Customer Id</b></div>
      <div class="col col-2"><b> Check In Date</b></div>
      <div class="col col-1"><b> Check Out Date</b></div>
      
      
      <div class="col col-1"><b> Total Bill</b></div>
      <div class="col col-4"><b> Booking Date</b></div>


    </li>
	<?php
	if(isset($_POST['date-btn'])){
		$date=$_POST['date'];
		$query = "SELECT * FROM booking WHERE h_id='$h_id'and b_date='$date'";
		$result = mysqli_query($conn, $query);
		//echo $result;
		if ($result) {
			// Fetch the hall ID from the query result
			while ($row = mysqli_fetch_assoc($result)) {
				
				?>
			<li class="table-row">
			<div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
			  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
			  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
			  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
			  
			  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>
	
			  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}
			  }else if(isset($_POST['month-btn'])){
				$month=$_POST['month'];
				$year=$_POST['m_year'];
				$query = "SELECT * FROM booking WHERE h_id='$h_id'and month(b_date)='$month' and year(b_date)='$year' ";
				$result = mysqli_query($conn, $query);
				//echo $result;
				if ($result) {
					// Fetch the hall ID from the query result
					while ($row = mysqli_fetch_assoc($result)) {
						
						?>
					<li class="table-row">
					<div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
					  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
					  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
					  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
					  
					  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>
			
					  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}
					  }else if(isset($_POST['year-btn'])){
						
						$year=$_POST['m_year'];
						$query = "SELECT * FROM booking WHERE h_id='$h_id' and year(b_date)='$year' ";
						$result = mysqli_query($conn, $query);
						//echo $result;
						if ($result) {
							// Fetch the hall ID from the query result
							while ($row = mysqli_fetch_assoc($result)) {
								
								?>
							<li class="table-row">
							<div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
							  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
							  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
							  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
							  
							  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>
					
							  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}
							  }else{
    $query = "SELECT * FROM booking WHERE h_id='$h_id'";
    $result = mysqli_query($conn, $query);
    //echo $result;
    if ($result) {
        // Fetch the hall ID from the query result
        while ($row = mysqli_fetch_assoc($result)) {
            
        	?>
		<li class="table-row">
        <div class="col col-1" data-label="Booking Id"><?php echo $row['b_id'];?></div>
		  <div class="col col-3" data-label="Customer Id"><?php echo $row['c_id'];?></div>
		  <div class="col col-2" data-label="Check In Date"><?php echo $row['check_in_date'];?></div>
		  <div class="col col-1" data-label=" Check Out Date"><?php echo $row['check_out_date'];?></div>
		  
		  <div class="col col-1" data-label=" Total Bill"><?php echo $row['total_bill'];?></div>

		  <div class="col col-4" data-label=" Booking Date"><?php echo $row['b_date'];}}}?></div>
          	</li>

  </ul>
</div>
<!-- End Of Table section -->
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