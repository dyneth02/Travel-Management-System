<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
 

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            // move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/Login.css">
   <link rel="stylesheet" href="css/Navi.css">
   <link rel="stylesheet" href="css/Footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

   <!-- custom JavaScript -->
   <script>
      function validateForm() {
         var name = document.forms["registrationForm"]["name"].value;
         var email = document.forms["registrationForm"]["email"].value;
         var password = document.forms["registrationForm"]["password"].value;
         var cpassword = document.forms["registrationForm"]["cpassword"].value;
         
         if (name == "") {
            alert("Please enter your name.");
            return false;
         }

         if (email == "") {
            alert("Please enter your email.");
            return false;
         }

         if (password == "") {
            alert("Please enter your password.");
            return false;
         }

         if (cpassword == "") {
            alert("Please confirm your password.");
            return false;
         }

         if (password !== cpassword) {
            alert("Password and confirm password do not match.");
            return false;
         }
      }
   </script>
</head>
<body>
   <header>
      <img src="css/logo.png" class="logo" alt="logo">
      <nav class="navigation">
         <a href="../Dasun/HTML/HomePage.html">Home</a>
         <a href="../Sabri/contact/index.php">Contact Us</a>
         <a href="../Malitha/package/boat.html">Packages</a>
         <a href="AboutUs.html">About Us</a>
         <a href="register.php"><button class="bntRegister-popup">Register</button></a>
         <a href="login.php"><button class="bntLogin-popup">Login</button></a>
      </nav>
   </header>
   <div class="form-container">
      <form name="registrationForm" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
         <h3>Register now</h3>
         <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
         ?>
         <input type="text" name="name" placeholder="Enter username" class="box" >
         <input type="email" name="email" placeholder="Enter email" class="box" >
         <input type="password" name="password" placeholder="Enter password" class="box" >
         <input type="password" name="cpassword" placeholder="Confirm password" class="box" >
         
         <input type="submit" name="submit" value="Register now" class="btn">
         <p>already have an account? <a href="login.php">Login now</a></p>
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
                  <li><a href="#">Contact us</a></li>
                  <li><a href="#">Our Services</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="../Sandali/T&C.html">Terms & Conditions</a></li>
                  <li><a href="../Hiruni/FAQ/faq.php">FAQs</a></li>
               </ul>
            </div>
            
            <div class="row">
               Blue Waterways Copyright © 2021 Inferno - All rights reserved ||
               Designed By: Dasun 
            </div>
         </div>
      </footer>
   </div>
</body>
</html>
