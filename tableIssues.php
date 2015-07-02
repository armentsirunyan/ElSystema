<?php

require_once('sql.php');

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Issues (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
submissionID INT(6) UNSIGNED NOT NULL,
text VARCHAR(5000),
FOREIGN KEY (submissionID) REFERENCES Submissions(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Issues created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close()
?>
