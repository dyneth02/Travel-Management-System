<!DOCTYPE html>
<html>
<head>

  <title>PaymentPage</title>

  <link rel="stylesheet" type="text/css" href="../CSS/Payment.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../CSS/Footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="../CSS/Navi.css">
</head>
<body>
    <header>
      <img src="../images/logo.png" class ="logo "alt="logo">
        <nav class="navigation">
            <a href="HomePage.html">Home</a>
            <a href="#">Safari</a>
            <a href="#">Packages</a>
            <a href="AboutUs.html">About Us</a>
            <button class="bntRegister-popup">Register</button>
            <button class="bntLogin-popup">Login</button>
        </nav>
    </header>
    <div class="container">
      <form method="post" action="payment.php">
          <div class="col-85">
            <h3>Payment</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York" required>

          </div>
    <div class="col-85">
        
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
          <i class="fa fa-cc-visa" style="color:navy;"></i>
          <i class="fa fa-cc-amex" style="color:blue;"></i>
          <i class="fa fa-cc-mastercard" style="color:red;"></i>
          <i class="fa fa-cc-discover" style="color:orange;"></i>
        </div>
        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
        <label for="ccnum">Credit card number</label>
        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
        
          <div class="col-65">
            <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
        <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="2018" required>
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352" required>
          </div>
          <div>
            <input type="submit" value="Pay" class="btn">
            <input type="submit" value="Update Card Details">
            <input type="submit" value="Delete Card Details">
          </div>
         
      </div>
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
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">FAQ</a></li>
              </ul>
              </div>
              
              <div class="row">
              INFERNO Copyright © 2021 Inferno - All rights reserved || Designed By: Dasun
              </div>
              </div>
              </footer>
        </div>
        <script src="../JS/Payment.js"></script>
</body>
</html>      

<?php
	$fullName = $_POST['fullname'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$cardName = $_POST['cardname'];
    $cardNumber = $_POST['cardnumber'];
    $expMonth = $_POST['expmonth'];
    $expYear = $_POST['expyear'];
    $cvv = $_POST['cvv'];

	// Database connection
	$conn = new mysqli('localhost','root','','boatsafari');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into payment(fullname,email,city,cardname,cardnumber,expmonth,expyear,cvv) 
        values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiiii", $fullName, $email, $city, $cardName, $cardNumber, $expMonth, $expYear, $cvv);
		$execval = $stmt->execute();
		echo $execval;
		sleep(1);
		echo file_get_contents("HomePage.html");
		$stmt->close();
		$conn->close();
	}

    // CREATE - Save card details
if (isset($_POST['save'])) {
    $cardName = $_POST['cardName'];
    $cardNumber = $_POST['cardNumber'];
    $expMonth = $_POST['expMonth'];
    $expYear = $_POST['expYear'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO payment_details (cardname,cadnumber,expmonth,expyear,cvv)
            VALUES ('$cardName', '$cardNumber', '$expMonth', '$expYear', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "Card details saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// READ - Fetch all card details
$sql = "SELECT * FROM payment_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Full Name: " . $row['fullname'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "City: " . $row['city'] . "<br>";
        echo "Card Name: " . $row['cardname'] . "<br>";
        echo "Card Number: " . $row['cardnumber'] . "<br>";
        echo "Expiry Month: " . $row['expmonth'] . "<br>";
        echo "Expiry Year: " . $row['expyear'] . "<br>";
        echo "CVV: " . $row['cvv'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No card details found.";
}

// UPDATE - Update card details
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $cardholderName = $_POST['cardName'];
    $cardNumber = $_POST['cardNumber'];
    $expMonth = $_POST['expMonth'];
    $expYear = $_POST['expYear'];
    $cvv = $_POST['cvv'];

    $sql = "UPDATE payment_details
            SET cardname = '$cardName', cardnumber = '$cardNumber', expmonth = '$expMonth', expyear = '$expYear', cvv = '$cvv'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Card details updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// DELETE - Delete card details
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM payment_details WHERE id = $id";
}
    if ($conn->query($sql) === TRUE) {
        echo "Card details deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
?>