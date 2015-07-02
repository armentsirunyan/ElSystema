<?php

session_start();
session_destroy();
if (isset($_COOKIE['siteAuth'])) {
    unset($_COOKIE['siteAuth']);
    setcookie('siteAuth', '', time() - 3600); // empty value and old timestamp
}
header('Location: login.php');
exit;

?>