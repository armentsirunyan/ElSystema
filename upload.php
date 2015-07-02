<?php
require_once('sql.php');
$target_dir = "uploads/";
$problemID = $_POST["problemID"];
session_start();
$username = $_SESSION["myusername"];
$sql = "SELECT id FROM Users WHERE Username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$studentID = $row["id"];
$dateAndTime = date("h:i:sa d/m/Y");
if (!empty($_POST["source"])) {
    $target_file = $target_dir . $problemID . "_". rand(1,99999999) . ".cpp";
    $myFile = fopen($target_file, "w") or die("Unable to open file!");
    $source = $_POST["source"];
    fwrite($myFile, $source);
    fclose($myFile);
    //$fileSize = filesize($target_file);
//    if ($fileSize > 64000) {
//        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }
    $time = date(DATE_ATOM, time());
    $rand = rand(1,99999);
    //$probName = $time . $rand . $problemID . ".cpp";
    $sql = "INSERT INTO Submissions (probID, studentID, dateAndTime, link)
    VALUES ('$problemID', '$studentID', '$dateAndTime', '$target_file')";      
    if ($conn->query($sql) === TRUE) {
        echo "$problemID.cpp uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   

}
else {
    $target_file = $target_dir . basename($_FILES["ufile"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    //$fileSize = $_FILES["ufile"]["size"];    
    $fileName = $_FILES["ufile"]["name"];
    $tmpName  = $_FILES["ufile"]["tmp_name"];    




// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
 // Check file size
 
//    if ($_FILES["ufile"]["size"] > 64000) {
//        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }
//
    
    // Allow certain file formats
    if($fileType != "cpp") {
        echo "Sorry, only CPP files are allowed.";
        $uploadOk = 0;
    }
    
    $temp = explode(".", $_FILES["ufile"]["name"]);
    $newFileName = $problemID . "_" . rand(1,99999999) . '.' . end($temp);
    $link = $target_file . $newFileName;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["ufile"]["tmp_name"], $link)) {
            $time = date(DATE_ATOM, time());
            $rand = rand(1,99999);
            //$probName = $time . $rand . $fileName;
            $sql = "INSERT INTO Submissions (probID, studentID, dateAndTime, link)
            VALUES ('$problemID', '$studentID', '$dateAndTime', '$link')";      
            if ($conn->query($sql) === TRUE) {
                echo "$fileName uploaded successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }   
           
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}    
?>