<?php
include("includes/db.php");

if(isset($_POST['add_diagnosis']))
{
    $diagnosis_id = $_POST['diagnosis_id'];
    $patient_id = $_POST['patient_id'];
    $symptoms = $_POST['symptoms'];
    $disease = $_POST['disease'];
    $diagnosis_date = $_POST['diagnosis_date'];

    $sql = "INSERT INTO diagnosis
    (diagnosis_id, patient_id, symptoms, disease, diagnosis_date)
    VALUES
    ('$diagnosis_id','$patient_id','$symptoms','$disease','$diagnosis_date')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Diagnosis Added Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title> Diagnosis Management </title>

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
Diagnosis Management
</h2>

<div class="card p-4 shadow">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Diagnosis ID</label>
<input type="text"
name="diagnosis_id"
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

<div class="col-md-12 mb-3">
<label>Symptoms</label>
<input type="text"
name="symptoms"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Disease</label>
<input type="text"
name="disease"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Date</label>
<input type="date"
name="diagnosis_date"
class="form-control"
required>
</div>

</div>

<button type="submit"
name="add_diagnosis"
class="btn btn-success">
Add Diagnosis
</button>

</form>

</div>

<div class="mt-5">

<table class="table table-bordered table-striped">

<thead class="table-primary">
<tr>
<th>Diagnosis ID</th>
<th>Patient ID</th>
<th>Symptoms</th>
<th>Disease</th>
<th>Date</th>
</tr>
</thead>

<tbody>

<?php

$result = mysqli_query($conn,"SELECT * FROM diagnosis");

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>
            <td>".$row['diagnosis_id']."</td>
            <td>".$row['patient_id']."</td>
            <td>".$row['symptoms']."</td>
            <td>".$row['disease']."</td>
            <td>".$row['diagnosis_date']."</td>
          </tr>";
}

?>

</tbody>

</table>

</div>

</div>

</body>
</html>
