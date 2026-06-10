<?php
include("includes/db.php");

if(isset($_POST['add_patient']))
{
    $patient_id   = $_POST['patient_id'];
    $patient_name = $_POST['patient_name'];
    $age          = $_POST['age'];
    $gender       = $_POST['gender'];
    $disease      = $_POST['disease'];

    $sql = "INSERT INTO patients(patient_id, patient_name, age, gender, disease)
            VALUES('$patient_id','$patient_name','$age','$gender','$disease')";

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

    <title> Patient Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
                               placeholder="Enter Patient ID"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Patient Name</label>
                        <input type="text"
                               name="patient_name"
                               class="form-control"
                               placeholder="Enter Patient Name"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Age</label>
                        <input type="number"
                               name="age"
                               class="form-control"
                               placeholder="Enter Age"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gender
                        </label>

                        <div>

                            <input type="radio"
                                   id="male"
                                   name="gender"
                                   value="Male"
                                   required>

                            <label for="male">
                                Male
                            </label>

                            &nbsp;&nbsp;&nbsp;

                            <input type="radio"
                                   id="female"
                                   name="gender"
                                   value="Female">

                            <label for="female">
                                Female
                            </label>

                        </div>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Disease
                        </label>

                        <input type="text"
                               name="disease"
                               class="form-control"
                               placeholder="Enter Disease"
                               required>

                    </div>

                </div>

                <div class="mt-3">

                    <button type="submit"
                            name="add_patient"
                            class="btn btn-success">
                        Add
                    </button>

                </div>

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
                    </tr>

                </thead>

                <tbody>

                <?php

                $result = mysqli_query($conn, "SELECT * FROM patients");

                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>
                            <td>".$row['patient_id']."</td>
                            <td>".$row['patient_name']."</td>
                            <td>".$row['age']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['disease']."</td>
                          </tr>";
                }

                ?>

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>
