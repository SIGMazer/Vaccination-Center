<?php
include "../Controller/VaccinationCenterController.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vaccination center panel</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-12">
        <div class="cardhead"><h>Welcome, <?php echo $modelInstance->getName(); ?></h></div>
    </div>
</div>

<div class="row">

    <div class="col">
        <div class="cardbody">
            <form action="../Controller/VaccinationCenterController.php" method="post">
                <p>Reservation No. : </p>
                <p><input  type="text" name="res_no" placeholder="reservation number"></p>
                <input type="submit" value="Search" name="res_find" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="cardbody">
            <p>
            <form action="../Controller/VaccinationCenterController.php" method="post">
                <p class="card-text">User's name : </p>
                <p class="card-text">National ID :</p>
                <p class="card-text">Vaccine name : </p>
                <input type="submit" name="res_confirm" value="Confirm" class="btn btn-primary">
            </form>
            </>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="backcard">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Reservation number</th>

                    <th>Name</th>

                    <th>National ID</th>

                    <th>Vaccine name</th>
                </tr>

                <?php
                $modelInstance->listReservations();
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>