<?php
include "../Controller/vclistController.php";
include "../Controller/MiscController.php";
?>
<?php
@session_start();
if (isset($_SESSION['username']) && $_SESSION['type'] == 1) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Vaccination Center</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
        <nav class="navbar sticky-top navbar-light justify-content-between" style="background-color: #20c997">
            <a href="admin_panel.php" class="link">Back to the admin panel</a>
            <form action="../Controller/LoginController.php" method="post" class="form-inline">
                <input type="submit" value="Log out" name="logout" class="btn btn-primary my-2 my-sm-0">
            </form>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="cardhead">
                    <h>Find a vaccination center</h>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="cardbody">
                    <form action="../Controller/vclistController.php" method="post">
                        <p>City :
                            <label for="city-names"></label>
                            <select name="city_find" id="city-names">
                                <?php
                                echoCityList();
                                ?>
                            </select></p>
                        <input type="submit" value="Search" name="city_search" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="cardbody">
                    <p>Results in <?php echoCityName(); ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="cardbody">
                    <div class="backcard">
                        <span style="color: red"><?php echoError(); ?></span>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact number</th>
                                <th scope="col">Type</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php search(); ?>
                            </tbody>
                        </table>
                    </div>
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