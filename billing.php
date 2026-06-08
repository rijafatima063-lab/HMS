<?php
include("includes/db.php");

if(isset($_POST['add_bill']))
{
    $bill_id = $_POST['bill_id'];
    $patient_name = $_POST['patient_name'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO billing(bill_id, patient_name, amount)
            VALUES('$bill_id','$patient_name','$amount')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Bill Generated Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Billing Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Billing Management
    </h2>

    <div class="card p-4 shadow">

        <form method="POST">

            <input type="text"
                   name="bill_id"
                   class="form-control mb-3"
                   placeholder="Bill ID"
                   required>

            <input type="text"
                   name="patient_name"
                   class="form-control mb-3"
                   placeholder="Patient Name"
                   required>

            <input type="number"
                   name="amount"
                   class="form-control mb-3"
                   placeholder="Amount"
                   required>

            <button type="submit"
                    name="add_bill"
                    class="btn btn-primary">
                Generate Bill
            </button>

        </form>

    </div>

    <div class="mt-5">

        <table class="table table-bordered table-striped">

            <thead class="table-primary">

                <tr>
                    <th>Bill ID</th>
                    <th>Patient Name</th>
                    <th>Amount</th>
                </tr>

            </thead>

            <tbody>

            <?php

            $result = mysqli_query($conn,"SELECT * FROM billing");

            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>
                        <td>".$row['bill_id']."</td>
                        <td>".$row['patient_name']."</td>
                        <td>".$row['amount']."</td>
                      </tr>";
            }

            ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>