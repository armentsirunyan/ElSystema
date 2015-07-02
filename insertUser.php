<?php

require_once('sql.php');
$username = $fullname = $password = $role = $group = "";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['fullname'])) {
    $fullname = $_POST['fullname'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['role'])) {
    $role = $_POST['role'];
}
if (isset($_POST['group'])) {
    $group = $_POST['group'];
}
$encryptedPass = md5($password);
$sql = "INSERT INTO Users (Username, FullName, PasswordHash, Role, GroupNumber)
VALUES ('$username', '$fullname', '$encryptedPass', '$role', '$group')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>