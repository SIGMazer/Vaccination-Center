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
                <form id="login-form" class="form" action="" method="post">
                    <h3 class="text-center">Login</h3>
                    <div class="form-group">
                        <label for="username" >Username:</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" >Password:</label><br>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <br>
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                    </div>
                    <div id="register-link" class="text-right">
                        <a href="#" >Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
