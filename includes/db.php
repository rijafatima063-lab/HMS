<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "hospitaldb"
);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>