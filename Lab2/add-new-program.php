<?php
// Author: Eau MALLEN
// Date: 01/04/26
// Unit: IS312

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fru10_db";

// Create connection
$conn = new mysqli("localhost", "root", "", "fru10_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $p_code = $_POST['programCode'] ?? "";
    $p_name = $_POST['programName'] ?? "";

    if (!empty($p_code) && !empty($p_name)) {
       
        $sql = "INSERT INTO Program (ProgramCode, ProgramName) 
                VALUES ('$p_code', '$p_name')";

        if ($conn->query($sql) === TRUE) {
            echo "New program record created successfully!";
        } else {
            // This displays actual database errors (like table not found)
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Debug: One or more fields are empty. Code: '$p_code', Name: '$p_name'";
    }
}
    
$conn->close();
?>
