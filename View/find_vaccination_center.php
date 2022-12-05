<?php
include "../Controller/vclistController.php";
include "../Controller/MiscController.php";
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

        <div class="row">
            <div class="col-md-12">
                <div class="card_header">
                    <h1>Admin name</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p-head>Find Vaccination center</p-head>
                        <form action="../Controller/vclistController.php" method="post">
                            <p>City :
                                <label for="city-names"></label>
                                <select name="city_find" id="city-names" >
                                    <?php
                                        echoCityList();
                                    ?>
                                </select></p>
                            <input type="submit" value="Search" name="city_search" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-head">
                            <p-head>Results in <?php echoCityName(); ?>
                            </p-head>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <span><?php echoError(); ?></span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact number</th>
                                    <th scope="col">Type</th>
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


