<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Management Website</title>
    <link rel="stylesheet" href="/project-web/css/bootstrap-theme.css">
</head>
<body class="font-mali bg-dark vh-100 d-flex justify-content-center align-items-center">
    <div class="card mb-3">
    <div class="card-header bg-info text-white">
			<h4>Login</h4>
		</div>
		<div class="card-body">
			<form action="checkLogin.php" class="mb-3" method="POST">
				<?php
					if($_GET['msg']=='error') {
						echo "<h5 class='my-3 text-danger'>Username or password incorrect.Please try again.</h5>";
					}elseif ($_GET['msg']=='reg_success')  {
						echo "<h5 class='my-3 text-success'>Register successful !</h5>";
					}
					elseif ($_GET['msg']=='not_employee')  {
						echo "<h5 class='my-3 text-danger'>You're not our employee.</h5>";
					}
				?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="username" name="username" id="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-success">Login</button>
			</form>
			<a href="register.php">Register</a>
    </div>
</body>
</html>