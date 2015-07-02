<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>
<body>
<?php

require_once('sql.php');
session_start();
$username = $_SESSION["myusername"];
$sql = "SELECT id FROM Users WHERE Username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$studentID = $row["id"];

$sql = "SELECT id, probID, dateAndTime, link FROM Submissions WHERE studentID = '$studentID'";
$result = $conn->query($sql);

$id = 1;
if ($result->num_rows > 0) {
    echo "<table><thead><tr><th>ID</th><th>Problem</th><th>Solution</th><th>Date and Time</th><th>Comments</th></tr></thead>";
    while($row = $result->fetch_assoc()) {
        
        echo "<tbody><tr><td>" . $id . "</td>";
        $probID = $row["probID"];
        $getProblemName = "SELECT name FROM Statements WHERE id = '$probID'";
        $res = $conn->query($getProblemName);
        $ProblemName = $res->fetch_assoc()["name"];
        $solution = $row["link"];
        $subID = $row["id"];
        $getNumberOfComments = "SELECT COUNT(*) as count FROM Issues WHERE SubmissionID = '$subID'";
        $res = $conn->query($getNumberOfComments);
        $count = $res->fetch_assoc()['count'];
        echo "<td>" . $ProblemName . "</td><td><a href=$solution download>" . "Download" . 
        "</td><td>" . $row["dateAndTime"] . "</td><td><a href=studentComment.php?subID=" .
        $subID . ">" . $count . " Comment(s)" . 
        "</tr></tbody>";
        ++$id;
                        
        }
    echo "</table>"; 
    
}
$conn->close();
?>