<?php include "../Controller/vaccineuser.php"; 
    include "../Controller/MiscController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user_panel</title>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style_sheet.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="cardhead">
                <h> Welcome, <?php echo$vaccineuser->getName(); ?> </h>
                
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="cardbody">
                <?php if(!$vaccineuser->getReserveStatus()) {?>
                <form action="../Controller/vaccineuser.php" method="post"> 
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col">
                            <p>Center</p>
                            <p><label for="res_center"></label>
                                <select name="reserve_center" id="res_center">
                                    <?php echoCenterList();
                                    ?>
                                </select>
                            </p>
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
                            <p>Reservation date
                                <input type="date" name="reserve_date" id="birthday"></p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <p><input type="submit" name="reserve_submit" class="btn btn-primary"></p>
                    <?php 
                    if(!isset($_GET['err'])) {
                        exit();
                    }
                    else {
                        if($_GET['err']==0) echo "<p class = 'error' style=color:red >Fill all inputs<p>";
                    }
                    ?>
                </form> 
                <?php }
                else
                {
                    echo "<p>Your Reservation Number is : ";
                    echo $vaccineuser->getReservation() . "</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>



