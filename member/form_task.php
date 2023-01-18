<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<!DOCTYPE html>
<?php 
//error_reporting(E_ERROR | E_PARSE);
use Web\Model\Career;
use Web\Model\Refers;
use Web\Model\Salary;
use Web\Model\Person;

if($_REQUEST['action']=='edit'){
    $personObj = new Person;
    $person = $personObj->getPersonById($_REQUEST['id']);
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Company Management Website</title>
	<link rel="stylesheet" href="/project-web/css/bootstrap-theme.css">
</head>
<body class="font-mali bg-dark">
	<div class="container">
		<div class="row mt-5">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header bg-info text-white d-flex justify-content-between">
                        <h4>Task form </h4>
                        <a href="tasks.php" class="btn btn-danger">Back </a>
                    </div>
					<div class="card-body">
                        <form action="save.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit_task') ? "edit_task" : "add_task";?>">
							<input type="hidden" name="manager_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" 
                                class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="description"> Description </label>
                                    <textarea type="text" name="description" id="description" class="form-control" value="" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="member">Member</label>
                                   <select name="member_id"id="member_id"class="form-control" required>
                                       <option value="" >Select</option>
                                       <?php
                                    $personObj = new Person;
                                    $persons = $personObj->getPersons();
                                    foreach($persons as $person){
                                        $person_name = $person['firstname']." ".$person['lastname'];
                                        echo"<option value='{$person['user_id']}' >{$person_name}</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <button class="btn btn-success"type="submit">Send</button>
                            </form>
                            
                        </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>