<?php
session_start();
if(isSet($_COOKIE['siteAuth'])) {
    parse_str($_COOKIE['siteAuth'], $received);
    $_SESSION['myusername'] = $received["usr"];    
}

if(isset($_SESSION['myusername'])) {
    header("location:loginSuccess.php");
}
?>
<body>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
  <section class="container">
  
    <div class="login">
      <h1>Login</h1>
      <?php 
      if(isset($_GET["wrong"]) && $_GET["wrong"] == 1) 
      echo "<font color=\"red\">Wrong username or password.</font>";
      ?>
      <form name = "form1" method="post" action="checkLogin.php">
        <p><input type="text" name="myusername" value="" placeholder="Username"></p>
        <p><input type="password" name="mypassword" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember" value="1">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="Submit" value="Login"></p>
      </form>
    </div>

    
  </section>
<style type="text/css">

 
.container {
  margin: 80px auto;
  width: 640px;
}

.login {
  position: relative;
  margin: 0 auto;
  padding: 20px 20px 20px;
  width: 310px;
  background: white;
  border-radius: 3px;
  border-style: dashed;
  border-color: #CEE3F6;
 


  h1 {
    margin: -20px -20px 21px;
    line-height: 40px;
    font-size: 15px;
    font-weight: bold;
    color: #555;
    text-align: center;
    text-shadow: 0 1px white;
    background: #f3f3f3;
    border-bottom: 1px solid #cfcfcf;
    border-radius: 3px 3px 0 0;
  
  }



  input[type=text], input[type=password] { width: 278px; }
 p.remember_me {
    float: left;
    line-height: 31px;  
  }
}


::-webkit-input-placeholder {
  color: #ccc;
  font-size: 13px;
}

input {
  font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
  font-size: 14px;
}

input[type=text], input[type=password] {
  margin: 5px;
  padding: 0 10px;
  width: 200px;
  height: 34px;
  color: #404040;
  background: white;
  border: 1px solid;
  border-color: #c4c4c4 #d1d1d1 #d4d4d4;
  border-radius: 2px;
  outline: 5px solid #eff4f7;


}

input[type=submit] {
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
}

}
</style>

</body>

