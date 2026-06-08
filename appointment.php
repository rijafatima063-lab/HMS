<?php
include("includes/db.php");

if(isset($_POST['add'])){

    $appointment_id = $_POST['appointment_id'];
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date = $_POST['appointment_date'];

    $sql = "INSERT INTO appointments
    (appointment_id, patient_name, doctor_name, appointment_date)
    VALUES
    ('$appointment_id','$patient_name','$doctor_name','$appointment_date')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Appointment Added Successfully');</script>";
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Appointments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">Appointment Management</h2>

<div class="card p-4 shadow">

<form method="POST">

<input type="text" name="appointment_id" class="form-control mb-3" placeholder="Appointment ID" required>

<input type="text" name="patient_name" class="form-control mb-3" placeholder="Patient Name" required>

<input type="text" name="doctor_name" class="form-control mb-3" placeholder="Doctor Name" required>

<input type="date" name="appointment_date" class="form-control mb-3" required>

<button type="submit" name="add" class="btn btn-primary">
Add Appointment
</button>

</form>

</div>

</div>
<div class="mt-5">

<table class="table table-bordered table-striped">

<thead class="table-primary">
<tr>
    <th>Appointment ID</th>
    <th>Patient Name</th>
    <th>Doctor Name</th>
    <th>Appointment Date</th>
</tr>
</thead>

<tbody>

<?php

$result = mysqli_query($conn, "SELECT * FROM appointments");

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>
            <td>".$row['appointment_id']."</td>
            <td>".$row['patient_name']."</td>
            <td>".$row['doctor_name']."</td>
            <td>".$row['appointment_date']."</td>
          </tr>";
}

?>

</tbody>

</table>

</div>

</body>
</html>