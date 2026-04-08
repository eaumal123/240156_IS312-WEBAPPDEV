<?php
/*
Author: Eau MALLEN
Date: 01/04/26
Unit: IS312 Web Application Development
*/

$conn = new mysqli("localhost", "root", "", "fru10_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all students
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Listing</title>
</head>
<body>

<h2>Table 1: Student Listing</h2>

<table border="1" cellpadding="10" style="border-collapse: collapse;">
    <tr style="background-color: #f2f2f2;">
        <th>StudentNo</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>ContactNo</th>
        <th>ProgramCode</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['StudentNo']}</td>
                <td>{$row['Firstname']}</td>
                <td>{$row['Lastname']}</td>
                <td>{$row['Gender']}</td>
                <td>{$row['ContactNo']}</td>
                <td>{$row['ProgramCode']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No students found.</td></tr>";
}
?>

</table>

<br>
<a href="index.html">Back to Home</a>

</body>
</html>

<?php
$conn->close();
?>