```php
<?php
include("includes/db.php");

/* DELETE PATIENT */

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM patients WHERE id='$id'");

    echo "<script>
    alert('Patient Deleted Successfully');
    window.location='patient.php';
    </script>";
}

/* ADD PATIENT */

if(isset($_POST['add_patient']))
{
    $patient_id   = $_POST['patient_id'];
    $patient_name = $_POST['patient_name'];
    $age          = $_POST['age'];
    $gender       = $_POST['gender'];
    $disease      = $_POST['disease'];

    $sql = "INSERT INTO patients
    (patient_id, patient_name, age, gender, disease)
    VALUES
    ('$patient_id','$patient_name','$age','$gender','$disease')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Patient Added Successfully');</script>";
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Patient Management</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

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
Patient Management
</h2>

<div class="card p-4 shadow">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Patient ID</label>
<input type="text"
name="patient_id"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Patient Name</label>
<input type="text"
name="patient_name"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Age</label>
<input type="number"
name="age"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">

<label class="form-label">
Gender
</label>

<div>

<input type="radio"
name="gender"
value="Male"
required>
Male

&nbsp;&nbsp;&nbsp;

<input type="radio"
name="gender"
value="Female">
Female

</div>

</div>

<div class="col-md-12 mb-3">
<label class="form-label">
Disease
</label>

<input type="text"
name="disease"
class="form-control"
required>

</div>

</div>

<button type="submit"
name="add_patient"
class="btn btn-success">
Add Patient
</button>

</form>

</div>

<div class="mt-5">

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>
<th>Patient ID</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Disease</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php

$result = mysqli_query($conn,
"SELECT * FROM patients");

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['patient_id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['age']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['disease']; ?></td>

<td>

<a href="patient.php?delete=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure?')">

Delete

</a>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</body>
</html>
```
