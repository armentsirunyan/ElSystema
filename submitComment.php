<?php
require_once('sql.php');
if (isset($_GET['subID'])) {
    $subID = $_GET['subID'];
}
else {
    $subID = "";
}
$comment = $_POST["comment"];
$sql = "INSERT INTO Issues (submissionID, text)
VALUES ('$subID', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  


?>