<?php require $_SERVER['DOCUMENT_ROOT'] . "/project-web/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/project-web/auth/auth.php"; ?>
<?php
error_reporting(E_ERROR | E_PARSE);
use Web\Model\Person;
use Web\Model\User;
use Web\Model\Task;
use Web\Model\Dashboard;
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Member">
    <meta property="og:type" content="website">

  <style>
      th ,td{
            text-align:center;
        }
  </style>



  </head>
  <body class="font-mali u-body u-palette-1-dark-3 ">
  
    <section class="u-align-center u-clearfix u-palette-1-dark-3 u-section-1" id="carousel_a857">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/project-web/components/navbar.php"; ?>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
              <div class="card mb-3">
            <div class="card-header bg-info text-white d-flex justify-content-between">
              <h4 class="font-mali">Dashboard</h4>
              <h4 id="fn"></h4>
              <h4 id="task"></h4>
              <h4 id="a"></h4>
                      </div>
                      
            <div class="card-body">
              <div class="">
                  <center>
                <div id="piechart"></div>
                <div id="piechart2"></div>
                
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  </body>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
const text = "";
const a = [];
const b = [];
//php variables
if(true){
<?php
$i = 0;

$r = 10;
$title = "All tasks";
$dbObj = new Dashboard();
$dbs = $dbObj->getAllTasks();
foreach ($dbs as $db) {

    $fullname = $db['fname']." ".$db['lname'];
?>

//javascript

    a[<?php echo($i); ?>]=['<?php echo($fullname); ?>',<?php echo($db['task']); ?>];
    <?php $i += 1; ?>

<?php
}?>
<?php
$text = "";
for ($j = 1; $j <= $i; $j++) {
    if ($j == $i) {
        $text .= "a[{$j}-1]";
    }
    else {
        $text .= "a[{$j}-1],";
    }
}


$i = 0;

$dbObj2 = new Dashboard();
$filters2 = ($_REQUEST + $_SESSION + array_flip(['task_id', 'title', 'status']));
$dbs2 = $dbObj2->getAllDoneTasks($filters2);
foreach ($dbs2 as $db2) {

    $fullname2 = "{$db2['fname']} {$db2['lname']}";
?>

//javascript
    b[<?php echo($i); ?>]=['<?php echo($fullname2); ?>',<?php echo($db2['task']); ?>];
    <?php $i += 1; ?>

<?php
}?>
<?php
$text2 = "";
for ($j = 1; $j <= $i; $j++) {
    if ($j == $i) {
        $text2 .= "b[{$j}-1]";
    }
    else {
        $text2 .= "b[{$j}-1],";
    }
}


?>


    //all tasks
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Day per Month'],
    <?php echo($text); ?> 
]);
  var data2 = google.visualization.arrayToDataTable([
  ['Task', 'Day per Month'],
    <?php echo($text2); ?> 
]);



  // Optional; add a title and set the width and height of the chart
  var options = {'title':'All Tasks', 'width':800, 'height':800};
  var options2 = {'title':'All Done Tasks', 'width':800, 'height':800};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
  //var a_dis = new google.visualization.PieChart(document.getElementById('a'));
  chart.draw(data, options);
  chart2.draw(data2, options2);

}
}
</script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>