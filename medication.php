<?php
include("includes/db.php");

if(isset($_POST['add_medication']))
{
    $medication_id = $_POST['medication_id'];
    $patient_id = $_POST['patient_id'];
    $medicine_name = $_POST['medicine_name'];
    $dosage = $_POST['dosage'];
    $instructions = $_POST['instructions'];

    $sql = "INSERT INTO medication
    (medication_id, patient_id, medicine_name, dosage, instructions)
    VALUES
    ('$medication_id','$patient_id','$medicine_name','$dosage','$instructions')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Medication Added Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Medication Management</title>

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
Medication Management
</h2>

<div class="card p-4 shadow">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Medication ID</label>
<input type="text"
name="medication_id"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Patient ID</label>
<input type="text"
name="patient_id"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Medicine Name</label>
<input type="text"
name="medicine_name"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Dosage</label>
<input type="text"
name="dosage"
class="form-control"
required>
</div>

<div class="col-md-12 mb-3">
<label>Instructions</label>
<textarea
name="instructions"
class="form-control"
rows="3"
required></textarea>
</div>

</div>

<button type="submit"
name="add_medication"
class="btn btn-success">
Add Medication
</button>

</form>

</div>

<div class="mt-5">

<table class="table table-bordered table-striped">

<thead class="table-primary">
<tr>
<th>Medication ID</th>
<th>Patient ID</th>
<th>Medicine</th>
<th>Dosage</th>
<th>Instructions</th>
</tr>
</thead>

<tbody>

<?php

$result = mysqli_query($conn,"SELECT * FROM medication");

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>
            <td>".$row['medication_id']."</td>
            <td>".$row['patient_id']."</td>
            <td>".$row['medicine_name']."</td>
            <td>".$row['dosage']."</td>
            <td>".$row['instructions']."</td>
          </tr>";
}

?>

</tbody>

</table>

</div>

</div>

</body>
</html>