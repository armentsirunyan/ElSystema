<?php

require_once('sql.php');

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Statements (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(50) NOT NULL,
link VARCHAR(500) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Statements created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close()
?>
