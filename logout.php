<?php
require_once 'common/includes/dbconnect.php';

session_start();
$_SESSION = array();
// Destroy the session.
session_destroy();
// Redirect to the login page
header("location:login.php");
exit();
?>
