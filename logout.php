<?php
require_once 'common/includes/dbconnect.php';

session_start();
$_SESSION = array();
// Destroy the session.
unset($_SESSION["login_user"]);
// Redirect to the login page
header("location:index.php");
exit();
?>
