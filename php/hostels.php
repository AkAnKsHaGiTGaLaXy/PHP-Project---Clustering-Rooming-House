<?php 
//error_reporting(0);
include("connect.php");
//$conn = new mysqli("localhost", "root", "123", "book_event");

session_start(); 
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostels</title>
    <link rel="stylesheet" href="css/hostel.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body style="background-color: #ffffff; margin: 0%;">
<div class="nav">
  <ul>
    <!--<li class="logo"><img src="css/logo2.jpg" alt=""></li>-->
    <li class="account"><a href="account.php">Account</a></li>
    <li><a class="active" href = "hostels.php">Hostels & Services</a></li>
        <li><a  href="about_us.php">About Us</a></li>
    <li><a  href="index.php">Home</a></li>
  </ul></div>

  <div class="main">
  <h1><b>Find Your Tribe, Find Your Hostel: Discover and Book Today!</b></h1>
  <ul class="cards">
  <?php $result = $conn->query("SELECT * FROM hostel_owner WHERE h_request='Verified'"); 
 if($result){
  while($row = $result->fetch_assoc()){
    $h_id=$row['h_id'];
    $h_name=$row['h_name'];
    $h_add=$row['h_add'];
    $h_desc=$row['h_desc'];
    $h_price=$row['h_seat_price'];
    $h_seat=$row['h_seat'];
    $h_services=$row['h_services'];

    $h_email=$row['o_email'];
    $h_mob=$row['o_contactNo'];
    $h1_img=base64_encode($row['h1_img']);
    $h2_img=base64_encode($row['h2_img']);
    $h3_img=base64_encode($row['h3_img']);
    $h4_img=base64_encode($row['h4_img']);
    $h5_img=base64_encode($row['h5_img']);


 ?>
  
    <li class="cards_item">
      <div class="card">
        <div class="card_image">
        <div class="wrapper">    
        <img src="data:image/PNG;base64,<?php echo $h1_img;?>" >
        <img src="data:image/PNG;base64,<?php echo $h2_img;?>" >
        <img src="data:image/PNG;base64,<?php echo $h3_img;?>" >
        <img src="data:image/PNG;base64,<?php echo $h4_img;?>" >

        <img src="data:image/PNG;base64,<?php echo $h5_img;?>" >

  </div>
    </div>
        <div class="card_content">
          <h2 class="card_title">Hostel Name:<?php echo $h_name; ?></h2>
          <p class="card_text"><b>Total Seat:</b><?php echo $h_seat; ?></p>
          <p class="card_text"><b>Seat Price:</b><?php echo $h_price.'Rs'; ?></p>
          <p class="card_text"><b>Services:</b><?php echo $h_services; ?></p>
          <p class="card_text"><b>Hostel Address:</b><?php echo $h_add; ?></p>
          <p class="card_text"><b>Email:</b><?php echo $h_email; ?></p>
          <p class="card_text"><b>Phone No:</b><?php echo $h_mob; ?></p>
          <p class="card_text"><b>Description:</b><?php echo $h_desc; ?></p>

          <form action="booking.php" method="POST">
          <input type="text" name="h_id" value="<?php echo $h_id;?>" style="display:none;">
          <button class="btn card_btn"name="book_btn">Book Now</button>
          </form>
        </div>
      </div>
    </li>

  <?php }}else{
   // echo "error";
  }?>
  </ul>
</div>

</body>
</html>