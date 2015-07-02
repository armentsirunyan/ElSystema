<?php

require_once('sql.php');
$username = $group = "";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['group'])) {
    $group = $_POST['group'];
}

$getTeacherID = "SELECT id FROM Users WHERE Username = '$username'";
$result = $conn->query($getTeacherID);
$teacherID = "";
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $teacherID = $row["id"];    
}
else {
    header("location:groupTeacher.php?wrongUsername=1");
}
$sql = "INSERT INTO Groups (GroupNumber, teacherID)
VALUES ('$group', '$teacherID')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>