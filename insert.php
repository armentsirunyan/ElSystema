<?php

require_once('sql.php');

//$sql = "INSERT INTO Users (Username, FullName, PasswordHash, Role, GroupNumber)
//VALUES ('alla', 'alla igityan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'student', 203)";
//
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
//
//$sql = "INSERT INTO Users (Username, FullName, PasswordHash, Role)
//VALUES ('armen', 'armen tsirunyan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'teacher')";
//
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
$sql = "INSERT INTO Users (Username, FullName, PasswordHash, Role)
VALUES ('admin', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'admin')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>