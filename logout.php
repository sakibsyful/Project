<?php
session_start(); 
session_destroy();
unset($_SESSION['phone']);
header("location: home.php");

?>