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
    $password = $_POST['password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Redirect to the display users page
            header("Location: display.php");
            exit();
        } else {
            // Invalid password
            echo "<h3 style='color: red;'>Invalid matric number or password, try <a href='login.php'>
            Login</a> again.</h3>";
        }
    } else {
        // User does not exist
        echo "<h3 style='color: red;'>Invalid matric number or password, try <a href='login.php'>
        Login</a> again.</h3>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
