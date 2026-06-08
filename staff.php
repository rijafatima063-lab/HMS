<?php
include("includes/db.php");

if(isset($_POST['add_staff']))
{
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
    $role = $_POST['role'];

    $sql = "INSERT INTO staff(staff_id, staff_name, role)
            VALUES('$staff_id','$staff_name','$role')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Staff Added Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Staff Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Staff Management
    </h2>

    <div class="card p-4 shadow">

        <form method="POST">

            <input type="text"
                   name="staff_id"
                   class="form-control mb-3"
                   placeholder="Staff ID"
                   required>

            <input type="text"
                   name="staff_name"
                   class="form-control mb-3"
                   placeholder="Staff Name"
                   required>

            <input type="text"
                   name="role"
                   class="form-control mb-3"
                   placeholder="Role"
                   required>

            <button type="submit"
                    name="add_staff"
                    class="btn btn-primary">
                Add Staff
            </button>

        </form>

    </div>

    <div class="mt-5">

        <table class="table table-bordered table-striped">

            <thead class="table-primary">

                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Role</th>
                </tr>

            </thead>

            <tbody>

            <?php

            $result = mysqli_query($conn,"SELECT * FROM staff");

            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>
                        <td>".$row['staff_id']."</td>
                        <td>".$row['staff_name']."</td>
                        <td>".$row['role']."</td>
                      </tr>";
            }

            ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>