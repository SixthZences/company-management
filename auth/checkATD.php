<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<?php 

use Web\Model\User;
session_start();
$atd_obj = new User;
$result = $atd_obj->checkATDinput($_POST);
if ($result){
header("location:/project-web/member/insertATD.php?msg=ins_success");
}else{
    header("location:/project-web/member/insertATD.php?msg=ins_error");
}

?>