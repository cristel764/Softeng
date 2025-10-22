<!DOCTYPE html>
<html>
<head>
<title> Add Student </title>
</head>
<body>
<h2>Student Information Form </h2>
<form method="POST" action="add_student.php">

<label for="name"> Full Name: </label><br>
<input type="text" name="name" placeholder ="Enter Full Name" required> <br><br>

<label for="email"> Email: </label><br>
<input type="email" name="email" placeholder ="Enter Email" required><br><br>

<label for="age"> Age: </label><br>
<input type="text" name="age" required><br><br>

<label for="course"> Course: </label><br>
<select name="course" required>
<option value="">--Select Course--</option>
<option value="BSIT"> BSIT</option>
<option value="BSIT"> BSIT</option>
<option value="BSIT"> BSIT</option>
</select><br><br>

<label for="yearlevel"> Year Level: </label><br>
<select name="yearlevel" required>
<option value="">--Year Level--</option>
<option value="1"> 1</option>
<option value="2"> 2</option>
<option value="3"> 3</option>
</select><br><br>

<label for="gender">Gender</label><br>
<input type="radio" name="gender" value="Male" required> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other <br><br>

<label for ="address"> Full Address:</label><br>
<textarea id ="address" name ="address" rows="5" cols ="30">
</textarea><br><br>

<label>Scolarship Grants: </label><br>
<input type="checkbox" name="scholar[]" value="LGU"> LGU
<input type="checkbox" name="scholar[]" value="DOST"> DOST
<input type="checkbox" name="scholar[]" value="CHED"> CHED
<input type="checkbox" name="scholar[]" value="UniFAST"> UniFAST
<br><br>

<input type ="reset" value-="Clear Form">
<button type="submit" onclick="alert('Congratulations! Student Information Form was Recorded')"> Add Student </button>
</form>
</body>
</html>