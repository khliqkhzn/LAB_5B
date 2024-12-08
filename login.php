<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login Page</h2>
    <!-- Login Form -->
    <form action="login_form.php" method="POST">
        <!-- Input field for Matric -->
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" required><br><br>

        <!-- Input field for Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <!-- Submit button -->
        <button type="submit">Login</button>
    </form>

    <!-- Link to Registration Page -->
    <p>Don't have an account? <a href="registration.php">Register here</a>.</p>
</body>
</html>
