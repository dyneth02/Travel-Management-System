<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/Login.css">
   <link rel="stylesheet" href="css/Navi.css">
   <link rel="stylesheet" href="css/Footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
      <header>
      <img src="css/logo.png" class ="logo "alt="logo">
        <nav class="navigation">
            <a href="../Dasun/HTML/HomePage.html">Home</a>
            <a href="contact/index.php">Contact Us</a>
            <a href="#">Packages</a>
            <a href="AboutUs.html">About Us</a>
            <a href="register.php"><button class="bntRegister-popup">Register</button></a>
            <a href="login.php"><button class="bntLogin-popup">Login</button></a>
        </nav>
</header>
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="submit" name="submit" value="Login now" class="btn">
      <p>don't have an account? <a href="register.php">Regiser now</a></p>
   </form>

</div>

<div>
        <footer>
          <div class="footer">
            <div class="row">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              </div>
          <div class="row2">
          <ul>
          <li><a href="contact/index.php">Contact us</a></li>
          <li><a href="#">Our Services</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="T&C.html">Terms & Conditions</a></li>
          <li><a href="../Hiruni/FAQ/faq.php">FAQs</a></li>
          </ul>
          </div>
          
          <div class="row">
          Blue Waterways Copyright © 2021 Inferno - All rights reserved || Designed By: Dasun 
          </div>
          </div>
          </footer>
      </div>

</body>
</html>