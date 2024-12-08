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

    // Delete the user record
    $sql = "DELETE FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!'); window.location.href='display.php';</script>";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
