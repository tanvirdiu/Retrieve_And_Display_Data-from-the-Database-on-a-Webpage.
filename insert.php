<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_table";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$gender = $_POST['gender'];
$age = $_POST['age'];
$registered_course = $_POST['registered_course'];

$sql = "INSERT INTO users (name, email, password, gender, age, registered_course) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssis", $name, $email, $password, $gender, $age, $registered_course);

if ($stmt->execute()) {
    echo "User registered successfully! <br><a href='index.php'>Go Back</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
