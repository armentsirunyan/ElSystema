<?php

require_once('sql.php');
$sql = "INSERT INTO Statements (name, link)
VALUES ('problem1', 'problem1.html')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>