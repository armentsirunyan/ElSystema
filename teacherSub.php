<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>
<body>
<?php

require_once('sql.php');
session_start();
$username = $_SESSION["myusername"];
$getTeacherID = "SELECT id FROM Users WHERE Username = '$username'";
$result = $conn->query($getTeacherID);
$row = $result->fetch_assoc();
$teacherID = $row["id"];    

$getGroupNumbers = "SELECT GroupNumber FROM Groups WHERE teacherID = '$teacherID'";
$result = $conn->query($getGroupNumbers);
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
        echo "<table><thead><tr><th>ID</th><th>Student</th><th>Problem</th><th>Solution</th><th>Date and Time</th><th>Comment</th></tr></thead>";
        $GroupNumber = $row["GroupNumber"];
        $getStudentID = "SELECT id FROM Users WHERE GroupNumber = '$GroupNumber'";
        $res = $conn->query($getStudentID);
        if ($res->num_rows > 0) {
            while($row1 = $res->fetch_assoc()) {
                $studentID = $row1["id"];
                $sql = "SELECT id, probID, studentID, dateAndTime, link FROM Submissions WHERE studentID = '$studentID'";
                $result1 = $conn->query($sql);
                if ($result1->num_rows > 0) {
                    
                    while($row2 = $result1->fetch_assoc()) {
                        $subID = $row2["id"];
                        echo "<tbody><tr><td>" . $subID . "</td>";
                        $studentID = $row2["studentID"];
                        $getStudentName = "SELECT FullName FROM Users Where id = '$studentID'";
                        $res1 = $conn->query($getStudentName);
                        $FullName = $res1->fetch_assoc()["FullName"];
                        $urlFullName = urlencode($FullName);
                        $probID = $row2["probID"];
                        $getProblemName = "SELECT name FROM Statements WHERE id = '$probID'";
                        $res2 = $conn->query($getProblemName);
                        $ProblemName = $res2->fetch_assoc()["name"];
                        $solution = $row2["link"];
                        echo "<td>" . $FullName . "</td><td>" . $ProblemName . 
                        "</td><td><a href=$solution download>" . "Download" . "</td><td>" . 
                        $row2["dateAndTime"] . "</td><td><a href=comment.php?subID=" . $subID . 
                        "&probID=" . $probID . "&student=" . $urlFullName . ">" . "Comment" . "</tr></tbody>";
                        }
                                         
                }
            }
        }
    } 
    echo "</table>";           
}

$conn->close();
?>
