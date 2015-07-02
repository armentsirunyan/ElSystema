<?php

require_once('sql.php'); 

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Username VARCHAR(30) NOT NULL,
FullName VARCHAR(30) DEFAULT NULL,
PasswordHash VARCHAR(200) NOT NULL,
Role varchar(10) NOT NULL,
GroupNumber smallint(6) DEFAULT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close()
?>