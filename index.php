<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Register User</h2>
    <form action="insert.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <label>Gender:</label>
        <div class="gender-options">
            <label><input type="radio" name="gender" value="Male" required> Male</label>
            <label><input type="radio" name="gender" value="Female" required> Female</label>
            <label><input type="radio" name="gender" value="Other" required> Other</label>
        </div>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>

        <label for="registered_course">Registered Course:</label>
        <select name="registered_course" id="registered_course" required>
            <option value="">Select Course</option>
            <option value="Web Development">Web Development</option>
            <option value="Data Science">Data Science</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="Artificial Intelligence">Artificial Intelligence</option>
            <option value="Algorithm">Algorithm</option>
            <option value="Data Structure">Data Structure</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</div>

<div class="container">
    <h2>View User by ID</h2>
    <form action="view_user.php" method="GET">
        <label for="user_id">Enter User ID:</label>
        <input type="number" name="user_id" id="user_id" required>
        <input type="submit" value="View User Information With Primary Id">
    </form>
</div>
</body>
</html>
