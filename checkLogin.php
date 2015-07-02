<?php

require_once('sql.php');
$tblname = "Users"; 
// username and password sent from form 
$myusername = $_POST['myusername']; 
$mypassword = $_POST['mypassword']; 
$remember = $_POST['remember'];
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn, $myusername);
$mypassword = mysqli_real_escape_string($conn, $mypassword);

$cookie_name = 'siteAuth';
$cookie_time = (3600 * 24 * 30); // 30 days
$encryptedPass = md5($mypassword);
if($remember == 1) {
     setcookie ($cookie_name, 'usr=' . $myusername . '&hash=' . $encryptedPass, time() + $cookie_time);
}
$sql = "SELECT * FROM $tblname WHERE Username = '$myusername' and PasswordHash = '$encryptedPass'";
$result = $conn->query($sql);

//if (!$result) {
//    die(mysqli_error($conn));
//}

// Mysqli_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){
  
    // Register $myusername, $mypassword and redirect to file "loginSuccess.php"
    session_start();
    $_SESSION['myusername'] = $myusername;
    //$_SESSION['mypassword'] = $encryptedPass;
    header("location:loginSuccess.php");
}
    
else {
    header("location:login.php?wrong=1");
}
?>