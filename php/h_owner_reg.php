
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Hostel Owner Registration</title>
    <link rel="stylesheet" href="css/hostel_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="nav">
    <ul>
      <!--<li class="logo"><img src="css/logo2.jpg" alt=""></li>-->
      <li class="account"><a class="active"  href="account.php">Account</a></li>
      
      <li><a href="hostel.php">Hostel & Services</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="title">Registration</div>
    <div class="sub_title">Personal Details:</div>
    <div class="content">

      <form action="o_reg_backend.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="o_name" required pattern="[A-Za-z ]+" title="Only letters and spaces are allowed">
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="o_email" required  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="o_mob" required pattern="[0-9]{10}" title="Please enter a 10-digit mobile number">
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="o_pass" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="Please enter a password with at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="oc_pass" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="Please enter a password with at least 8 characters, including one uppercase letter, one lowercase letter, one digit, and one special character">
          </div>
        </div>
        <hr>
<!--   Hall Detail section -->
        <div class="sub_title">Hostel Details:</div>
        <div class="content">
      
        <div class="user-details">
          <div class="input-box">
            <span class="details">Hostel Name</span>
            <input type="text" placeholder="Enter Hostel name" name="h_name" required pattern="[A-Za-z ]+" title="Only letters and spaces are allowed">
          </div>
          <div class="input-box">
            <span class="details">Hostel Seats</span>
            <input type="number" placeholder="Enter Hostel Seats" name="h_seat" required min=10>
          </div>
          <div class="input-box">
            <span class="details">Hostel Seat Price</span>
            <input type="number" placeholder="Enter Hostel Seat Price" name="h_price" required min=100>
          </div>
          <div class="input-box">
            <span class="details">Hostel Services</span>
            <input type="text" placeholder="Enter Hostel Services" name="h_services" required>
          </div>
          <div class="input-box">
            <span class="details">Hostel Description</span>
            <textarea id="paragraphInput" name="h_desc" placeholder="Enter Hostel Description"rows="3" cols="40" required></textarea>
          </div>
          <div class="input-box">
            <span class="details">Hostel Address</span>
            <input type="text" placeholder="Enter Hostel Address" name="h_add" required>
          </div>
          

          <div class="input-box">
            <span class="details">Payment QR Code</span>
            <input type="file" id="imageFileInput" name="p_qr" accept="image/png, image/jpeg, image/jpg" required>
          </div>
          <div class="input-box">
            <span class="details">Upload 5 Hostel Images</span>
            <input type="file"  name="h1_img"  required>
            <input type="file" id="imageFileInput" name="h2_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h3_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h4_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h5_img" accept="image/png, image/jpeg, image/jpg" required>
          </div>
         
        </div></div>
        <div class="button">
          <input type="submit"  name="Register">
        </div></div></div></div></div>
            </form>
    </div>
  </div>

</body>
</html>
