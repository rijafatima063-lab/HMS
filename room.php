<?php
include("includes/db.php");

if(isset($_POST['add_room']))
{
    $room_id = $_POST['room_id'];
    $room_type = $_POST['room_type'];
    $availability = $_POST['availability'];

    $sql = "INSERT INTO rooms(room_id, room_type, room_status)
VALUES('$room_id','$room_type','$availability')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Room Added Successfully');</script>";
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

<title>Rooms</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">Room Management</h2>

<div class="card p-4 shadow">

<form method="POST">

<input type="text"
name="room_id"
class="form-control mb-3"
placeholder="Room ID"
required>

<input type="text"
name="room_type"
class="form-control mb-3"
placeholder="Room Type"
required>

<input type="text"
name="availability"
class="form-control mb-3"
placeholder="Availability"
required>

<button type="submit"
name="add_room"
class="btn btn-primary">
Add Room </button>

</form>

</div>

<div class="mt-4">

<table class="table table-bordered">

<thead>
<tr>
<th>Room ID</th>
<th>Room Type</th>
<th>Availability</th>
</tr>
</thead>

<tbody>

<?php

$result = mysqli_query($conn,"SELECT * FROM rooms");

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>
            <td>".$row['room_id']."</td>
            <td>".$row['room_type']."</td>
           <td>".$row['room_status']."</td>
          </tr>";
}

?>

</tbody>

</table>

</div>

</div>

</body>
</html>
