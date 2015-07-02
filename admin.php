<?php
session_start();
if(!isset($_SESSION['myusername']) || $_SESSION['myusername'] != "admin") {
    header("location:login.php");
}
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="menuStyle.css">
<link rel="stylesheet" type="text/css" href="logoutStyle.css">
</head>
<body>
<ul id="menu-bar">

 <li><a href="addUser.php">Add A User</a></li>
 <li><a href="addStatement.php">Add A Statement</a></li>
 <li><a href="groupTeacher.php">Group-Teacher</a></li>

</ul>
<form action="logout.php">
    <input type="submit" value="Log out">
</form>
</body>

<style type="text/css">
#menu-bar li {
  margin: 6px 0px 6px 60px;
}