<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php 
error_reporting(E_ERROR | E_PARSE);
use Web\Model\User;
session_start();
$user_obj = new User;
$em_obj = new User;
$result = $user_obj->checkUser($_POST);
$isem = $em_obj->isEmployee($_SESSION);
if ($result) {
    if ($_SESSION['role']=='admin' )
    {
    header("location:/project-web/member/index.php");
    }
    elseif ((($_SESSION['role']=='employee')&& $isem )|| $_SESSION['role']=='manager'){
        header("location:/project-web/member/employee.php");
    }
    else{
        header("location: login.php?msg=not_employee");
    }
}else {
    header("location: login.php?msg=error");
}

?>