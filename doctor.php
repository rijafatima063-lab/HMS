<?php
include("includes/db.php");

if(isset($_POST['add'])){

    $doctor_id = $_POST['doctor_id'];
    $doctor_name = $_POST['doctor_name'];
    $specialization = $_POST['specialization'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO doctors
    (doctor_id, doctor_name, specialization, phone)
    VALUES
    ('$doctor_id','$doctor_name','$specialization','$phone')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Doctor Added Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Doctor Page</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-primary">
<div class="container-fluid">
<span class="navbar-brand">
Hospital Management System
</span>
</div>
</nav>

<div class="container mt-5">

<h2 class="text-center mb-4">
Doctor Management
</h2>

<div class="card p-4 shadow">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Doctor ID</label>
<input type="text"
name="doctor_id"
class="form-control"
placeholder="Enter Doctor ID"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Doctor Name</label>
<input type="text"
name="doctor_name"
class="form-control"
placeholder="Enter Doctor Name"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Specialization</label>
<input type="text"
name="specialization"
class="form-control"
placeholder="Enter Specialization"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Contact Number</label>
<input type="text"
name="phone"
class="form-control"
placeholder="Enter Contact"
required>
</div>

</div>

<div class="mt-3">
<button type="submit" name="add" class="btn btn-success">
Add Doctor
</button>
</div>

</form>

</div>

<div class="mt-5">

<table class="table table-bordered table-striped">

<thead class="table-primary">
<tr>
<th>Doctor ID</th>
<th>Name</th>
<th>Specialization</th>
<th>Contact</th>
</tr>
</thead>

<tbody>

<?php

$result = mysqli_query($conn,"SELECT * FROM doctors");

while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['doctor_id']; ?></td>
<td><?php echo $row['doctor_name']; ?></td>
<td><?php echo $row['specialization']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>