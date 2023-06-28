<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<?php

use Web\Model\Person;
use Web\Model\User;
use Web\Model\Task;
$userObj = new User;
$userDB = $userObj->fetchUserDataByID($_SESSION);
$taskObj = new Task;
$task = $taskObj->getTaskById($_REQUEST);
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

      section {
      box-sizing: border-box;
      padding-left: 2em;
      padding-right: 2em;
      padding-top: 1.5em;
      padding-bottom: 1.5em;
      font-size: 2em;
      width: 35em;
      border-radius: 1em;
      height: 20em;
      text-align: left;
      font-size: 27pt;
      margin-left: auto;
      margin-right: auto;
      margin-top: 1.7em;
      background-color:black;
      opacity: 0.75;
      color: #3b8ae6; 
      border: 3px solid;
    }

      #test{
        color: #ffff; 
        font-size: 40pt;
        text-align: center;
      }
      #des{
        color: #ffff; 
        font-size: 15pt;
        margin-bottom: -20px;
        
      }
      #des01{
        color: #ffff; 
        font-size: 20pt;
        margin-top: 0em;
      }

      p.lines {
        width: 100%;
        border: 1px solid #3b8ae6;
        margin-bottom: 5%;
        margin-right: auto;
        }     
     p.liness {
        width: 20%;
        border: 1px solid #3b8ae6;
        margin: auto;
        
        }     
  </style>

  </head>
  <body class="font-mali u-palette-1-dark-3 ">
  <?php require $_SERVER['DOCUMENT_ROOT']."/project-web/components/navbar.php";?>
  <?php 

  ?>      
  <section>
    <div>
      <p id="test">Details</p>
      <p class="liness"></p>
      <p id="des">Title : <?php echo($task['title']); ?></p>
      <p id="des">Manager : <?php echo($task['manager_fname']);echo(" ".$task['manager_lname']); ?> Started date : <?php echo($task['started_date']); ?></p><br>
      <p class="lines"></p>
      <p id="des01">
      <?php echo($task['description']); ?>
    </p>
    <br>
    <p class="lines"></p> 
    </div>
    <div>
      <center>
      <a href="tasks.php" class="btn btn-success mf-2">Back</a>
      </center>
      </div>
    </section> 
   


  </body>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>