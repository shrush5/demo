<?php
include_once 'database.php';

if(isset($_POST['save']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = md5($password);
    //For inserting the values to mysql database
    
    // $sql = "INSERT INTO admindb(fname,lname,email,password)
    // VALUES ('$fname','$lname','$email',md5('$password'))";
    $sql = "INSERT INTO admindb(fname,lname,email,password)
    VALUES ('$fname','$lname','$email','$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
 }
 mysqli_close($conn);
}
?>
