<?php
require ('connection.php');
if (!isset($_GET['id'])) {
die("No student ID provided.");
}
$id = $_GET['id'];

$sql = "SELECT * FROM studinform WHERE id=$id LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
die("Student not found.");
}

$info = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$course = $_POST['course'];
$yearlevel = $_POST['yearlevel'];
$gender = $_POST['gender'];
$address = $_POST['address'];

$scholar = "";
if (!empty($_POST['scholar'])) {
$scholar = implode(", ", $_POST['scholar']);
}

$update = "UPDATE studinform
SET name='$name', email='$email', age='$age', course='$course', yearlevel='$yearlevel', gender='$gender', address='$address', scholar='$scholar'
WHERE id=$id";

if (mysqli_query($conn, $update)) {
header("Location: view_student.php");
exit;
} else {
echo "Error updating record: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Student Info</title>
</head> 
<body>
<h2>Update Student Information</h2>

<form method="POST" action="">

<label>Name:</label><br>
<input type="text" name="name" value="<?php echo $info['name']; ?>" required><br><br>

<label>Email:</label><br>
<input type="email" name="email" value="<?php echo $info['email']; ?>" required><br><br>

<label>Age:</label><br>
<input type="text" name="age" value="<?php echo $info['age']; ?>" required><br><br>

<label>Course:</label><br>
<select name="course" required>
<option value="">Select Course </option>
<option value="BSIT" <?php if($info['course']=="BSIT") echo "selected"; ?>>BSIT</option>
<option value="BSCS" <?php if($info['course']=="BSCS") echo "selected"; ?>>BSCS</option>
<option value="BSIS" <?php if($info['course']=="BSIS") echo "selected"; ?>>BSIS</option>
</select><br><br>

<label>Year Level:</label><br>
<select name="yearlevel" required>
<option value="">Select Year </option>
<option value="1" <?php if($info['yearlevel']=="1") echo "selected"; ?>>1</option>
<option value="2" <?php if($info['yearlevel']=="2") echo "selected"; ?>>2</option>
<option value="3" <?php if($info['yearlevel']=="3") echo "selected"; ?>>3</option>
</select><br><br>

<label>Gender:</label><br>
<input type="radio" name="gender" value="male" <?php if ($info['gender']=="Male") echo "checked"; ?>> Male
<input type="radio" name="gender" value="female" <?php if ($info['gender']=="Female") echo "checked"; ?>> Female
<input type="radio" name="gender" value="other" <?php if ($info['gender']=="Other") echo "checked"; ?>> Other
<br><br>

<label>Address:</label><br>
<textarea id="address" name="address" rows="4" cols="50" value="<?php echo $info['address'];?>" required> </textarea><br><br>

<label>Scholar:</label><br>
<?php
$savedScholar = explode(", ", $info['scholar']);
?>
<input type="checkbox" name="scholar[]" value="LGU" <?php if(in_array("LGU",
 $savedScholar)) echo "checked"; ?>> LGU
<input type="checkbox" name="scholar[]" value="DOST" <?php if(in_array("DOST",
 $savedScholar)) echo "checked"; ?>> DOST
<input type="checkbox" name="scholar[]" value="CHED" <?php if(in_array("CHED",
 $savedScholar)) echo "checked"; ?>> CHED
<input type="checkbox" name="scholar[]" value="UniFAST" <?php if(in_array("UniFAST", $savedScholar)) echo "checked"; ?>> UniFAST
<br><br>

<button type="submit">Update</button>
<a href="view_student.php">Cancel<a/>
</form>
</body>
</html>






























