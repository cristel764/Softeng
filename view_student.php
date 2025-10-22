<?php
require ('connection.php');

if (isset($_GET['delete'])) {
$id = $_GET['delete'];
mysqli_query($conn, "DELETE FROM studinform WHERE id=$id");
header("Location: view_student.php");
exit;
}

$sql = "SELECT * FROM studinform ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title> Students Information</title>
<style>
table {
border-collapse: collapse;
width: 90%;
margin: 20px auto;
font-family: Arial, sans-serif;
}

th, td {
border: 1px solid #999;
padding: 8px 12px;
text-align: left;
}
h2 {
text-align: center;
font-family: Arial, sans-serif;
}
a.btn {
text-decoration: none;
padding: 4px 8px;
border-radius: 4px;
font-size: 14px;
margin-right: 4px;
}
.btn-update {
background-color: #4CAF50;
color: white;
}
.btn-delete {
background-color: #f44336;
color: white;
}
</style>
</head>
<body>
<h2> Student Information Record</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Age</th>
<th>Course</th>
<th>Year Level</th>
<th>Gender</th>
<th>Address</th>
<th>Scholar</th>
<th>Date</th>
<th>Action</th>
</tr>
<?php
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['age']."</td>";
echo "<td>".$row['course']."</td>";
echo "<td>".$row['yearlevel']."</td>";
echo "<td>".$row['gender']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['scholar']."</td>";
echo "<td>".$row['date']."</td>";
echo "<td>
<a class= 'btn btn-update' href='update_student.php?id=".$row['id'].
"'>Update</a><br><br>
<a class='btn btn-delete' href='view_student.php?delete=".$row['id']."'
onclick=\"return confirm('Are you sure?');\">Delete</a>
</td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='7' style='text-align:center;'>No records found</td></tr>";
}
?>
</table>
</body>
</html>














