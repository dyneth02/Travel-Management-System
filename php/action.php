<?php
include 'database.php';

$location = $_POST['location'];
$package = $_POST['package'];
$boat = $_POST['boat'];
$guide = $_POST['guide'];
$noAdults = $_POST['noAdults'];
$nochild = $_POST['nochild'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNo = $_POST['phoneNo'];
$email = $_POST['email'];
$country = $_POST['country'];


$sql = "INSERT INTO reservation (location , package , boat , guide , noAdults , nochild , firstName , lastName , phoneNo , email , country) VALUES ('$location' , '$package' , '$boat' ,'$guide' , '$noAdults' , '$nochild' , '$firstName' , '$lastName' , '$phoneNo' , '$email' , '$country')";

$result = mysqli_query($conn , $sql);

if ($result){
    header('Location: ../Dasun/HTML/Payment.html'); 
}

?>