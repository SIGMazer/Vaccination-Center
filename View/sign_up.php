<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign-Up</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-2"></div>
    <div class="col">
        <div class="card">
            <p-head class="card-head"><strong>Sign up</strong></p-head>
            <div class="card-body">
                <form action="../Controller/RegisterController.php" method="post">
                    <p>Username</p>
                    <input  type="text" name="reg_username" placeholder="username">
                    <p>Password</p>
                    <input type="password" name="reg_password" placeholder="password"/>
                    <p>Name</p>
                    <input  type="text" name="reg_name" placeholder="name">
                    <p>Email</p>
                    <input type="email"  name="reg_email" placeholder="name@example.com">
                    <p>Phone number</p>
                    <input  type="text" name="reg_phonenumber" placeholder="Phone No.">
                    <p>National ID</p>
                    <input  type="text" name="reg_nationalID" placeholder="ID">
                    <br>
                    <p>City : </p>
                    <p><label for="city-names"></label>
                    <select name="reg_city" id="city-names">
                        <option >cairo</option>
                        <option >spaniol</option>
                        <option >alex</option>
                        <option >giza</option>
                    </select></p>
                    <p><input type="submit" value="Sign up" name="reg_submit" class="btn btn-primary"></p>
                </form>
                <?php
                    $fullUrl =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

                    if(!isset($_GET['signup'] ))
                    {
                        exit();
                    }
                    else
                    {
                        if(strpos($fullUrl, "signup=empty") == true)
                        {
                            echo "<p class = 'error' style=color:red >Fill all inputs<p>";
                            exit();
                        }
                        if(strpos($fullUrl, "signup=invalidpass") == true)
                        {
                            echo "<p class = 'error' style=color:red >Password should contain number, be at least 8 character long<p>";
                            exit();
                        }
                        if(strpos($fullUrl, "signup=invalidemail") == true)
                        {
                            echo "<p class = 'error' style=color:red >Invalid email<p>";
                            exit();
                        }
                        if(strpos($fullUrl, "signup=invalidphone") == true)
                        {
                            echo "<p class = 'error' style=color:red >Invalid phone number<p>";
                            exit();
                        }
                        if(strpos($fullUrl, "signup=invalidID") == true)
                        {
                            echo "<p class = 'error' style=color:red >Invalid national ID<p>";
                            exit();
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
</body>
</html>
