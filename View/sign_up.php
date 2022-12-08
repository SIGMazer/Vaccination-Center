<?php
include '../Model/LoginRegModel.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign-Up</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet1.css" rel="stylesheet">
</head>
<body>
<div id="signup">
    <div class="container">
        <div id="signup-row" class="row justify-content-center align-items-center">
            <div id="signup-column" class="col-md-6">
                <div id="signup-box" class="col-md-12">
                    <form id="sginup-form" class="form" action="../Controller/RegisterController.php" method="post">
                        <br><h3 class="text-center">Register</h3>
                        <div class="form-group">
                            <label for="username" >Username:</label><br>
                            <input type="text" name="username"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name" >Name:</label><br>
                            <input type="text" name="name"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" >Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" >Email:</label><br>
                            <input type="text" name="email"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone" >Phone number:</label><br>
                            <input type="text" name="phone"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id" >National ID:</label><br>
                            <input type="text" name="id"  class="form-control">
                        </div>
                        <p>City :
                        <label for="city-names"></label>
                            <select name="reg_city" id="city-names">
                                <option >cairo</option>
                                <option >spaniol</option>
                                <option >alex</option>
                                <option >giza</option>
                            </select></p>
                        <div class="form-group">
                            <br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                        </div>
                        <div id="login-link" class="text-right" >
                            <a href="../View/login.php" >Login</a>
                        </div>
                        
                        <?php
                        if(!isset($_GET['signup'])) {
                            exit();
                        }
                        else {
                            LoginRegModel::errorHandler($_GET['signup']);
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
