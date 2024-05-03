<?php
session_start(); 
include("connect.php");
$currentDate = date('Y-m-d');
$tomorrow = date('Y-m-d', strtotime('+1 day'));
/*$h_price=0;
$h_id=0;*/

if(isset($_SESSION["admin"])){
    header("Location: hostels.php", true, 301);  
    exit();
}else if(isset($_SESSION["customer"])){

}else if(isset($_SESSION["hostel_owner"])){
    header("Location: hostels.php", true, 301);  
    exit();
}else{
    header("Location: login.php", true, 301);  
    exit();
}

if(isset($_POST['book_btn'])){
    $h_id= $_POST['h_id'];

   $_SESSION['h_id']=$h_id;
    /*$result = $conn->query("SELECT * FROM hostel_owner WHERE h_id='$h_id'"); 
if($result){
 while($row = $result->fetch_assoc()){
   
   $h_seat_price=$row['h_seat_price'];}
}*/}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/hostel_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/services_card.css">

</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpeg" alt=""></li>
      <li class="account"><a href="account.php">Account</a></li>
      
      <li><a class="active"  href="hostels.php">Hostels & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
  

   
    <div class="container pb-4">
    <div class="title">Hostel Booking Form</div>
    <div class="sub_title">Booking Details:</div><br>
    
    <form action="#" method="POST">


    <div class="user-details" style="display:flex;">
          <div class="input-box" style="margin-left:15px;">
            <span class="details">Check In Date</span>
            <input type="date"  name="ci_date" min="<?php echo $currentDate;?>" required>
          </div>
          
          <div class="input-box"style="margin-left:15px;">
            <span class="details">Check Out Date</span>
            <input type="date"  name="co_date" min="<?php echo $tomorrow;?>" required>
          </div>
          <div class="input-box"style="margin-left:15px;">
          <input type="submit"  name="add_service" value="Generate Bill" Style="width:50%; margin-left:25%;margin-top: 10%;">
          </div>
         
        </div>
        <hr><br></form>
<?php 
if(isset($_POST['add_service'])){
    $h_id=$_SESSION['h_id'];
    $result = $conn->query("SELECT * FROM hostel_owner WHERE h_id='$h_id'"); 
    if($result){
     while($row = $result->fetch_assoc()){
       
       $h_seat_price=$row['h_seat_price'];
       $h_qr=base64_encode($row['h_qr']);

    }
    }
    $currentDate = date('Y-m-d');
   $check_in_date=$_POST['ci_date']; 
   $check_out_date=$_POST['co_date'];

   if (strtotime($check_in_date) < strtotime($check_out_date)) {
    // Create DateTime objects from the given dates
    $startDateTime = new DateTime($check_in_date);
    $endDateTime = new DateTime($check_out_date);
    
    // Calculate the difference between the two dates
    $interval = $startDateTime->diff($endDateTime);
    
    // Get the number of days from the interval
    $numberOfDays = $interval->days;
}else{
    echo'<script>alert("Check out date is less than check in date")</script>';
}

?>

        <div class="sub_title">Bill:</div><br>
        <div class="input-box">
            <span class="details">
            <span><b>Check In Date:</b><?php echo $check_in_date;?></span><br>
            <span><b>Check Out Date:</b><?php echo $check_out_date;?></span><br>
            <span><b>Number Of Days:</b><?php echo $numberOfDays;?></span><br>
            <span><b>Hostel Price:</b><?php echo $h_seat_price;?></span><br>
            <span><b>Total Bill:</b><?php echo $numberOfDays*$h_seat_price;?></span><br>

          </div><hr><br>
          <div class="input-box">
            <span class="details" style="margin-left:35%;"><b>Make Payment On This OR Code:</b></span>
            <div class="card_image"><img src="data:image/PNG;base64,<?php echo $h_qr;?>" style="width:30%;margin-left:35%;"></div>
          </div>
          <form action="receipt.php" method="post">
            <input type="text" value="<?php echo $h_id;?>" name="h_id" style="display:none;">
            <input type="text" value="<?php echo $currentDate;?>" name="currentDate" style="display:none;">
            <input type="text" value="<?php echo $check_in_date;?>" name="check_in_date" style="display:none;">
            <input type="text" value="<?php echo $check_out_date;?>" name="check_out_date" style="display:none;">
            <input type="text" value="<?php echo $numberOfDays;?>" name="numberOfDays" style="display:none;">
            <input type="text" value="<?php echo $numberOfDays*$h_seat_price;?>" name="total_bill" style="display:none;">

          <div class="input-box"style="margin-left:15px;">
          <input type="submit"  name="receipt" value="Payment Done" style="height: 40px;width: 200px;margin-left: 38%; background:linear-gradient(135deg, #71b7e6, #eae2e2);font-size:18px;font-style:bold;">
          </div></form>
          

        </div>
       <?php }?>

        </div>
     
    

    </div> 
</body>
</html>