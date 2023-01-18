<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php
error_reporting(E_ERROR | E_PARSE);
use Web\Model\Person;
use Web\Model\User;
$userObj = new User;
$userDB = $userObj->fetchUserDataByID($_SESSION);
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Art Gallery">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Company Management Website</title>
    <link rel="stylesheet" href="/project-web/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/project-web/css/Member.css" media="screen">
    <link rel="stylesheet" href="/project-web/css/bootstrap-theme.css">
 
    <meta name="generator" content="Nicepage 4.1.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|PT+Sans:400,400i,700,700i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Member">
    <meta property="og:type" content="website">

  <style>
      th ,td{
            text-align:center;
        }
      
  </style>

  </head>
  <body class="font-mali u-body bg-dark">
  <?php require $_SERVER['DOCUMENT_ROOT']."/project-web/components/navbar.php";?>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
            <div class="card mb-3">
					<div class="card-header bg-info text-white d-flex justify-content-between">
                        <h4 class="font-mali">Check-in table </h4>
                      
                    </div>
					<div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Gender</th>
                                    <th>Career</th>
                                    <th>Attentdance</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                  $personObj =  new Person();
                                  $attendances = $personObj->fetchATDById($_SESSION);
                                  $n=0;

                                  
                                  foreach($attendances as $attendance) {
                                      echo"<tr>
                                    <td>{$attendance['user_id']}</td>
                                    <td>{$attendance['firstname']}</td>
                                    <td>{$attendance['lastname']}</td>
                                    <td>{$attendance['gender']}</td>
                                    <td>{$attendance['career']}</td>
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


  </body>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>