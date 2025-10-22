<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sampledb";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE studentinfo(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";



if(mysqli_query($conn, $sql)) {
echo "meron ka ng table";
} else {
echo "bobo mali" .mysqli_error ($conn);
}
mysqli_close($conn);

?>