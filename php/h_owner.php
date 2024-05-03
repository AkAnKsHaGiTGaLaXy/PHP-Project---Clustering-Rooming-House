
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="css/h_owner.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="nav">
    <ul>
        <li class="logo"><img src="css/logo2.jpg" alt=""></li>
      <li class="account"><a class="active"  href="account.php">Account</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      
      <li><a href="halls.php">Halls & Services</a></li>
      <li><a href="about.html">About Us</a></li>
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
            <input type="text" placeholder="Enter your name" name="o_name" required>
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="o_email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="o_mob" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your Address" name="o_add" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="o_pass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="oc_pass" required>
          </div>
        </div>
        <hr>
<!--   Hall Detail section -->
        <div class="sub_title">Hall Details:</div>
        <div class="content">
      
        <div class="user-details">
          <div class="input-box">
            <span class="details">Hall Name</span>
            <input type="text" placeholder="Enter Hall name" name="h_name" required>
          </div>
          <div class="input-box">
            <span class="details">Hall Price</span>
            <input type="text" placeholder="Enter Hall Price" name="h_price" required>
          </div>
          <div class="input-box">
            <span class="details">Hall Description</span>
            <textarea id="paragraphInput" name="h_desc" placeholder="Enter Hall Description"rows="3" cols="40" required></textarea>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter Hall Address" name="h_add" required>
          </div>
          <div class="input-box">
            <span class="details">Upload Minimum 5 Hostels Images</span>
            <input type="file"  name="h1_img"  required>
            <input type="file" id="imageFileInput" name="h2_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h3_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h4_img" accept="image/png, image/jpeg, image/jpg" required>
            <input type="file" id="imageFileInput" name="h5_img" accept="image/png, image/jpeg, image/jpg" required>
          </div>

          <div class="input-box">
            <span class="details">Payment QR Code</span>
            <input type="file" id="imageFileInput" name="p_qr" accept="image/png, image/jpeg, image/jpg" required>
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
