<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>
<body>
<?php
require_once('sql.php');
if (isset($_GET['subID'])) {
    $subID = $_GET['subID'];
}
else {
    $subID = "";
}
$sql = "SELECT id, text FROM Issues WHERE SubmissionID = '$subID'";
$result = $conn->query($sql);
$id = 1;
if ($result->num_rows > 0) {
    echo "<table><thead><tr><th>ID</th><th>Comment</th></tr></thead>";
    while($row = $result->fetch_assoc()) {
        //$subID = $row["id"];
        echo "<tbody><tr><td>" . $id . "</td>";
        
       
        echo "<td>" . $row["text"] . "</td></tr></tbody>";
        ++$id;
        }
        
    echo "</table>"; 
    
}
$conn->close();
?>
