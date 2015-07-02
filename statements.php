<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>
<body>
<?php
require_once('sql.php');
$sql = "SELECT id, name, link FROM Statements";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Problem</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        $id = $row["id"];
        $link = $row["link"];
        
        echo "<tr><td>" . $id . "</td><td><a href=$link>" . $row["name"] . "</td></tr>";
    }
    echo "</table>";
}
$conn->close();

?>
</body>
