<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php 
error_reporting(E_ERROR | E_PARSE);
use Web\Model\User;

$user_obj = new User;
try {
$result = $user_obj->createUser($_POST);
if($result){
    header("location: /project-web/auth/login.php?msg=reg_success");

} else {
    header("location: register.php?msg=error");
}
}
catch (Exception $e)
{
    header("location: register.php?msg=error");
}

?>