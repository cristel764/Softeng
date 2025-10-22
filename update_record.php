<?php
require ('connection.php');

if (!isset($_GET['id'])) {
die("No title ID provided.");
}
$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id=$id LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
die("Title not found.");
}

$book = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$title = $_POST['title'];
$author = $_POST['author'];
$pages = $_POST['pages'];
$genre = $_POST['genre'];
$availability = $_POST['availability'];
$description = $_POST['description'];


$update = "UPDATE books
SET title='$title', author='$author', pages='$pages', genre='$genre', availability='$availability', description='$description'
WHERE id=$id";

if (mysqli_query($conn, $update)) {
header("Location: view_record.php");
exit;
} else {
echo "Error updating record: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Books Record</title>
</head> 
<body>
<h2>Add New Book</h2>

<form method="POST" action="">

<label>Title:</label><br.
<input type="text" name="title" value="<?php echo $book['title']; ?>" required><br><br>

<label>Author:</label><br.
<input type="text" name="author" value="<?php echo $book['author']; ?>" required><br><br>

<label>Title:</label><br.
<input type="text" name="title" value="<?php echo $book['title']; ?>" required><br><br>

<label>Genre:</label><br>
<select name="genre" required>
<option value="">Select Genre </option>
<option value="Fiction" <?php if($book['genre']=="Fiction") echo "selected"; ?>>Fiction</option>
<option value="Non-Fiction" <?php if($book['genre']=="Non-Fiction") echo "selected"; ?>>Non-Fiction</option>
<option value="Mystery" <?php if($book['genre']=="Mystery") echo "selected"; ?>>Mystery</option>
<option value="Science" <?php if($book['genre']=="Science") echo "selected"; ?>>Science</option>



<label>Availability:</label><br>
<input type="radio" name="availability" value="Available" <?php if($book['availability']=="Available") echo
 "checked"; ?>> Available
<input type="radio" name="availability" value="Check Out" <?php if($book['availability']=="Check Out") echo
 "checked"; ?>> Check Out
<br><br>

<textarea name="description" rows="10" cols="50"><?php echo htmlspecialchars($book['description']);?> </textarea>	

<button type="submit">Update</button>
<a href="view_record.php">Cancel<a/>
</form>
</body>
</html>






























