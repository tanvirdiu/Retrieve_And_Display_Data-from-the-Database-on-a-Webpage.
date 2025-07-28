<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_table";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<p>Connection failed: " . $conn->connect_error . "</p>");
}

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

if ($user_id > 0) {
    $sql = "SELECT id, name, email, gender, age, registered_course, created_at FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "<h2>User Details (ID: {$user['id']})</h2>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($user['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($user['email']) . "</p>";
            echo "<p><strong>Gender:</strong> " . htmlspecialchars($user['gender']) . "</p>";
            echo "<p><strong>Age:</strong> " . htmlspecialchars($user['age']) . "</p>";
            echo "<p><strong>Course:</strong> " . htmlspecialchars($user['registered_course']) . "</p>";
            echo "<p><strong>Registered At:</strong> " . htmlspecialchars($user['created_at']) . "</p>";
        } else {
            echo "<p>No user found with ID <strong>" . htmlspecialchars($user_id) . "</strong></p>";
        }
    } else {
        echo "<p>Error executing query: " . $stmt->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid user ID.</p>";
}

$conn->close();
?>
    <br><a href="index.php">← Back to Registration</a>
</div>
</body>
</html>
