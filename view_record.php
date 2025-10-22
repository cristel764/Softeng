<?php
require ('connection.php');
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
mysqli_query($conn, "DELETE FROM books WHERE id=$id");
header("Location: view_record.php");
exit;
}

$sql = "SELECT * FROM books ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Record</title>
<style>
table {
border-collapse: collapse;
width: 90%;
margin: 20px auto;
font-family: Arial, sans-serif;
}
th, td {
border: 1px solid #999;
padding:8px 12px;
text-align: left;
}
th {
background: #f4f4f4;
}
h2 {
text-align: center;
font-family: Arial, sans-serif;
}
a.btn {
text-decoration: none;
padding: 4px 8px;
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
<h2>Book Records</h2>

<table>
<tr>
<th>ID</th>
<th>Title</th>
<th>Author</th>
<th>Pages</th>
<th>Genre</th>
<th>Availability</th>
<th>Description</th>
<th>Action</th>
</tr>
<?php
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td>".$row['author']."</td>";
echo "<td>".$row['pages']."</td>";
echo "<td>".$row['genre']."</td>";
echo "<td>".$row['availability']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td>
<a class='btn btn-update' href='update_record.php?id=".$row['id'].
"'>Update</a>
<a class='btn btn-delete' href='view_record.php?delete=".$row['id']."'
onclick=\"return confirm('Are you sure you want to delete this?');\">Delete</a>
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











