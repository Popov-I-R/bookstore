<?php

session_start();

if(!isset($_SESSION['login_user'])) {
    header("location:./login.php");
    die();
}

//ini_set('session.gc_maxlifetime', '5');