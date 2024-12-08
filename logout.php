<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
<style>
    .btn-logout {
        padding: 10px 20px;
        background-color: #DC3545; /* Red color */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn-logout:hover {
        background-color: #B02A37; /* Darker red */
    }
</style>
</html>



