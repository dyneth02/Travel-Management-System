<?php
	$fullName = $_POST['fullname'];
	$email = $_POST['email'];
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
		$stmt = $conn->prepare("insert into payment(fullname,email,cardname,cardnumber,expmonth,expyear,cvv) 
        values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiiii", $fullName, $email, $cardName, $cardNumber, $expMonth, $expYear, $cvv);
		$execval = $stmt->execute();
		echo $execval;
		sleep(1);
		echo file_get_contents("HomePage.html");
		$stmt->close();
		$conn->close();
	}
?>