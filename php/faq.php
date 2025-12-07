<?php
// Database connection details
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'boatsafari';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Retrieve FAQ data from the database
$selectQuery = "SELECT * FROM faq";
$result = mysqli_query($conn, $selectQuery);
$faqData = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Insert a new question into the database
if (isset($_POST['submit'])) {
    $question = $_POST['question'];

    // Use prepared statement to prevent SQL injection
    $insertQuery = "INSERT INTO faq (question) VALUES (?)";
    $insertStatement = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStatement, "s", $question);

    if (mysqli_stmt_execute($insertStatement)) {
        header('Location: faq.php');
        exit();
    } else {
        echo 'Error inserting question: ' . mysqli_stmt_error($insertStatement);
    }

    mysqli_stmt_close($insertStatement);
}

// Delete a question from the database
if (isset($_POST['delete'])) {
    $faqId = $_POST['faq_id'];

    // Use prepared statement to prevent SQL injection
    $deleteQuery = "DELETE FROM faq WHERE id = ?";
    $deleteStatement = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($deleteStatement, "i", $faqId);

    if (mysqli_stmt_execute($deleteStatement)) {
        header('Location: faq.php');
        exit();
    } else {
        echo 'Error deleting question: ' . mysqli_stmt_error($deleteStatement);
    }

    mysqli_stmt_close($deleteStatement);
}

// Update an answer in the database
if (isset($_POST['update'])) {
    $faqId = $_POST['faq_id'];
    $answer = $_POST['answer'];

    // Use prepared statement to prevent SQL injection
    $updateQuery = "UPDATE faq SET answer = ? WHERE id = ?";
    $updateStatement = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStatement, "si", $answer, $faqId);

    if (mysqli_stmt_execute($updateStatement)) {
        header('Location: faq.php');
        exit();
    } else {
        echo 'Error updating answer: ' . mysqli_stmt_error($updateStatement);
    }

    mysqli_stmt_close($updateStatement);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FAQ Page</title>
   <link rel="stylesheet" href="faq.css">
   <link rel="stylesheet"  href="../Navi.css">
   <link rel="stylesheet"  href="../Footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
<header>
      <img src="../logo.png" class="logo" alt="logo">
      <nav class="navigation">
         <a href="../../Dasun/HTML/HomePage.html">Home</a>
         <a href="../../Sabri/contact/index.php">Contact Us</a>
         <a href="../../Malitha/package/boat.html">Packages</a>
         <a href="../../Dasun/HTML/AboutUs.html">About Us</a>
         <a href="../../Sabri/register.php"><button class="bntRegister-popup">Register</button></a>
         <a href="../../Sabri/login.php"><button class="bntLogin-popup">Login</button></a>
      </nav>
   </header>
   <div class="container">
      <h1>FAQ Page</h1>

      <?php if (!empty($faqData)): ?>
         <?php foreach ($faqData as $faq): ?>
            <div class="faq-item">
               <div class="faq-question"><?php echo $faq['question']; ?></div>
               <?php if (!empty($faq['answer'])): ?>
                  <div class="faq-answer"><?php echo $faq['answer']; ?></div>
               <?php else: ?>
                  <form class="answer-form" action="" method="post">
                     <input type="hidden" name="faq_id" value="<?php echo $faq['id']; ?>">
                     <input type="text" name="answer" placeholder="Type the answer" required>
                     <input type="submit" name="update" value="Submit Answer">
                  </form>
               <?php endif; ?>
               <form action="" method="post">
                  <input type="hidden" name="faq_id" value="<?php echo $faq['id']; ?>">
                  <input class="delete-button" type="submit" name="delete" value="Delete Question">
               </form>
            </div>
         <?php endforeach; ?>
      <?php else: ?>
         <p>No FAQ items found.</p>
      <?php endif; ?>

      <form action="" method="post">
         <label for="question">Ask a Question:</label>
         <input type="text" id="question" name="question" required>
         <input type="submit" name="submit" value="Submit">
      </form>
   </div>
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
                  <li><a href="../../Sabri/contact/index.php">Contact us</a></li>
                  <li><a href="#">Our Services</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="../../Sandali/T&C.html">Terms & Conditions</a></li>
                  <li><a href="#">FAQs</a></li>
               </ul>
            </div>
            
            <div class="row">
               Blue Waterways Copyright © 2021 Inferno - All rights reserved ||
               Designed By: Dasun
            </div>
         </div>
      </footer>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
