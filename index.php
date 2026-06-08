<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "1234")
    {
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hospital Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body class="login-bg">

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="login-box">

<h2 class="text-center mb-4">
Hospital Login
</h2>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Username
</label>

<input
type="text"
name="username"
class="form-control"
placeholder="Enter username"
required>

</div>

<div class="mb-3">

<label class="form-label">
Password
</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter password"
required>

</div>

<button
type="submit"
class="btn btn-primary w-100">

Login

</button>

</form>

<?php
if(isset($error))
{
    echo "<p class='text-danger mt-3 text-center'>$error</p>";
}
?>

</div>

</div>

<footer class="bg-primary text-white text-center p-3">

Hospital Management System © 2026

</footer>

<script src="script.js"></script>

</body>
</html>
