<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<?php 
error_reporting(E_ERROR | E_PARSE);
use Web\Model\Refers;
use Web\Model\Person;
use Web\Model\Salary;
use Web\Model\Career;


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Management Website</title>
    <meta name="keywords" content="Art Gallery">
    <link rel="stylesheet" href="/project-web/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/project-web/css/Member.css" media="screen">
    <link rel="stylesheet" href="/project-web/css/bootstrap-theme.css">

  
  <style>
    .avatar {
      height: 75px;
    }
 
  </style>
</head>
<body class="font-mali u-palette-1-dark-3">
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/components/navbar.php";?>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header bg-info text-white d-flex justify-content-between">
                        <h4 class="font-mali">CRUD System </h4>
                        <a href="form.php" class="btn btn-success">New Employee </a>
                    </div>
					<div class="card-body">
            <form action="" class="form-inline mb-3" method="GET">
              <div class="input-group mr-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Career</div>
                  <select name="career_id" id="career"class="form-control">
                                   <option value="" >All</option>
                                   <?php
                                   $careerObj = new Career;
                                   $careers = $careerObj->getAllCareer();
                                   foreach($careers as $career){
                                    $selected = ($career['id']==$_REQUEST['career_id'])? "selected" : "";
                                       echo"
                                       <option value='{$career['id']}' $selected >{$career['title']}</option>
                                       ";
                                   }?>
                                   </select>
                </div>
              </div>
              <div class="input-group mr-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Gender</div>
                  <select name="gender_id"id="gender"class="form-control">
                                   <option value="" >All</option>
                                   <?php
                                   $refObj = new Refers;
                                   $genders = $refObj->getAllRefers();
                                   foreach($genders as $gender){
                                       $selected = ($gender['id']==$_REQUEST['gender_id'])? "selected" : "";
                                       echo"
                                       <option value='{$gender['id']}' {$selected}>{$gender['title']}</option>
                                       ";
                                   }
                                   ?>
                               </select>
                </div>
              </div>
              <div class="input-group mr-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Name</div>
                  <input type="text" name="name" id="name" class="form-control" value="<?php echo $_REQUEST['name']?>">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
              
            </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Avatar</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Career</th>
                                    <th>Salary</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  
                                  $personObj =  new Person();
                                  $filters = array_intersect_key($_REQUEST, array_flip(['name','gender_id','career_id']));
                                  $persons = $personObj->getAllPersons($filters);
                                  $n=0;
                                 /* if ($_SESSION['role']=='admin'){
                                  $edit = "<a href='form.php?id={$person['id']}&action=edit' class='btn btn-info mr-2'>Edit</a>";
                                  }
                                  elseif ($_SESSION['role']=='manager'){
                                  $edit = "<a href='form.php?id={$person['id']}&action=edit' class='btn btn-info mr-2'>Edit</a>";
                                  }*/
                                  
                                  foreach($persons as $person) {

                                    if ($_SESSION['role']=='admin'){
                                    $delete = "<a href='save.php?id={$person['user_id']}&action=delete' class='btn btn-danger mr-2'>Delete</a>";
                                  }
                                      
                                      echo"<tr>
                                    <td>{$person['user_id']}</td>
                                    <td><img src='{$person['avatar']}' class='avatar'></td>
                                    <td>{$person['firstname']}</td>
                                    <td>{$person['lastname']}</td>
                                    <td>{$person['dob']}</td>
                                    <td>{$person['gender']}</td>
                                    <td>{$person['career']}</td>
                                    <td>{$person['salary']}</td>
                                    <td>
                                    <a href='form.php?id={$person['user_id']}&action=edit' class='btn btn-secondary mr-2'>Edit</a>
                                    {$delete}


                                    </td>
                                    
                                </tr>
                                ";$n++;
                                  }
                                ?>
                                
                            </tbody>
                        </table>
				
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>