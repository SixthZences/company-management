<?php require $_SERVER['DOCUMENT_ROOT'] . "/project-web/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/project-web/auth/auth.php"; ?>
<?php
//error_reporting(E_ERROR | E_PARSE);
use Web\Model\Person;
use Web\Model\User;
use Web\Model\Task;

$userObj = new User;
$userDB = $userObj->fetchUserDataByID($_SESSION);
$selected = ''
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
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|PT+Sans:400,400i,700,700i">


  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Member">
  <meta property="og:type" content="website">

  <style>
    th,
    td {
      text-align: center;
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
              <h4 class="font-mali">Task table
                <?php if (isset($_REQUEST['task_add'])) {
                  echo ($_REQUEST["task_add"] == "success") ? " : Add task success." : "";
                } ?>
              </h4>
              <?php if ($_SESSION['role'] == 'manager') { ?>
                <a href="form_task.php?action=add_task" class="btn btn-success ">Add tasks</a>
              <?php } ?>
            </div>

            <div class="card-body">
              <form action="" class="form mb-3" method="GET" style="display:flex;flex-flow:rowwrap;align-items:center">
                <div class="input-group mr-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Task ID</div>
                    <input type="text" name="task_id" id="task_id" class="form-control"
                      value="<?php if (isset($_REQUEST['task_id'])) {
                        echo $_REQUEST['task_id'];
                      } else {
                        $_REQUEST['task_id'] = '';
                      } ?>">
                  </div>
                </div>
                <div class="input-group mr-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Title</div>
                    <input type="text" name="title" id="title" class="form-control"
                      value="<?php if (isset($_REQUEST['title'])) {
                        echo $_REQUEST['title'];
                      } else {
                        $_REQUEST['title'] = '';
                      } ?>">
                  </div>
                </div>
                <div class="input-group mr-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Name</div>
                    <input type="text" name="name" id="name" class="form-control"
                      value="<?php if (isset($_REQUEST['name'])) {
                        echo $_REQUEST['name'];
                      } else {
                        $_REQUEST['name'] = '';
                      } ?>">
                  </div>
                </div>
                <div class="input-group mr-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Status</div>
                    <select name="status" id="status" class="form-control">
                      <option value="">All</option>

                      <?php if ($_REQUEST['status'] == "Waiting") {
                        $selected = "waiting";
                      } ?>
                      <?php if ($_REQUEST['status'] == "Pending") {
                        $selected = "pending";
                      } ?>
                      <?php if ($_REQUEST['status'] == "Complete") {
                        $selected = "complete";
                      } ?>
                      <option value='Waiting' <?php if ($selected == 'waiting') {
                        echo ("selected");
                      } ?>>Waiting</option>
                      <option value='Pending' <?php if ($selected == 'pending')
                        echo ("selected"); ?>>Pending</option>
                      <option value='Complete' <?php if ($selected == 'complete')
                        echo ("selected"); ?>>Complete</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
              </form>
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Manager</th>
                    <th>Member</th>
                    <th>Started date</th>
                    <th>Status</th>
                    <th>Process</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $taskObj = new Task();
                  if(!(isset($_REQUEST['status']))){$_REQUEST['status']='';}
                  $filters = ($_REQUEST + $_SESSION);
                  $tasks = $taskObj->getAllTasks($filters);
                  $n = 0;

                  foreach ($tasks as $task) {
                    $task['manager'] = $task['manager_fname'] . " " . $task['manager_lname'];
                    $task['member'] = $task['member_fname'] . " " . $task['member_lname'];
                    $processbtn = "";
                    $verifybtn = "";
                    $process = "";
                    $confirmbtn = "";
                    $detailsbtn = "<a href='description.php?id={$task['id']}' class='btn btn-info  mr-2 '>Details</a>";

                    if ($_SESSION['role'] == "manager") {
                      $process = "secondary disabled";
                      if ($task['status'] == "Pending") {
                        $process = "success";
                        $verifybtn = "<a href='save.php?action=edit_task&id={$task['id']}&task=Complete' class='btn btn-{$process}  mr-2 '>Verify</a>";
                      } elseif ($task['status'] == "Complete") {
                        $process = "success disabled";
                        $verifybtn = "";
                      }
                    }

                    if ($_SESSION['role'] == "employee") {
                      if ($task['status'] == "Waiting") {
                        $process = "primary";
                        $confirmbtn = "<a href='save.php?action=edit_task&id={$task['id']}&task=Pending' class='btn btn-{$process}  mr-2 '>Confrim</a>";
                      } elseif ($task['status'] == "Pending") {
                        $process = "primary disabled";
                        $confirmbtn = "<a href='#' class='btn btn-{$process}  mr-2 '>Confrim</a>";
                      } else {
                        $process = "success disabled";
                        $confirmbtn = "";
                      }
                    }
                    $processbtn .= $verifybtn;
                    $processbtn .= $confirmbtn;
                    $processbtn .= $detailsbtn;
                    $table = "<tr>
                                      <td>{$task['id']}</td>
                                      <td>{$task['title']}</td>
                                      <td>{$task['manager']}</td>
                                      <td>{$task['member']}</td>
                                      <td>{$task['started_date']}</td>
                                      <td>{$task['status']}</td>
                                      <td>{$processbtn}</td>
                                      </tr>
                                  ";
                    echo ($table);
                    $n++;
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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>