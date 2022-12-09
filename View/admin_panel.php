<?php
include "../Controller/MiscController.php";
include "../Controller/AdminController.php";
?>
<?php
@session_start();
if (isset($_SESSION['id']) && $_SESSION['type'] == 1) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>

<body>
        <nav class="navbar sticky-top navbar-light justify-content-between" style="background-color: #20c997">
            <a href="../index.php" class="link">Home</a>
            <form action="../Controller/LoginController.php" method="post" class="form-inline">
                <input type="submit" value="Log out" name="logout" class="btn btn-primary my-2 my-sm-0">
            </form>
        </nav>

        <div class="row">
          <div class="col-md-12">
            <div class="cardhead">
              <h>Admin panel</h>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4">
                <div class="cardbody">
                    <p class="card-head">Add city</p>
                    <form action = "../Controller/AdminController.php" method="post">
                        <p>Name</p>
                        <input type="text" name="city_name" placeholder="City name">
                        <p></p>
                        <span style="color:red"><?php echoError('cerr'); ?></span>
                        <p></p>
                        <input type="submit" name="city_add" value="Add" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="cardbody">
                    <p class="card-head">Add vaccine</p>
                        <form action="../Controller/AdminController.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <p>Name</p>
                                    <input type="text" name="vaccine_name" placeholder="Vaccine name">
                                </div>
                                <div class="col">
                                    <p>Gap between doses</p>
                                    <input type="text" name="vaccine_gap" placeholder="Days">
                                </div>
                                <div class="col">
                                    <p>Precautions</p>
                                    <input type="text" name="vaccine_precautions" placeholder="Precautions">
                                </div>
                            </div>
                            <span style="color:red"><?php echoError('verr'); ?></span><br>
                            <input type="submit" name="vaccine_add" value="Add" class="btn btn-primary">
                        </form>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row" >
            <div class="col-12">
                <div class="cardbody">
                    <p class="card-head">Add vaccination center</p>
                    <form action = "../Controller/AdminController.php" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <p>Name</p>
                                        <input type="text" name="center_name" placeholder="Name">
                                    </div>

                                    <div class="col">
                                        <p>City</p>
                                        <p><select name="center_city" id="city-names2">
                                            <?php
                                                echoCityList();
                                            ?>
                                        </select></p>
                                    </div>

                                    <div class="col">
                                        <p>Address</p>
                                        <input type="text" name="center_address" placeholder="Address">
                                    </div>

                                    <div class="col">
                                        <p>Contact No.</p>
                                        <input type="text" name="center_contactno" placeholder="Contact number">
                                    </div>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p>Type</p>
                                    <p><label for="type-names"></label>
                                        <select name="center_type" id="type-names">
                                            <option>Government</option>
                                            <option>Private</option>
                                        </select>
                                    </p>
                                </div>

                                <div class="col">
                                    <p>Username</p>
                                    <input type="text" name="center_username" placeholder="Username">
                                </div>

                                <div class="col">
                                    <p>Password</p>
                                    <input type="password" name="center_password" placeholder="Password"/>
                                </div>
                            </div>
                        </div>
                            <span style="color:red"><?php echoError('vcerr'); ?></span>
                        <div class="card-body centeralize-button">
                            <input type="submit" value="Add" name="center_add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
   </div>
<div class="row">
    <div class="col-6">
        <div class="cardbody">
                <a href="find_vaccination_center.php"><button name="center_find" class="btn btn-primary"  >Find vaccination center</button></a>
        </div>
    </div>
    <div class="col-6">
        <div class="cardbody">
                <a href="user_list.php"><button name="user_list" class="btn btn-primary"  >Users list</button></a>
        </div>

    </div>
</div>

</body>
</html>

    <?php
} else {
    header("location: ..");
}
?>