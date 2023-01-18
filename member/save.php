<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<?php
error_reporting(E_ERROR | E_PARSE);
use Web\Model\Person;
use Web\Model\User;
use Web\Model\Task;
$personObj = new Person;
$userObj = new User;
$taskObj = new Task;

if ($_FILES['upload']['tmp_name']){
    $ext = end(explode(".", $_FILES['upload']['name']));
    $avatar ="/project-web/member/avatars/" . md5(uniqid()) . ".{$ext}";
    move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$avatar);
    
}

if($_REQUEST['action']=='delete'){
    //exit;
    $user = $userObj->fetchUserDataByID($_REQUEST['user_id']);
    $person = $personObj->getPersonById($_REQUEST['id']);
    if ($person['avatar'])
    {
        unlink($_SERVER['DOCUMENT_ROOT'].$person['avatar']);
    }
    if (isset($person)){
        $personObj->deletePerson($_REQUEST['id']);
    }
    if (isset($user))
    {
        $userObj->deleteUser($_REQUEST['id']);
    }
    header("location:index.php");
}


elseif ($_REQUEST['action']=='edit'){
    $person = $_REQUEST;
    
    if ($_FILES['upload']['tmp_name']){
        if ($person['avatar']){
        unlink($_SERVER['DOCUMENT_ROOT'].$person['avatar']);
    }
    $person['avatar'] = $avatar;
}

$personObj->updatePerson($person);
header("location:index.php");

}


elseif ($_REQUEST['action']=='add'){
    
    $person = $_REQUEST;
    
    unset($person['action']);
    unset($person['user_id']);
    
    $person['avatar'] = $avatar;
    
    $personObj->addPerson($person);
    header("location:index.php");
}

elseif ($_REQUEST['action']=='add_task'){
    $task = $_REQUEST;

    unset($task['action']);
    $taskObj->addTask($task);
    header("location:tasks.php?task_add=success");
    
}

elseif ($_REQUEST['action']=='edit_task'){
    $task = $_REQUEST;
    unset($task['action']);
    $taskObj->editTask($task);
    header("location:tasks.php?task_edit=success");
    
}


?>