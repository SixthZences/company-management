<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/project-web/auth/auth.php";?>
<?php
//error_reporting(E_ERROR | E_PARSE);
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
      .avatar {
          height:500px;
      }
      
  </style>

  </head>
  <body class="u-body font-mali">
  <?php require $_SERVER['DOCUMENT_ROOT']."/project-web/components/navbar.php";?>
    <section class="u-align-center u-clearfix u-palette-1-dark-3 u-section-1" id="carousel_a857">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width-xs u-group u-shape-rectangle u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h2 class=" font-mali u-text u-text-default u-text-1">Information</h2>
          </div>
        </div>
        <div class="u-clearfix u-expanded-width u-gutter-2 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-align-justify u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-2">
                  <p class="u-custom-font  u-text u-text-default u-text-2">
                    <?php if (isset($userDB)) { ?>
                    <span style="font-size: 1.875rem;">Full Name: <?php if (isset($userDB)) {echo ($userDB['firstname'].' '); echo $userDB['lastname'];}?>
                    <br>Gender: <?php if (isset($userDB['gender'])) {
                      echo $userDB['gender'];
                      }
                      ?>
                    </span>
                    <br>
                    <span style="font-size: 1.875rem;">Role: <?php if (isset($userDB['career'])){echo $userDB['career'];}?></span>
                    <br>
                    <span style="font-size: 1.875rem;">Salary: <?php echo $userDB['salary'];?></span>
                    <br>
                    <br>         
                    <?php if (!($_SESSION['role']=='employee' || $_SESSION['role']== 'manager')){ ?>
                    <span style="font-size: 1.875rem;"><h1 class='my-3 text-danger font-mali'>Wrong employee's id !</h1></span>
                    <?php } ?>
                  </p>
                </div>
              </div>
              <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="1000" data-image-height="1500">
                <div class="u-container-layout u-container-layout-3 mr-auto"><img src="<?php echo "{$userDB['avatar']}"; ?>" class='avatar'></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-8f80"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"></p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="#" target="_blank">
        <span></span>
      </a>
      <p class="u-text">
        <span></span>
      </p>
      <a class="u-link" href="#" target="_blank">
        <span></span>
      </a> 
    </section>
  </body>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>