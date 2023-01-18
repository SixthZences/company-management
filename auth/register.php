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
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <form action="saveRegister.php" class="mb-3" method="POST">
            <?php
            if(isset($_GET['msg'])){

                if($_GET['msg']=='error') {
                    echo "<h5 class='my-3 text-danger'>Wrong Employee's ID.Please try again.</h5>";
                }
            }
				?>
            <div class="form-group">
                <label for="user_id">ID</label>
                <input type="text" class="form-control" name="user_id" id="user_id" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
            <label for="username">Username</label>
                <input type="username" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit"class="btn btn-success">Confirm</button>
            </form>
            <p>Already have an account ? <a href="login.php">Sign in</a></p>
        </div>
    </div>
</body>
</html>