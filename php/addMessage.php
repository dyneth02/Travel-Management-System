<?php
	$message = $_POST['msg'];

	// Database connection
	$conn = new mysqli('localhost','root','','boatsafari');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into message(message) 
        values(?)");
		$stmt->bind_param("s", $message);
		$execval = $stmt->execute();
		echo $execval;
		echo file_get_contents("HomePage.html");
		$stmt->close();
		$conn->close();
	}
?>