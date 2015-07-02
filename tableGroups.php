<?php

require_once('sql.php');

$sql = "CREATE TABLE IF NOT EXISTS Groups (
id INT(6) UNSIGNED  AUTO_INCREMENT PRIMARY KEY, 
GroupNumber smallint(6) DEFAULT NULL,
teacherID INT(6) UNSIGNED,
FOREIGN KEY (teacherID) REFERENCES Users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Groups created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close()
?>