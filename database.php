<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE sampledb";
if(mysqli_query($conn, $sql)) {
echo "meron ka ng database";
} else {
echo "bobo mali" .mysqli_error ($conn);
}
mysqli_close($conn);

?>