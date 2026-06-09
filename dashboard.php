<?php
include("includes/db.php");

$patients = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM patients"))['total'];
$doctors = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM doctors"))['total'];
$appointments = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM appointments"))['total'];
$staff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM staff"))['total'];
$rooms = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM rooms"))['total'];
$billing = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM billing"))['total'];
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hospital Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="d-flex">



<div class="bg-primary text-white p-4" style="width:250px; min-height:100vh;">

<h3 class="mb-4">HMS</h3>

<ul class="nav flex-column">

<li class="nav-item mb-2">
<a href="dashboard.php" class="nav-link text-white">
<i class="fa-solid fa-gauge me-2"></i> Dashboard
</a>
</li>

<li class="nav-item mb-2">
<a href="patient.php" class="nav-link text-white">
<i class="fa-solid fa-user-injured me-2"></i> Patients
</a>
</li>

<li class="nav-item mb-2">
<a href="doctor.php" class="nav-link text-white">
<i class="fa-solid fa-user-doctor me-2"></i> Doctors
</a>
</li>

<li class="nav-item mb-2">
<a href="appointment.php" class="nav-link text-white">
<i class="fa-solid fa-calendar-check me-2"></i> Appointments
</a>
</li>

<li class="nav-item mb-2">
<a href="diagnosis.php" class="nav-link text-white">
<i class="fa-solid fa-stethoscope me-2"></i> Diagnosis
</a>
</li>

<li class="nav-item mb-2">
<a href="medication.php" class="nav-link text-white">
<i class="fa-solid fa-pills me-2"></i> Medication
</a>
</li>

<li class="nav-item mb-2">
<a href="billing.php" class="nav-link text-white">
<i class="fa-solid fa-file-invoice-dollar me-2"></i> Billing
</a>
</li>

<li class="nav-item mb-2">
<a href="room.php" class="nav-link text-white">
<i class="fa-solid fa-bed me-2"></i> Rooms
</a>
</li>

<li class="nav-item mb-2">
<a href="staff.php" class="nav-link text-white">
<i class="fa-solid fa-users me-2"></i> Staff
</a>
</li>

</ul>

</div>

<!-- Main Content -->

<div class="container-fluid p-4">

<h2 class="mb-4 text-center">Hospital Management System Dashboard</h2>

<div class="row mb-4">

<div class="col-md-2">
<div class="card text-center p-3 bg-primary text-white">
<h3><?php echo $patients; ?></h3>
<p>Patients</p>
</div>
</div>

<div class="col-md-2">
<div class="card text-center p-3 bg-success text-white">
<h3><?php echo $doctors; ?></h3>
<p>Doctors</p>
</div>
</div>

<div class="col-md-2">
<div class="card text-center p-3 bg-warning">
<h3><?php echo $appointments; ?></h3>
<p>Appointments</p>
</div>
</div>

<div class="col-md-2">
<div class="card text-center p-3 bg-info text-white">
<h3><?php echo $staff; ?></h3>
<p>Staff</p>
</div>
</div>

<div class="col-md-2">
<div class="card text-center p-3 bg-secondary text-white">
<h3><?php echo $rooms; ?></h3>
<p>Rooms</p>
</div>
</div>

<div class="col-md-2">
<div class="card text-center p-3 bg-danger text-white">
<h3><?php echo $billing; ?></h3>
<p>Bills</p>
</div>
</div>

</div>

<div class="row g-4">

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Patients</h4>
<p>Manage patient records</p>
<a href="patient.php" class="btn btn-primary">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Doctors</h4>
<p>Manage doctor records</p>
<a href="doctor.php" class="btn btn-success">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Appointments</h4>
<p>Manage appointments</p>
<a href="appointment.php" class="btn btn-warning">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Diagnosis</h4>
<p>Manage diagnosis</p>
<a href="diagnosis.php" class="btn btn-info">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Medication</h4>
<p>Manage medication</p>
<a href="medication.php" class="btn btn-primary">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Billing</h4>
<p>Manage billing</p>
<a href="billing.php" class="btn btn-danger">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Rooms</h4>
<p>Manage rooms</p>
<a href="room.php" class="btn btn-secondary">Open</a>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center shadow">
<h4>Staff</h4>
<p>Manage staff records</p>
<a href="staff.php" class="btn btn-dark">Open</a>
</div>
</div>

</div>

</div>

</div>

</body>
</html>
