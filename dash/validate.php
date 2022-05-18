<?php

session_start();

include_once 'database.php';

if(isset($_POST['save'])) {
    
    function validate($data){
        $data = trim($data);

        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    
    if (empty($email)) {
        echo "Email Required";
        exit();

    }else if(empty($pass)){
        echo "Password Required";
        exit();

    }else{
        $sql = "SELECT * FROM admindb WHERE email = '$email' and password = '$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {

                echo "Logged in!";
                header("location:http://127.0.0.1:5500/dash/dashborad.html");
                $_SESSION['email'] = $row['email'];

                $_SESSION['fname'] = $row['fname'];

                exit();
            }
            else{
                echo "Invalid Credentials";
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
    <title>Log In</title>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="validate.php" method = "post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" />
        <br /><br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br /><br />
        <button id="Login" name="save">Submit</button>
        </form>
    </div>
</body>
</html>