<?php
include '../Model/LoginRegModel.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet1.css" rel="stylesheet">
</head>
<body>
<div id="login">
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                <form id="login-form" class="form" action="../Controller/LoginController.php" method="post">
                    <h3 class="text-center">Login</h3>
                    <div class="form-group">
                        <label for="username" >Username:</label><br>
                        <input type="text" name="username"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" >Password:</label><br>
                        <input type="password" name="password"  class="form-control">
                    </div>
                    <div class="form-group">
                        <br>
                        <br>
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                    </div>
                    <div id="register-link" class="text-right">
                        <a href="../View/sign_up.php" >Register here</a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <?php
                    if(!isset($_GET['login'])) {
                        exit();
                    }
                    else {
                        LoginRegModel::errorHandler($_GET['login']);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
