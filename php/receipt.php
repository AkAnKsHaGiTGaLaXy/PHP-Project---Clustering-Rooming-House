<?php
include("connect.php");

session_start(); 
$c_email=$_SESSION['customer'];
if(isset($_POST['receipt'])){
  
    $h_id=$_SESSION['h_id'];
//echo"hallId is.$h_id";
    $c_email=$_SESSION['customer'];
    $result = $conn->query("SELECT * FROM customer WHERE c_email='$c_email'"); 
    if($result){
     while($row = $result->fetch_assoc()){
        $c_id=$row['c_id'];
        $c_name=$row['c_name'];
        $c_mob=$row['c_contactNo'];
        $c_add=$row['c_add'];
        $c_aadhar=$row['c_aadhar'];
        $c_pan=$row['c_pan'];


}}

 

  $result = $conn->query("SELECT * FROM hostel_owner WHERE h_id='$h_id'"); 
    if($result){
     while($row = $result->fetch_assoc()){
       $o_email=$row['o_email'];
        $o_name=$row['o_name'];
        $o_mob=$row['o_contactNo'];
        $h_add=$row['h_add'];
        $h_name=$row['h_name'];
        $h_price=$row['h_seat_price'];
        $h_seat=$row['h_seat'];



}} 
  $check_in_date=$_POST['check_in_date'];
  $check_out_date=$_POST['check_out_date'];
  $total_bill=$_POST['total_bill'];
  $currentDate=$_POST['currentDate'];
  $numberOfDays=$_POST['numberOfDays'];
    ?>
    
    <!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Payment Receipt </title>
    <link rel="stylesheet" href="css/hostel_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" ></script>

   </head>
<body>
<div class="nav">
    <ul>
        <!--<li class="logo"><img src="css/logo2.jpg" alt=""></li>-->
      <li class="account"><a  href="account.php">Account</a></li>
      
      <li><a class="active" href="hostels.php">Hostels & Services</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
  <div class="container">
    
    
    <div class="content" id="whatToPrint">
    <div class="title">Payment Receipt</div>
    <div class="sub_title">Customer Details:</div>
      <form action="receipt.php" method="POST" enctype="multipart/form-data">
      <div class="user-details">
          <div class="input-box">
            <span class="details">Customer Id:<?php echo $c_id;?></span>
          </div>
          <div class="input-box">
            <span class="details">Name: <?php echo $c_name;?></span>
          </div>
          <div class="input-box">
            <span class="details">Email:<?php echo $c_email;?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Mobile Number:<?php echo $c_mob;?></span>
          </div>
          <div class="input-box">
            <span class="details"> Address:<?php echo $c_add;?></span>
          </div>
         
        </div>
        <hr> 
        <div class="sub_title">Booking Details:</div>
      <div class="user-details">
          <div class="input-box">
            <span class="details">Hostel Name:<?php echo $h_name;?></span>
          </div>
          <div class="input-box">
            <span class="details">Hostel Address: <?php echo $h_add;?></span>
          </div>
          <div class="input-box">
            <span class="details">Booking Date:<?php echo $currentDate;?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Check In Date:<?php echo $check_in_date;?></span>
          </div>
          <div class="input-box">
            <span class="details">Check Out Date: <?php echo $check_out_date;?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Owner Name:<?php echo $o_name;?></span>
          </div>
          <div class="input-box">
            <span class="details">Owner Email: <?php echo $o_email;?></span>
          </div>
          <div class="input-box">
            <span class="details">Mobile Number:<?php echo $o_mob;?></span>
          </div>
        </div>
        <hr>
<!--   Hall Detail section -->
        <div class="sub_title">Payment Details:</div>
        <div class="content">
      
        <div class="user-details" >
          <table><tr><th style="width:500px;" >
          <div class="input-box">
            <span class="details"><b>Hostel Name</b></span>
          </div></th>
          <th style="width:150px">
          <div class="input-box">
            <span class="details"><b>Seat Price</b></span>
          </div></th>
</tr>


          <tr><td>
          <div class="input-box">
            <span class="details"><?php echo $h_name;?></span>
          </div></td>
          <td>
          <div class="input-box">
            <span class="details"><?php echo $h_price;?></span>
          </div></td>
          </tr>
         
         
          
          
          <?php

        
        
        $total_bill=$numberOfDays*$h_price;
        
          
          ?>
</table>
          
         
        </div></div><hr>
<div class="total" style="margin-left:400px;">

<span><b>Booking Days:</b><?php  echo $numberOfDays?></span><br><br><hr>
<span><b>Total Bill:</b><?php  echo $total_bill?></span><br><br>
<span><b>Payment Status:</b>Done</span>

</div><br><hr>


 

</div>

        <div class="button">
        <a href="javascript:generatePDF()" id="downloadButton" class="btn btn-lg btn-warning">Click To Download</a>

          <!--<input type="submit" value="Download Reciept"name="submit" onclick="Convert_HTML_To_PDF();"  style="margin-left:25%;width:50%">-->
        </div></div></div></div></div>
           </form>
    </div>
  </div>

</body>
<script>


        async function generatePDF() {
    document.getElementById("downloadButton").innerHTML = "Currently downloading, please wait";

    // Downloading
    var downloading = document.getElementById("whatToPrint");
    var doc = new jsPDF('p', 'mm', 'a4'); // Set A4 size

    await html2canvas(downloading, {
        width: 2000.28,
         // Set the width of the canvas to match A4 size in pixels
        scale: 1 // Set the scale to 1 for better quality
    }).then((canvas) => {
        // Canvas (convert to PNG)
        doc.addImage(canvas.toDataURL("image/png"), 'PNG', 20,20,-160,-200); // Set the image width and height to match A4 size
    });

    doc.save("Document.pdf");

    // End of downloading

    document.getElementById("downloadButton").innerHTML = "Click to download";
}
    </script>
</html>


<?php
$h_seat=$h_seat-1;
$sql="UPDATE hostel_owner SET h_seat=$h_seat WHERE h_id=$h_id";
$conn->query($sql);
$sql="INSERT INTO booking (h_id, c_id,b_date, check_in_date, check_out_date,b_days,total_bill) VALUES ('$h_id','$c_id','$currentDate','$check_in_date', '$check_out_date','$numberOfDays','$total_bill' )";
$insert = $conn->query($sql);
if($insert){
  ?>
  <script>alert("Booking Confirmed");</script>
  <?php
}
}?>





