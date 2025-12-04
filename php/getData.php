<?php
  $conn = new mysqli('localhost', 'root', '', 'boatsafari');

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $email = $_GET['email'];

  // Prepare the SQL query with a placeholder for the email
  $stmt = $conn->prepare("SELECT cardname, cardnumber, expmonth, expyear, cvv FROM payment WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();

  // Get the result
  $result = $stmt->get_result();

  $data = array();
  
  // Process the query result
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = array(
        'cardname' => $row["cardname"],
        'cardnumber' => $row["cardnumber"],
        'expmonth' => $row["expmonth"],
        'expyear' => $row["expyear"],
        'cvv' => $row["cvv"]
      );
    }
  } else {
    echo "No data found!";
  }

  // Close the statement and the connection
  $stmt->close();
  $conn->close();

  // Convert the data array to JSON
  $jsonData = json_encode($data);

  // Send the JSON response
  header('Content-Type: application/json');
  echo $jsonData;
?>