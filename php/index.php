<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <link rel="stylesheet" type="text/css" href="css/styles.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/Footer.css">
    <link rel="stylesheet" href="css/Navi.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    
    <title>Contact Us!</title>
  </head>
  <body>
  <header>
      <img src="css/logo.png" class ="logo "alt="logo">
        <nav class="navigation">
            <a href="../../Dasun/HTML/HomePage.html ">Home</a>
            <a href="#"class="activenavi">Contact Us</a>
            <a href="../../Malitha/package/boat.html">Packages</a>
            <a href="../../Dasun/HTML/AboutUs.html">About Us</a>
            <a href="../register.php"><button class="bntRegister-popup">Register</button></a>
            <a href="../login.php"><button class="bntLogin-popup">Login</button></a>


            <!-- <button class="bntLogin-popup">Login</button> -->
         </nav>
</header>

<br><br><br><br>
<section class="contact">
    <div class="content">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you</p>
            </div>
             <div class="container">
                <div class="contactInfo">
                    <div class="box">
                    <span class="material-symbols-sharp">location_on</span>
                        <div class="text">
                            <h3>Adress</h3>
                            <p>155/12,Telmple Road,<br>Colombo 06,<br>Sri Lanka.</p>
                        </div>
                    </div>
                    <div class="box">
                    <span class="material-symbols-sharp">call</span>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>+94 76 163 225</p>
                        </div>
                    </div>
                    <div class="box">
                    <span class="material-symbols-sharp">mail</span>
                        <div class="text">
                            <h3>Email</h3>
                            <p>Sabri@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                <form action="action.php" method="POST" autocomplete="off">
                        <h2>Send Massage<br><br></h2>
                        <div class="inputBox">
                              <label for="username">Username: </label>
                                <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="inputBox">
                                <label for="email">E-mail: </label>
                                <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="inputBox">
                                 <label for="contact">Contact: </label>
                                <input type="number" name="contact" id="contact" class="form-control" required>
                        </div>
                        <div class="inputBox">
                                <label for="address">Address: </label>
                                 <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="inputBox">
                              <label for="message">Message: </label>
                               <textarea name="message" id="message" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="Send">
                           
                        </div>
                       
                       
                    </form>
                </div>
            </div>
</section>



   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  
    <footer>
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
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">FAQ</a></li>
          </ul>
          </div>
          
          <div class="row">
          Blue Waterways Copyright © 2021 Inferno - All rights reserved || Designed By: Dasun 
          </div>
          </div>
          </footer>
</div>

</footer>
  </body>
</html>