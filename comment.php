<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['probID'])) {
    $probID = $_GET['probID'];
}
else {
    $probID = "";
}
if (isset($_GET['subID'])) {
    $subID = $_GET['subID'];
}
else {
    $subID = "";
}
if (isset($_GET['student'])) {
    $student = $_GET['student'];
}
else {
    $student = "";
}
?>
<form action="submitComment.php?subID=<?php echo $subID;?>" method="post">
Problem ID: <input type="text" name="problemID" value = "<?php echo $probID;?>"><br><br>
Student Name: <input type="text" name="student" value = "<?php echo $student;?>"><br><br>

Comment:<br>

<textarea name="comment">
</textarea>
<br>
<br>

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
