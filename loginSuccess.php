<?php

session_start();
if(!isset($_SESSION['myusername'])) {
    header("location:login.php");
}

require_once('sql.php');
$tblname = "Users"; 
$myusername = $_SESSION['myusername'];
$sql = "SELECT Role FROM $tblname WHERE Username = '$myusername'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row["Role"] == "student") {
    header("location:studentInterface.php");
}
elseif($row["Role"] == "teacher") {
    header("location:teacherInterface.php");
}
elseif($row["Role"] == "admin") {
    header("location:admin.php");
}
?>