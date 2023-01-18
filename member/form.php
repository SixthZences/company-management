<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<!DOCTYPE html>
<?php 
error_reporting(E_ERROR | E_PARSE);
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
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header bg-info text-white d-flex justify-content-between">
                        <h4><?php echo ($_REQUEST["action"]=="edit") ? "Editing Employee's Info" :"Add New Employee" ;?></h4>
                        <a href="index.php" class="btn btn-danger">Back </a>
                    </div>
					<div class="card-body">
                        <form action="save.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit') ? "edit" : "add";?>">
							<input type="hidden" name="id" value="<?php echo $person['user_id']; ?>">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="firstname" id="firstname" 
                                class="form-control" value="<?php echo $person['firstname'];
                                ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $person['lastname'];
                                ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $person['dob'];
                                ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                               <select name="gender_id"id="gender"class="form-control" required>
                                   <option value="" >Select</option>
                                   <?php
                                   $refObj = new Refers;
                                   $genders = $refObj->getAllRefers();
                                   foreach($genders as $gender){
                                       $selected = ($gender['id']==$person['gender_id'])? "selected" : "";
                                       echo"
                                       <option value='{$gender['id']}' {$selected}>{$gender['title']}</option>
                                       ";
                                   }
                                   ?>
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="career">Career</label>
                                <select name="career_id" id="career"class="form-control" required>
                                   <option value="" >Select</option>
                                   <?php
                                   $careerObj = new Career;
                                   $careers = $careerObj->getAllCareer();
                                   foreach($careers as $career){
                                    $selected = ($career['id']==$person['career_id'])? "selected" : "";
                                       echo"
                                       <option value='{$career['id']}' $selected >{$career['title']}</option>
                                       ";
                                   }?>
                                   </select>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <select name="salary_id"class="form-control" required>
                                   <option value="" >Select</option>
                                   <?php
                                   $slrObj = new Salary;
                                   $slrs = $slrObj->getAllSalary();
                                   foreach($slrs as $slr){
                                    $selected = ($slr['id']==$person['salary_id'])? "selected" : "";
                                       echo"
                                       <option value='{$slr['id']}' $selected>{$slr['salary']}</option>
                                       ";
                                   }
                                   ?>
                                   </select>
                            </div>
                            <div class="form-group">
                                <label for="upload">Avatar</label>
                                <input type="file" name="upload" id="upload" class="form-control" >
                                <input type="hidden" name="avatar" id="avatar" class="form-control" value="<?php echo $person['avatar']; ?>">
                            </div>
                            <button class="btn btn-success"type="submit">Save</button>
                        </form>
                      
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>