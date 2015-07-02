<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="insertGroup.php" method="post">
 <?php 
      if(isset($_GET["wrongUsername"]) && $_GET["wrongUsername"] == 1) 
      echo "<font color=\"red\">There's no teacher with such username.</font><br><br>";
 ?>
Group Number: <input type="text" name="group"><br><br>
Teacher Username: <input type="text" name="username"><br><br>
<input type="submit" value="Submit">
</form> 
</body>
<style type="text/css">
form {
    margin: 60px 200px 100px;
    font-size: 20px;
    padding: 30px 20px 70px;
    background: #f3f3f3;
    border-style: dashed;
    border-color: #CEE3F6;
}
textarea {
    width: 500px;
    height: 200px;
    margin-bottom: 30px;
    margin-top: 30px;
    
}
