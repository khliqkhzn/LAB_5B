<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <h2>Registration Page</h2>
    <!-- Registration Form -->
    <form action="register_form.php" method="POST">
        <!-- Input field for Matric -->
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" required><br><br>

        <!-- Input field for Name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <!-- Input field for Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <!-- Dropdown for Role selection -->
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="">Please select</option>
            <option value="Admin">Lecturer</option>
            <option value="User">Student</option>
        </select><br><br>

        <!-- Submit button -->
        <button type="submit">Submit</button>
    </form>

    <!-- Login button -->
    <p>Already have an account?</p>
    <a href="login.php">
        <button type="button">Login</button>
    </a>
</body>
</html>
