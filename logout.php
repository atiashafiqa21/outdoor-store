<?php

session_start();
 
// Unset semua variabel session
$_SESSION = array();
 
// hancurkan session
session_destroy();
 
// diarahkan lagi ke login.php
header("location: login.php");
exit;
?>