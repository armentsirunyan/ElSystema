<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data" name="subForm" id="subForm">
<?php
if (isset($_GET['problemID'])) {
    $probID = $_GET['problemID'];
}
else {
    $probID = "";
}
?>
Problem ID: <input type="text" name="problemID" value = "<?php echo $probID;?>"><br><br>

Solution source code:<br>

<textarea name="source">
</textarea>
<br>

<br><br>
Or solution source file:
<br>
<input type="file" name="ufile" id="ufile">
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
