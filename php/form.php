<?php
$conn = mysqli_connect("localhost", "root", "", "boatsafari");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

session_start();
$user_id = 2;

$query1 = "SELECT name FROM user_form WHERE ID = $user_id";
$result1 = mysqli_query($conn, $query1);
$name = mysqli_fetch_assoc($result1)['name'];

$query2 = "SELECT email FROM user_form WHERE ID = $user_id";
$result2 = mysqli_query($conn, $query2);
$email = mysqli_fetch_assoc($result2)['email'];

if (isset($_POST['save'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['New_pass'];
    $confirm_pass = $_POST['con_pass'];

    $query3 = "SELECT * FROM user_form WHERE ID = $user_id AND password = '$old_pass'";
    $result3 = mysqli_query($conn, $query3);
    $count = mysqli_num_rows($result3);

    if ($count == 0) {
        if ($new_pass == $confirm_pass) {
            $query = "UPDATE user_form SET password = '$new_pass' WHERE ID = $user_id";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data updated successfully.');</script>";
            } else {
                echo "<script>alert('Error updating data: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('New password and confirm password don\'t match');</script>";
        }
    } else {
        echo "<script>alert('Old password doesn\'t match');</script>";
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="form.css">
        <title>User Profile</title>
    </head>
    <body>
        <div class="box">
            <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input_box">
                        <span>User Name:</span><br>
                        <input type="text" name="update_name" value="<?php echo $name; ?>"  class="input"><br>
                        <span>Your Email:</span><br>
                        <input type="email" name="update_email" value="<?php echo $email; ?>" class="input"><br>
                
                    </div>
                    <div class="input_box">
                        <input type="hidden" name="old_name" value="php_code">
                        <span>Old Password:</span><br>
                        <input type="password" name="old_pass" class="input" placeholder="Enter Previous Password"><br><br>
                        <span>New Password:</span><br>
                        <input type="password" name="New_pass" class="input" placeholder="Enter New Password"><br>
                        <span>Confirm Password:</span><br>
                        <input type="password" name="con_pass" class="input" placeholder="Confirm Previous Password">
                    </div> 
                    
                    <button class="btn" id="back" onclick="location.href='home.php'">Go Back</button>
                    <input type="submit" value="Update Profile" name="save" class="btn">

                </form>
            </div>
        </div>
    </body>
</html>
