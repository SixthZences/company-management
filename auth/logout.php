<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
session_destroy();
// unset($_SESSION['login']);
// unset($_SESSION['user_id']);
// unset($_SESSION['username']);
// unset($_SESSION['name']);
// unset($_SESSION['role']);
header("location: login.php");



?>