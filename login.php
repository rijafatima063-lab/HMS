<?php
include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        header("Location: dashboard.html");
        exit();

    } else {

        $error = "Invalid Username or Password!";
    }
}
?>
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Hospital Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body class="login-body">

    <div class="login-box">

        <h2>Hospital Login</h2>

        <form method="POST" action="login.php">

          
            <input type="text" id="username" name="username" placeholder="Username" required>

            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>

        </form>

        <p id="errorMsg">
    <?php
    if(isset($error)){
        echo $error;
    }
    ?>
</p>

    </div>

    

</body>
</html>