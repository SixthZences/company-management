<nav class="navbar navbar-expand-md navbar-dark bg-d">
    <?php if($_SESSION['role']=='admin') { ?>
    <a class="navbar-brand" href="/project-web/member/index.php">Admin</a>
    <?php }?>
    <?php if($_SESSION['role']=='employee') { ?>
    <a class="navbar-brand" href="/project-web/member/employee.php">Employee</a>
    <?php }?>
    <?php if($_SESSION['role']=='manager') { ?>
    <a class="navbar-brand" href="/project-web/member/employee.php">Manager</a>
    <?php }?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='manager') { ?>
        <div class="nav-item">
          <a class="nav-link" href="/project-web/member/index.php">Employee</a>
        </div>
        <div class="nav-item">
          <a class="nav-link" href="/project-web/member/atd.php">Attentdance List</a>
        </div>
        <?php } ?>
        <?php if ($_SESSION['role']=='manager' || $_SESSION['role']=='employee' || $_SESSION['role']=='admin') { ?>
          <div class="nav-item">
          <a class="nav-link" href="/project-web/member/tasks.php">Tasks List</a>
        </div>
        <?php }?>
        <?php if($_SESSION['role']=='admin') { ?>
        <div class="nav-item">
          <a class="nav-link" href="/project-web/member/dashboard.php">Dashboard</a>
        </div>
        <?php } ?>
        <div class="nav-item dropdown ml-auto">
          <a class="nav-link dropdown-toggle" id="navbarDropDown" role="button"
          data-toggle="dropdown" href="#" role="button"  aria-expanded="true">
            <?php echo ($_SESSION['name']); ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if( $_SESSION['role']=='employee') { ?>
            <a class="dropdown-item" href="/project-web/member/employeeATD.php">Check-in table</a>
            <?php } ?>
            <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='manager') { ?>
            <a class="dropdown-item" href="/project-web/member/insertATD.php">Attentdance</a>
            <?php } ?>
            <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='manager' || $_SESSION['role']=='employee') { ?>
            <hr class="dropdown-divider">
            <?php } ?>
            <a class="dropdown-item" href="/project-web/auth/logout.php" >Logout</a>
          </div>
        </div>
        </div>
    </div>
</nav>