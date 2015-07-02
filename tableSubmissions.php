<?php

require_once('sql.php');
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Submissions (
id INT(6) UNSIGNED  AUTO_INCREMENT PRIMARY KEY, 
probID INT(6) UNSIGNED NOT NULL,
studentID INT(6) UNSIGNED NOT NULL,
dateAndTime VARCHAR(50) NOT NULL,
link VARCHAR(500) NOT NULL,
FOREIGN KEY (probID) REFERENCES Statements(id),
FOREIGN KEY (studentID) REFERENCES Users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Submissions created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close()
?>