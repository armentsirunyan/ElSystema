<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="jquery.js" ></script>
    <script type="text/javascript">
        $(document).ready(function() {             
            $('#role').change(function(){                
                var role = $('#role').val(); 
                var html;                 
                if(role == 'student') {
                    html = '<br><br>Group number: <input type="text" name="group"><br><br>';
                }
                else {
                    html = '';
                }
                //console.log('html');               
                $('#group').html(html);
            });
        }); 
    </script>
</head>
<body>

<?php  
//$usernameErr = $fullnameErr = $passwordErr = $groupErr = "";
//$username = $fullname = $password = $group = "";
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    if (empty($_POST["username"])) {
//        $usernameErr = "Username is required";
//        } 
//        else {
//            $username = test_input($_POST["username"]);
//        }
//   
//        if (empty($_POST["fullname"])) {
//            $fullnameErr = "Full name is required";
//        } else {
//            $fullname = test_input($_POST["$fullname"]);
//        }
// 
//        if (empty($_POST["password"])) {
//            $password = "Password is required";
//        } else {
//            $password = test_input($_POST["password"]);
//        }
//
//        if (empty($_POST["group"])) {
//            $group = "Group number is required";
//        } else {
//            $group = test_input($_POST["group"]);
//        }
//
//        }
//
//        function test_input($data) { 
//            $data = trim($data);
//            $data = stripslashes($data);
//            $data = htmlspecialchars($data);
//            return $data;
//        }
?>

<form action="insertUser.php" method="post">
Username: <input type="text" name="username"><br><br>
Full Name: <input type="text" name="fullname"><br><br>
Password: <input type="password" name="password"><br><br>
Role: <select id="role" name="role">
<option value=""></option>
<option value="teacher">Teacher</option>
<option value="student">Student</option>
</select>
<div id="group"></div>


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
