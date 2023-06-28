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
    <link rel="stylesheet" href="/project-web/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/project-web/css/Member.css" media="screen">
    <link rel="stylesheet" href="/project-web/css/bootstrap-theme.css">
    
    <style>
        th ,td{
            text-align:center;
        }
    </style>
</head>
<body class="font-mali u-palette-1-dark-3">
<section class="u-align-center u-clearfix u-palette-1-dark-3 u-section-1" id="carousel_a857">
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/components/navbar.php";?>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
            <div class="card mb-3">
					<div class="card-header bg-info text-white d-flex justify-content-between">
                        <h4 class="font-mali">CRUD System </h4>
                      
                    </div>
					<div class="card-body">
            <form action="" class="form-inline mb-3" method="GET">
            
              <div class="input-group mr-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">ID</div>
                  <input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo $_REQUEST['user_id']?>">
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
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Attentdance</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  
                                  $personObj =  new Person();
                                  $filters = array_intersect_key($_REQUEST, array_flip(['user_id','name','gender_id','career_id']));
                                
                                  $attendances = $personObj->fetchATDAllUser($filters);
                                  $n=0;

                                  
                                  foreach($attendances as $attendance) {

                                   
                                      
                                      echo"<tr>
                                    <td>{$attendance['user_id']}</td>
                                    <td>{$attendance['firstname']}</td>
                                    <td>{$attendance['lastname']}</td>
                                    <td>{$attendance['title']}</td>
                                    <td>{$attendance['day']}</td>
                                   
                                    
                                    
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

</section>
</body>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>