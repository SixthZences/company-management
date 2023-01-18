<?php
session_start();
if (!$_SESSION['login']||!$_SESSION['user_id']){
  header("location: /project-web/auth/login.php");
  exit;
}

?>