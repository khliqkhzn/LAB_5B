<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "lab_5b");

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the users table
$sql = "SELECT matric, name, role AS accessLevel FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            text-align: left;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        .btn-delete {
            background-color: #DC3545;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">User List</h2>
    <table>
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are results and display them
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['matric'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['accessLevel'] . "</td>
                            <td>
                                <a href='update.php?matric=" . $row['matric'] . "' class='btn'>Update</a>
                                <a href='delete.php?matric=" . $row['matric'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align: center;'>No users found</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>

     <!-- Logout Link/Button -->
     <a href="logout.php" class="btn-logout">Logout</a>
</body>
</html>
