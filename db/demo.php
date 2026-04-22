<?php
/**
 * Database Demonstration Script
 * This script connects to MySQL, creates a table, inserts data, and displays it.
 */

$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password
$dbname = "college";

// 1. Create Connection
$conn = new mysqli($servername, $username, $password);

// 2. Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Create Database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Select the database
    $conn->select_db($dbname);
} else {
    echo "Error creating database: " . $conn->error;
}

// 4. Create Table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    course VARCHAR(50) NOT NULL
)";
$conn->query($tableSql);

// 5. Insert data (only if table is empty for demo purposes)
$checkEmpty = $conn->query("SELECT id FROM students");
if ($checkEmpty->num_rows == 0) {
    $conn->query("INSERT INTO students (name, course) VALUES ('Aman', 'BCA'), ('Riya', 'MCA')");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP MySQLi Demo</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #6366f1; color: white; }
        .status { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Working Demo</h1>
        <p class="status">Connected to Database: <?php echo $dbname; ?></p>

        <h3>Student Records:</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
            </tr>
            <?php
            // 6. Retrieve Data
            $sql = "SELECT id, name, course FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["name"]. "</td>
                            <td>" . $row["course"]. "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
