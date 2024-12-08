<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "lab_5b");

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the matric number from the URL
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Fetch user details
    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
}

// Handle form submission for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Update the user record
    $sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $role, $matric);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully!'); window.location.href='display.php';</script>";
    } else {
        echo "Error updating user: " . $stmt->error;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="matric" value="<?php echo $user['matric']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br><br>

        <label for="role">Level:</label>
        <select id="role" name="role" required>
            <option value="lecturer" <?php echo ($user['role'] == 'lecturer') ? 'selected' : ''; ?>>Lecturer</option>
            <option value="student" <?php echo ($user['role'] == 'student') ? 'selected' : ''; ?>>Student</option>
        </select><br><br>

        <button type="submit" class="btn">Update</button>

         <!-- Cancel Link -->
        <a href="display.php" class="btn-cancel">Cancel</a>
    </form>
</body>
</html>
