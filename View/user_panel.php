<?php include "../Controller/vaccineuser.php"; 
    include "../Controller/MiscController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
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
        <div class="col-12">
            <div class="cardhead">
                <h> Welcome, <?php echo$vaccineuser->getName(); ?> </h>
                <p style="color: white">Doses taken: <?php echo $vaccineuser->getDoses(); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="cardbody">
                <div class="card-body">
                    <p>Available vaccines</p>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Gap</th>
                            <th scope="col">Precautions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $vaccineuser->listVaccines(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="cardbody">
                <?php if ($vaccineuser->getDoses() < 2) {
                if(!$vaccineuser->getReserveStatus()) {?>
                <form action="../Controller/vaccineuser.php" method="post"> 
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col">
                            <p>Center</p>
                            <label for="res_center"></label>
                                <select name="reserve_center" id="res_center">
                                    <?php echoCenterList();
                                    ?>
                                </select>
                        </div>
                        <div class="col">
                            <p>Reserve vaccine </p>
                            <label for="res_vaccine"></label>
                            <select name="reserve_vaccine" id="res_vaccine">
                                <?php echoVaccineList();
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <p>Reservation date</p>
                                <input type="date" name="reserve_date" id="birthday" class="date">
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <?php
                    if(isset($_GET['err'])) {
                        if($_GET['err']==0) echo "<p class = 'error' style=color:red >Fill all inputs<p>";
                        if($_GET['err']==1) echo "<p class = 'error' style=color:red >You're not allowed to reserve on this day<p>";
                    }
                    ?>
                    <p><input type="submit" name="reserve_submit" class="btn btn-primary"></p>
                </form> 
                <?php
                } else {
                    echo "<p>Your Reservation Number is : ";
                    echo $vaccineuser->getReservation() . "</p>";
                } } else {
                    echo "<p>You have successfully taken the two doses!</p>";
                    echo "<form action='../Controller/vaccineuser.php' method='post'>
                        <input type='submit' name='download' value='Download certificate' class='btn btn-primary'>
                    </form>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>



