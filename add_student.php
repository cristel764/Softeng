<?php
require ('connection.php');

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

    $sql = "INSERT INTO studinform (name, email, age, course, yearlevel, gender, address, scholar)
            VALUES ('$name', '$email', '$age', '$course', '$yearlevel', '$gender', '$address', '$scholar')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>New record added successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>
