<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "lab_5b");

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role = $_POST['role'];

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)";

    // Use prepared statements for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $matric, $name, $password, $role);

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Your account has been created successfully. You can now log in.</p>";

        // Display the Login button
        echo '<a href="login.php"><button type="button">Login</button></a>';
    } else {
        echo "<h2>Error</h2>";
        echo "<p>There was an issue registering your account: " . $stmt->error . "</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
