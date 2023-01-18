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
    <link rel="stylesheet" href="/project-web/css/bootstrap-theme.css">
    <style>
        th ,td{
            text-align:center;
        }
    </style>
</head>
<body class="font-mali bg-dark">
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/components/navbar.php";?>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
            <div class="card mb-3">
					<div class="card-header bg-info text-white ">
                        <h4>CRUD System </h4>
                      
                    </div>
					<div class="card-body d-flex justify-content-center">
                  
                        <form action="/project-web/auth/checkATD.php" class="form" method="POST">
                            <div class="input-group mr-2">
                   
                                <div class="input-group-prepend">            
                                    <div class="input-group-text d-flex ">ID</div>
                                            <input type="text" name="user_id" id="user_id" class="form-control" >
                                </div>
                            </div>
                    <center>
                    <button type="submit" class="btn btn-success d-flex justify-content-center mt-2">Confirm</button>
                    </center>
                    </form>
                    <?php
					if($_GET['msg']=='ins_error') {
						echo "<br><label for='user_id' class=' text-danger'>Employee's ID incorrect.Please try again.</label>";
					}elseif ($_GET['msg']=='ins_success')  {
						echo "<br><label for='user_id' class=' text-success'>Check-in successful !</label>";
					}
				?>
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