<?php
require_once('sql.php');
$numOfStatements = "SELECT COUNT(*) as count FROM Statements";
$res = $conn->query($numOfStatements);
$count = $res->fetch_assoc()['count'];
$probID = $count + 1;

$problem = $statement = "";
if(isset($_POST["problem"])) {
    $problem = $_POST["problem"];
}
if(isset($_POST["statement"])) {
    $statement = $_POST["statement"];
}
$urlProblem = urlencode($problem);

$target_file = $urlProblem . "_". $probID . ".html";
$myFile = fopen($target_file, "w") or die("Unable to open file!");
$html = "<head><link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"></head><body><h1>";
$html = $html . $problem;
$html = $html . "</h1><p>";
$html = $html . $statement;
$html = $html . "</p><a href=\"submission.php?problemID=" . $probID . "\">Submit solution</a></body>";

fwrite($myFile, $html);
fclose($myFile);

$sql = "INSERT INTO Statements (name, link)
VALUES ('$problem', '$target_file')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
?>